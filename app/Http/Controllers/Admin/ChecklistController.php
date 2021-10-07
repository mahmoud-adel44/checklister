<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }

    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());
        toastr()->success('Checklist Group Stored successfully' );
        return redirect()->route('welcome');
    }

    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
    }

    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());
        toastr()->success('Checklist updated successfully' );
        return redirect()->route('welcome');
    }

    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('welcome');
    }
}
