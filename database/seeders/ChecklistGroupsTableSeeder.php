<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChecklistGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('checklist_groups')->delete();
        
        \DB::table('checklist_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lanch New Features',
                'created_at' => '2021-10-01 10:40:21',
                'updated_at' => '2021-10-01 16:19:40',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Create Theme',
                'created_at' => '2021-10-02 06:50:09',
                'updated_at' => '2021-10-02 06:52:48',
                'deleted_at' => '2021-10-02 06:52:48',
            ),
        ));
        
        
    }
}