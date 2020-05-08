<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_permissions')->insert([
            [
                'id' => 7,
                'name' => 'article',
                'slug' => 'article',
                'http_method' => '',
                'http_path' => '/articles*'
            ], [
                'id' => 8,
                'name' => 'category',
                'slug' => 'category',
                'http_method' => '',
                'http_path' => '/categories*'
            ], [
                'id' => 9,
                'name' => 'tag',
                'slug' => 'tag',
                'http_method' => '',
                'http_path' => '/tags*'
            ], [
                'id' => 10,
                'name' => 'page',
                'slug' => 'page',
                'http_method' => '',
                'http_path' => '/pages*'
            ], [
                'id' => 11,
                'name' => 'motto',
                'slug' => 'motto',
                'http_method' => '',
                'http_path' => '/mottoes*'
            ], [
                'id' => 12,
                'name' => 'friendship-link',
                'slug' => 'friendship link',
                'http_method' => '',
                'http_path' => '/links*'
            ], [
                'id' => 13,
                'name' => 'system',
                'slug' => 'system config',
                'http_method' => '',
                'http_path' => '/systems*'
            ]
        ]);
    }
}
