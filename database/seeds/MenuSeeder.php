<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->insert([
            [
                'id' => 9,
                'parent_id' => 0,
                'order' => 9,
                'title' => 'Article',
                'icon' => 'fa-edit',
                'uri' => ''
            ], [
                'id' => 10,
                'parent_id' => 9,
                'order' => 10,
                'title' => 'Articles',
                'icon' => 'fa-edit',
                'uri' => '/articles'
            ], [
                'id' => 11,
                'parent_id' => 9,
                'order' => 11,
                'title' => 'Categories',
                'icon' => 'fa-th',
                'uri' => '/categories'
            ], [
                'id' => 12,
                'parent_id' => 9,
                'order' => 12,
                'title' => 'Tags',
                'icon' => 'fa-tags',
                'uri' => '/tags'
            ], [
                'id' => 13,
                'parent_id' => 0,
                'order' => 13,
                'title' => 'Pages',
                'icon' => 'fa-pagelines',
                'uri' => '/pages'
            ], [
                'id' => 14,
                'parent_id' => 0,
                'order' => 14,
                'title' => 'Navigations',
                'icon' => 'fa-navicon',
                'uri' => '/navigations'
            ], [
                'id' => 15,
                'parent_id' => 0,
                'order' => 15,
                'title' => 'Mottoes',
                'icon' => 'fa-book',
                'uri' => '/mottoes'
            ], [
                'id' => 16,
                'parent_id' => 0,
                'order' => 16,
                'title' => 'Links',
                'icon' => 'fa-user-plus',
                'uri' => '/links'
            ], [
                'id' => 17,
                'parent_id' => 0,
                'order' => 17,
                'title' => 'Systems',
                'icon' => 'fa-toggle-on',
                'uri' => '/systems'
            ]
        ]);
    }
}
