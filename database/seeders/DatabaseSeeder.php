<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ChecklistGroupsTableSeeder::class);
        $this->call(ChecklistsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(PageSeeder::class);
    }
}
