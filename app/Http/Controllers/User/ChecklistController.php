<?php

namespace App\Http\Controllers\User;

use App\Events\SendNotification;
use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Services\ChecklistService;

use Illuminate\View\View;


class ChecklistController extends Controller
{
    public function show(Checklist $checklist): View
    {
        // Sync checklist from admin
        (new ChecklistService())->sync_checklist($checklist, auth()->id());
        event(new SendNotification(auth()->id()));

        return view('user.checklists.show', compact('checklist'));
    }
}
