<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $users */
//        $users = factory(App\Models\User::class, 12)->create();
//        $users[0]->is_admin = true;
//        $users[0]->save();
//
//        /** @var \App\Models\Teacher $teacher */
//        $teacher = (new \App\Models\Teacher)->create(
//            [
//                'id' => $users[1]->id,
//                'designation' => 'Professor',
//                'approved_at' => \Carbon\Carbon::now()
//            ]);
//
//        $students = \Illuminate\Database\Eloquent\Collection::make();
//        foreach ($users->slice(2) as $user) {
//            $students->push(
//                (new \App\Models\Student)->create(
//                    [
//                        'id' => $user->id,
//                        'student_id' => '1502' . $user->id
//                    ]));
//        }
//
//        /** @var \App\Models\Session $session */
//        $session = (new \App\Models\Session())->create(
//            [
//                'session' => '2017-18'
//            ]);
//
//        /** @var \App\Models\Course $course */
//        $course = (new \App\Models\Course())->create(
//            [
//                'course_no' => 'CSE 1100',
//                'course_title' => 'Computer Fundamentals',
//                'credit' => 2
//            ]);
//
//        $courseSession = DB::table('course_session')
//            ->insertGetId(
//                [
//                    'course_id' => $course->id,
//                    'session' => $session->session,
//                ]);
//        $courseTeacher = DB::table('course_teacher')
//            ->insertGetId(
//                [
//                    'teacher_id' => $users[1]->id,
//                    'course_id' => $courseSession,
//                ]);
//
//        $courseStudents = \Illuminate\Support\Collection::make();
//        foreach ($users->slice(2) as $student) {
//            $courseStudents->push(
//                DB::table('course_student')->insertGetId(
//                    [
//                        'student_id' => $student->id,
//                        'course_id' => $courseSession,
//                        'approved_at' => \Carbon\Carbon::now(),
//                    ]));
//        }

        $task = new \App\Models\Task();
        $task->title = "Add two numbers";
        $task->task = [
            "file" => null,
            "body" => "Add two number in C language."
        ];
        $task->teacher_id = 1;
        $task->save();

        $submission = new \App\Models\Submission();
        $submission->task_id = $task->id;
        $submission->submission = [
            "file" => null,
            "body" => "#include <stdio.h>\n" .
                      "int main()\n" .
                      "{\n" .
                      "    int a = 2;\n" .
                      "    int b = 4;\n" .
                      "    int c = a + b;\n" .
                      "    printf(\"%d\", c);\n" .
                      "    return 0;\n" .
                      "}\n"
        ];
        $submission->student_id = 1;
        $submission->status = 2;
        $submission->save();

        $submission = new \App\Models\Submission();
        $submission->task_id = $task->id;
        $submission->submission = [
            "file" => null,
            "body" => "#include <stdio.h>\n" .
                      "int main()\n" .
                      "{\n" .
                      "    int x = 2;\n" .
                      "    int y = 4;\n" .
                      "    int z = x + y;\n" .
                      "    printf(\"%d\", z);\n" .
                      "}\n"
        ];
        $submission->student_id = 4;
        $submission->status = 2;
        $submission->save();
    }
}
