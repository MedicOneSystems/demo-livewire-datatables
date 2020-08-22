<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        Page::create(['title' => 'simple', 'description' => 'A simple datatable using only the livewire-datatables template tag and a model']);
        Page::create(['title' => 'intermediate', 'description' => 'Take control of your datatable by adding props']);
        Page::create(['title' => 'complex', 'description' => 'Master control over each field using fluent class methods']);
        Page::create(['title' => 'relation', 'description' => 'Create aggregate columns from Eloquent relations']);
        Page::create(['title' => 'deletable', 'description' => 'Delete rows by adding a delete column']);
    }
}
