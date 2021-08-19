<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;


class ExportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('export_table')->insert($this->getData());

    }
    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->sentence(mt_rand(3,10)),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'information' =>$faker->sentence(mt_rand(30,40))
            ];
        }

        return $data;
    }
}
