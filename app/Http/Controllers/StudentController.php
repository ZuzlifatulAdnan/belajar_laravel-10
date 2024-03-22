<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Student;
use App\Models\Teachers;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function show($id){
    //     $activity = Activity::find($id);
    //     $students= $activity->students;
    //     return view('example', ['activity'=>$activity, 'students'=>$students]);
    // }
    public function show($id){
        $student =Student::find($id);
        $activities = $student->activities;
        return view('example', ['activities'=> $activities, 'student' => $student]);
    }
}
