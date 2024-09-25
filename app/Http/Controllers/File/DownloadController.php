<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index($id)
    {
        $complaint = Complaint::find($id);
        return Storage::download($complaint->file_location);
    }
}
