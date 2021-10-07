<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Http\Requests\UpdateChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.checklist_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        toastr()->success('Checklist Group stored successfully' );
        return redirect()->route('welcome');
    }


    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_group.edit' , compact('checklistGroup'));
    }


    public function update(UpdateChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());
        toastr()->success('Checklist Group updated successfully' );
        return redirect()->route('welcome');
    }

    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        toastr()->error('Checklist Group destroyed successfully' );
        return redirect()->route('welcome');
    }
}
