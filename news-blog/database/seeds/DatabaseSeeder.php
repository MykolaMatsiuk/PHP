<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for ($i = 0; $i <= 50; $i++) {
        //     DB::table('news_tag')->insert([
        //         'news_id' => rand(1,159),
        //         'tag_id' => rand(1,21),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // };
        // for ($i = 0; $i < 8; $i++) {
        //     DB::table('comercials')->insert([
        //         'title' => $faker->word,
        //         'price' => $faker->numberBetween(2.00, 700.00),
        //         'company' => $faker->company
        //     ]);
        // }
        
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('news')->insert([
        //         'category_id' => rand(1,5),
        //         'title' => $faker->company,
        //         'content' => $faker->paragraph(10),
        //         'pic_src' => $faker->image('public/images',
        //             400, 300, null, false),
        //         'analytic' => rand(0,1),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }        
    }
}
