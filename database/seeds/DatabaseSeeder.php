<?php

use Illuminate\Database\Seeder;

use App\Day;
use App\Status;
use App\Privacy;
use App\Category;
use App\Workout;
use App\User;
use App\Routine;
use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Day::truncate();
        Status::truncate();
        Privacy::truncate();
        Category::truncate();
        Workout::truncate();
        Admin::truncate();
        User::truncate();
        Routine::truncate();
        
        $this->call(DayTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PrivacyTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(WorkoutTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoutineTableSeeder::class);
    }
}
