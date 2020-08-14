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
        // $this->call(UserSeeder::class);
        
    }
}



class ThreadTableSeeder extends Seeder {

    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('threads')->delete();
        for($i=0; $i<=100; $i++):
            DB::table('threads')->insert([
                'name' => $faker->colorName,
                'number' => $faker->numberBetween($min = 001, $max = 9999),
                'brand' => $faker->randomElement($array = array ('DMC','Anchor')),
            ]);
        endfor;
    }

}


