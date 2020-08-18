<?php
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

$x = new ComplexDemoTable(1);
$columns = Mediconesystems\LivewireDatatables\ColumnSet::build($x->columns())
    ->include($x->include)
    ->exclude($x->exclude)
    ->hide($x->hide)
    ->formatDates($x->dates)
    ->formatTimes($x->times)
    ->search($x->searchable)
    ->sort($x->sort)->columns;

$query = User::query();

$columns->each(
    function ($column) use ($query) {
        /// SELECT STATEMENT

        //callback field
        if (Str::startsWith($column->name, 'callback_')) {
            // $query->addSelect($query->getModel()->getTable() . '.' . $column->name);
            return;
        }

        // base table field
        if (!Str::contains($column->name, '.')) {
            $query->addSelect(
                $query->getModel()->getTable() . '.' . $column->name
            );
        } else {
            // some kind of nested field

            if (method_exists($query->getModel(), Str::before($column->name, '.'))) {
                $parent = $query;

                $joins = explode('.', Str::beforeLast($column->name, '.'));
                // dd($joins);
                foreach ($joins as $i => $join) {
                    dump($i, $join);
                  $relation = method_exists($parent->getModel(), $join)
                        ? $parent->getRelation($join)
                        : $parent;  
dump($relation->toSql());
                  switch (true) {
                        case $relation instanceof HasOne:
                            $query->leftJoinIfNotJoined(
                                $relation->getRelated()->getTable(),
                                $relation->getQualifiedForeignKeyName(),
                                $relation->getQualifiedParentKeyName()
                            );
                      dump('hey1');
                            $parent = $relation;
                            break;

                        case $relation instanceof BelongsTo:
                            $query->leftJoinIfNotJoined(
                                $relation->getRelated()->getTable(),
                                $relation->getQualifiedOwnerKeyName(),
                                $relation->getQualifiedForeignKeyName()
                            );
                      dump('hey2');
                            $parent = $relation;
                            break;

                        case $relation instanceof HasMany:
                            $aggregate = $column->aggregate();
                            $name = explode('.', $column->name);
                            $query->withAggregate(
                                $name[0],
                                $aggregate,
                                $name[1]
                            );
                    }
                  }
                            
            	$field = Str::afterLast($column->name, '.');
              	
            }
                  
              
        }

        /// JOINS

        /// ORDER BY

        /// WHERE
    }
    // ->dd()
);

$query->dd();
$query->get();






// switch (true) {
//                                 case $parent instanceof HasOne:
//                                     $query->addSelect(
//                                         $parent->getRelated()->getTable() .
//                                             '.' .
//                                             $field .
//                                             ' AS ' .
//                                             $column->name
//                                     );
//                                     break;

//                                 case $parent instanceof BelongsTo:
//                                     $query->addSelect(
//                                         $parent->getRelated()->getTable() .
//                                             '.' .
//                                             $field .
//                                             ' AS ' .
//                                             $column->name
//                                     );
//                                     break;

//                                 case $parent instanceof HasMany:
//                                     $aggregate = $column->aggregate();
//                                     $name = explode('.', $column->name);
//                                     $query->withAggregate(
//                                         $name[0],
//                                         $aggregate,
//                                         $name[1]
//                                     );
//                                     break;
//                             }