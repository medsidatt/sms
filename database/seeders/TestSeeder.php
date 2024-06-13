<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Subjects;
use App\Models\Test;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Test::factory()->count(80)->create();

        $students = Student::where('class', 1)->get();
        $subjects = Subjects::whereNotIn('id', [5, 8])->get();
        $faker = Factory::create();

        foreach ($students as $student) {
            // Ensure no duplicate subjects for a student
            $assignedSubjects = $subjects->random(8);

            foreach ($assignedSubjects as $subject) {
                Exam::create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'note' => $faker->randomFloat(2, 1, 20),
                    'quarter' => 3,
                ]);
            }
        }
    }
}
