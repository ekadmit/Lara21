<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedback_data')->insert($this->getData());

    }
    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->sentence(mt_rand(3,10)),
                'comment' =>$faker->sentence(mt_rand(30,40))
            ];
        }

        return $data;
    }
}
