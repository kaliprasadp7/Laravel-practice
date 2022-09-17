<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('posts')->insert([
                'first_name'=>$faker->text(6),
                'last_name'=>$faker->text(6),
                'contact_num'=>$faker->text(6),
                'user_name'=>$faker->text(6),
                'email'=>$faker->text(6),
                'select_company'=>$faker->text(6),
                'user_type'=>$faker->text(6)
            ]);
        }

    }
}
