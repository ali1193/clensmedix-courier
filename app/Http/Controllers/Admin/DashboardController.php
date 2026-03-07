<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Service;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'services_count' => Service::count(),
            'contacts_count' => ContactSubmission::count(),
            'latest_contacts' => ContactSubmission::orderByDesc('created_at')->limit(5)->get(),
        ]);
    }
}
