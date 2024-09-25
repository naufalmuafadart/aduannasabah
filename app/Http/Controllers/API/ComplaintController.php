<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintLog;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function post(Request $request) {
        $complaint = new Complaint();

        $faker = Factory::create();

        $complaint->public_id = $faker->swiftBicNumber;
        $complaint->type = $request->input('type');
        $complaint->name = $request->input('name');
        $complaint->location = $request->input('location');
        $complaint->date = $request->input('date');
        $complaint->time = $request->input('time');
        $complaint->description = $request->input('description');
        if ($request->file('file') !== null) {
            $file = $request->file('file');
            $path = Storage::putFile('uploads', $file, 'public');
            $complaint->file_location = $path;
            $complaint->file_original_name = $file->getClientOriginalName();
        }
        $complaint->reporter_name = $request->input('reporter_name');
        $complaint->reporter_phone_number = $request->input('reporter_phone_number');
        $complaint->save();

        $complaint_log = new ComplaintLog();
        $complaint_log->complaint_id = $complaint->id;
        $complaint_log->type = 'Created at';
        $complaint_log->data = Carbon::now();
        $complaint_log->save();

        return redirect('/track/'.$complaint->public_id);
    }

    public function update_to_followed($id)
    {
        $complaint = Complaint::find($id);
        $complaint->status = 'followed_up';
        $complaint->save();

        $complaintLog = new ComplaintLog();
        $complaintLog->complaint_id = $id;
        $complaintLog->type = 'Followed up';
        $complaintLog->data = Carbon::now();
        $complaintLog->save();
        return redirect('/admin/complaint/'.$complaint->id);
    }

    public function update_to_finish($id)
    {
        $complaint = Complaint::find($id);
        $complaint->status = 'finish';
        $complaint->save();

        $complaintLog = new ComplaintLog();
        $complaintLog->complaint_id = $id;
        $complaintLog->type = 'Finish';
        $complaintLog->data = Carbon::now();
        $complaintLog->save();
        return redirect('/admin/complaint/'.$complaint->id);
    }
}
