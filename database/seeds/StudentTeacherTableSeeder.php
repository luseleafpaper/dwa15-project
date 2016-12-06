<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Teacher;

class StudentTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teacherStudents = [
            '1' => ['1', '2'], // Lu's students are Jamal and Jill 
            '2' => ['2'], // Jill's students are Jamal
        ];

        foreach($teacherStudents as $teacherId=> $studentIds) {
            foreach($studentIds as $studentId) {
                $teacher = Teacher::where('id', 'like', $teacherId)->first();
                $student = Student::where('id', 'like', $studentId)->first();

                $teacher->students()->save($student);
            }
        }

    }
}
