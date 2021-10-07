<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('checklists')->delete();
        
        \DB::table('checklists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'checklist_group_id' => 1,
                'name' => 'Push Code to Githup',
                'created_at' => '2021-10-01 10:47:34',
                'updated_at' => '2021-10-01 10:47:34',
                'deleted_at' => NULL,
                'user_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'checklist_group_id' => 1,
                'name' => 'Test The Featuer',
                'created_at' => '2021-10-02 06:50:58',
                'updated_at' => '2021-10-02 06:50:58',
                'deleted_at' => NULL,
                'user_id' => NULL,
            ),
        ));
        
        
    }
}