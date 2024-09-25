<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ComplaintController extends Controller
{
    public function detail($id)
    {
        App::setLocale('id');
        $complaint = Complaint::where('id', $id)->first();
        $data = [
            'complaint' => $complaint,
        ];
        return view('admin.complaint.index', $data);
    }
}
