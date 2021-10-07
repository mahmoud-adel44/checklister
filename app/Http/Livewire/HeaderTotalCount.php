<?php

namespace App\Http\Livewire;

use App\Models\Checklist;
use Livewire\Component;

class HeaderTotalCount extends Component
{
    public $checklist_group_id;
    protected $listeners = ['task_complete' => '$refresh'];
    public function render()
    {
        $checklists = Checklist::where('checklist_group_id' , $this->checklist_group_id)
            ->whereNull('user_id')
            ->withCount([
                'tasks' => fn($query) => $query->whereNull('user_id')
            ])
            ->withCount([
                'user_tasks' => fn($query) => $query->whereNotNull('completed_at')
            ])
            ->get();
        return view('livewire.header-total-count' , compact('checklists'));
    }
}
