<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubjectTableSeeder::class);
       // $this->call(AnswersTableSeeder::class);
    }
}
