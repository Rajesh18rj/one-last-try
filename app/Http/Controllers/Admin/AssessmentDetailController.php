<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentDetailController extends Controller
{
    public function index(){
        return view('admin.assessment_detail.index');
    }
}
