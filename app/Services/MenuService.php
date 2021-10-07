<?php

namespace App\Services;

use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Carbon\Carbon;

class MenuService
{
    public function get_menu()
    {
        $menu = ChecklistGroup::with(
            [
                'checklists' => fn($query) => $query->whereNull('user_id'),
                'checklists.tasks' => fn($query) => $query->whereNull('tasks.user_id'),
                'checklists.user_tasks',
            ]
        )
            ->get();


        $groups = [];
        $last_action_at = auth()->user()->last_action_at;
        if (is_null($last_action_at)) {
            $last_action_at = now()->subYears(10);
        }

        $user_checklist = Checklist::where('user_id' , auth()->id())->get();
        foreach ($menu->toArray() as $group) {
            if (count($group['checklists']) > 0) {
                $group_updated_at = $user_checklist->where('checklist_group_id' ,$group['id'] )->max('updated_at');
                $group['is_new'] = $group_updated_at && Carbon::create($group['created_at'])->greaterThan($group_updated_at);
                $group['is_updated'] = !($group['is_new']) && $group_updated_at
                    && Carbon::create($group['updated_at'])->greaterThan($group_updated_at);
                foreach ($group['checklists'] as &$checklist) {
                    $checklist_updated_at = $user_checklist->where('checklist_id' ,$checklist['id'] )->max('updated_at');
                    $checklist['is_new'] = !($group['is_new'])
                        && $checklist_updated_at
                        && Carbon::create($checklist['created_at'])->greaterThan($checklist_updated_at);
                    $checklist['is_updated'] = !($group['is_new']) && !($group['is_updated'])
                        && !($checklist['is_new'])
                        && $checklist_updated_at
                        && Carbon::create($checklist['updated_at'])->greaterThan($checklist_updated_at);
                    $checklist['tasks_count'] = count($checklist['tasks']);
                    $checklist['completed_tasks_count'] = count($checklist['user_tasks']);
                }
                $groups[] = $group;
            }
        }
        return [
            'admin_menu'=>$menu ,
            'user_menu' =>$groups
        ];
    }
}
