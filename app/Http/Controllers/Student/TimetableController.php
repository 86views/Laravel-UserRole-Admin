<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index() 
    {

        return view('students.timetable');
    }
}
