<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        Page::create(['title' => 'simple', 'description' => 'A simple datatable using only the livewire-datatables template tag and a model']);
        Page::create(['title' => 'intermediate', 'description' => 'A more complex table with excluded fields, mutations, and filters']);
        Page::create(['title' => 'complex', 'description' => 'Full control over each field using fluent class methods']);
    }
}
