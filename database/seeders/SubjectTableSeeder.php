<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;


class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Subject::create([
            'name' => 'Математика'
        ]);
        Subject::create([
            'name' => 'Геометрия'
        ]);
        Subject::create([
            'name' => 'Қазақ тілі'
        ]);
        Subject::create([
            'name' => 'Орыс тілі'
        ]);
        Subject::create([
            'name' => 'Әдебиет'
        ]);
        Subject::create([
            'name' => 'Қазақстан тарихы'
        ]);
        Subject::create([
            'name' => 'Дүние жүзі тарихы'
        ]);
        Subject::create([
            'name' => 'Георафия'
        ]);
        Subject::create([
            'name' => 'Физика'
        ]);
        Subject::create([
            'name' => 'Химия'
        ]);
        Subject::create([
            'name' => 'Биология'
        ]);
    }
}
