<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=40; $i++):
            DB::table('posts')->insert([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'seotitle' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'seodescription' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'slug' => $faker->slug,
                'active' => $faker->boolean($chanceOfGettingTrue = 50),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        endfor;
    }

}