<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionnaireTemplate;

class QuestionnaireFromImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Questionnaire Template
        $template = QuestionnaireTemplate::updateOrCreate(
            ['title' => 'Template Kuesioner Penilaian Dosen (Image Data)'],
            [
                'description' => 'Template kuesioner penilaian dosen berdasarkan data gambar.',
                'is_active' => true,
            ]
        );

        // 2. Clear existing questions for this template if any (optional, but good for re-running)
        $template->questions()->delete();

        // 3. Create Questions from Image Indicators
        $indicators = [
            'Rencana pembelajaran (silabus) sudah diberikan oleh dosen dengan jelas di awal perkuliahan',
            'Materi Perkuliahan yang disampaikan oleh dosen sesuai dengan silabus mata kuliah',
            'Tersedianya module/handout/bahan kuliah/media pembelajaran',
            'Adanya diskusi/tanya jawab yang berlangsung pada setiap tatap muka',
            'Kemampuan dosen dalam berkomunikasi dan menyampaikan materi pada saat perkuliahan menciptakan suasana perkuliahan yang menarik dan kondusif',
            'Ketepatan waktu dimulainya perkuliahan',
            'Tingkat kehadiran dosen dalam perkuliahan tinggi',
            'Dosen tidak pernah memindahkan jadwal perkuliahan',
            'Alokasi waktu perkuliahan sesuai dengan alokasi waktu yang telah ditetapkan',
            'Materi praktikum yang diselenggarakan sesuai dengan materi perkuliahan teori',
            'Pelaksanaan praktikum sesuai dengan jadwal yang ditentukan',
            'Keterlibatan Dosen pembina matakuliah dalam pelaksanaan praktikum',
            'Kondisi fasilitas peralatan praktikum berfungsi dengan baik',
            'Ketersediaan modul praktikum',
            'Keseuaian pelaksanaan praktikum dengan materi pada modul praktikum',
        ];

        foreach ($indicators as $index => $content) {
            $template->questions()->create([
                'content' => $content,
                'group' => $index < 9 ? 'Teori' : 'Praktikum', // Categorizing based on content
                'type' => 'likert',
                'order' => $index + 1,
            ]);
        }
    }
}
