<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Support\Facades\App;

class AdminController extends Controller {
    public function index() {
        App::setLocale('id');

        $complaints = Complaint::get();
        $data = [
            'complaints' => $complaints
        ];
        return view('admin.index', $data);
    }
}
