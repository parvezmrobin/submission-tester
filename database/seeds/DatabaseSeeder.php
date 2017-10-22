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
//        factory(App\Models\User::class, 10)->create();

        $task = new \App\Models\Task();
        $task->title = "Add two numbers";
        $task->detail = [
            "type" => "text",
            "body" => "Add two number in C language."
        ];
        $task->course_teacher_id = 1;
        $task->save();

        $submission = new \App\Models\Submission();
        $submission->task_id = $task->id;
        $submission->submission = [
            "type" => "text",
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
        $submission->student_id = "150201";
        $submission->status = 2;
        $submission->save();
        $submission = new \App\Models\Submission();
        $submission->task_id = $task->id;
        $submission->submission = [
            "type" => "text",
            "body" => "#include <stdio.h>\n" .
                "int main()\n" .
                "{\n" .
                "    int x = 2;\n" .
                "    int y = 4;\n" .
                "    int z = x + y;\n" .
                "    printf(\"%d\", z);\n" .
                "}\n"
        ];
        $submission->student_id = "150204";
        $submission->status = 2;
        $submission->save();
    }
}
