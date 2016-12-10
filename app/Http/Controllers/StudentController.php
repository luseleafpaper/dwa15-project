<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\Teacher;
use App\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $student = $user->student()->first();
        $teacher = $user->teacher()->first();

        if($teacher) {
            $students = $teacher->getAllStudents();
            $my_students = $teacher->getMyStudents(); 
            
            foreach($students as $student) { 
                if($my_students->contains($student)) {
                    $student->status = '(my student)' ;
                }
            }
        }

        else if($student) {
            $students = $user->student()->first()->teachers()->with('user')->get();
        }

        return view('student.index')->with([
            'user'=>$user,
            'students' => $students,
        ]);

    }

}
