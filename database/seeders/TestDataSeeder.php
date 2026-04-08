<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\CourseClass;
use App\Models\Enrollment;
use App\Models\QuestionnaireTemplate;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Deactivate all semesters
        Semester::query()->update(['is_active' => false]);

        // 2. Create Active Semester
        $semester = Semester::updateOrCreate(
            ['name' => 'Ganjil 2024/2025'],
            ['is_active' => true]
        );

        // 2. Create Lecturer
        $lecturerUser = User::updateOrCreate(
            ['email' => 'dosen@test.com'],
            [
                'name' => 'Dr. Ahmad Budiman',
                'password' => Hash::make('password'),
            ]
        );
        $lecturerUser->email_verified_at = now();
        $lecturerUser->save();
        $lecturerUser->assignRole('Dosen');

        $lecturer = Lecturer::updateOrCreate(
            ['user_id' => $lecturerUser->id],
            ['nidn' => '12345678', 'title' => 'S.Kom., M.T.']
        );

        // 3. Create Student
        $studentUser = User::updateOrCreate(
            ['email' => 'mhs@test.com'],
            [
                'name' => 'Budi Setiawan',
                'nim' => '2024001',
                'password' => Hash::make('password'),
            ]
        );
        $studentUser->email_verified_at = now();
        $studentUser->save();
        $studentUser->assignRole('Mahasiswa');

        // 4. Create Course
        $course = Course::updateOrCreate(
            ['code' => 'IF101'],
            ['name' => 'Pemrograman Dasar', 'credits' => 3]
        );

        // 5. Create Course Class
        $courseClass = CourseClass::updateOrCreate(
            [
                'course_id' => $course->id,
                'lecturer_id' => $lecturer->id,
                'semester_id' => $semester->id,
            ],
            ['name' => 'Kelas A']
        );

        // 6. Enroll Student
        Enrollment::updateOrCreate([
            'user_id' => $studentUser->id,
            'course_class_id' => $courseClass->id,
        ]);

        // 7. Create Questionnaire Template
        $template = QuestionnaireTemplate::updateOrCreate(
            ['title' => 'Evaluasi Dosen Akhir Semester 2024'],
            [
                'description' => 'Mohon isi kuesioner ini dengan jujur untuk meningkatkan kualitas pengajaran.',
                'is_active' => true,
            ]
        );

        // 8. Create Questions
        $questions = [
            ['group' => 'Pedagogik', 'content' => 'Dosen menyampaikan materi dengan jelas dan mudah dipahami.'],
            ['group' => 'Pedagogik', 'content' => 'Dosen memberikan kesempatan bertanya kepada mahasiswa.'],
            ['group' => 'Profesional', 'content' => 'Dosen menguasai materi perkuliahan dengan baik.'],
            ['group' => 'Kepribadian', 'content' => 'Dosen bersikap disiplin dalam memulai dan mengakhiri perkuliahan.'],
            ['group' => 'Sosial', 'content' => 'Dosen memiliki sikap yang baik dalam berinteraksi dengan mahasiswa.'],
            ['group' => 'Saran', 'content' => 'Berikan saran atau kritik Anda untuk dosen ini.', 'type' => 'essay'],
        ];

        foreach ($questions as $index => $q) {
            $template->questions()->updateOrCreate(
                ['content' => $q['content']],
                [
                    'group' => $q['group'],
                    'type' => $q['type'] ?? 'likert',
                    'order' => $index,
                ]
            );
        }
    }
}
