<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 6,
                'checklist_id' => 1,
                'name' => 'task 1',
                'description' => 'dfbfd',
                'created_at' => '2021-10-01 13:16:44',
                'updated_at' => '2021-10-01 16:20:41',
                'deleted_at' => NULL,
                'position' => 1,
            ),
            1 => 
            array (
                'id' => 7,
                'checklist_id' => 1,
                'name' => 'task 2',
                'description' => 'ghmghm',
                'created_at' => '2021-10-01 13:16:56',
                'updated_at' => '2021-10-01 13:17:25',
                'deleted_at' => '2021-10-01 13:17:25',
                'position' => 2,
            ),
            2 => 
            array (
                'id' => 8,
                'checklist_id' => 1,
                'name' => 'task 3',
                'description' => 'ghhg',
                'created_at' => '2021-10-01 13:17:10',
                'updated_at' => '2021-10-01 16:20:41',
                'deleted_at' => NULL,
                'position' => 2,
            ),
            3 => 
            array (
                'id' => 9,
                'checklist_id' => 1,
                'name' => 'task 4',
            'description' => '<h1><b style="background-color: rgb(255, 255, 0);">fdfdbdfbfbd...</b></h1><p><b><u style="background-color: rgb(255, 0, 0);">fgnfgnfg....</u></b></p>',
                'created_at' => '2021-10-01 14:49:01',
                'updated_at' => '2021-10-01 16:20:41',
                'deleted_at' => NULL,
                'position' => 3,
            ),
        ));
        
        
    }
}