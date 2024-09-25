<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TrackController extends Controller
{
    public function index($id)
    {
        App::setLocale('id');

        $complaint = Complaint::where('public_id', $id)->first();
        $log = ComplaintLog::where('complaint_id', $complaint->id)->get();
        $data = [
            'complaint' => $complaint,
            'logs' => $log,
        ];
        return view('track.index', $data);
    }
}
