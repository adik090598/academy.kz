<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Entities\Core\Role;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Тесты',
            'description' => 'Пәндік олимпиадалар'
        ]);

        Category::create([
            'name' => 'Олимпиада',
            'description' => 'Олимпиадалар бұл белгілі бір уақыт аралығында өтетін сайыс'
        ]);
        Category::create([
            'name' => 'Байқау',
            'description' => 'Қатысуға өтініш жіберу аркылы'
        ]);
    }
}
