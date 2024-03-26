<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Student;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    // public function show($id){
    //     $activity = Activity::find($id);
    //     $students= $activity->students;
    //     return view('example', ['activity'=>$activity, 'students'=>$students]);
    // }

    public function index(){
        // $students = Student::all();
        $students = Student::paginate(2);
        return view('index', ['students'=>$students]);
    }

    public function filter()
    {
        $students=Student::where('score', '>=', 80)
        ->where('name', 'LIKE', '%u%')
        ->get();
        return view('filter', compact('students'));
    }

    public function show($id){
        $student =Student::find($id);
        // $activities = $student->activities;
        return view('show', ['student' => $student]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'score'=>'require'
        ]);
        Student::create([
            'name'=>$request->name,
            'score' =>$request->score,
            'teacher_id'=>1
        ]);

        return Redirect::route('index');
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        
        $student->update([
            'name'=>$request->name,
            'score' =>$request->score
        ]);
        return Redirect::route('index');
    }
}
