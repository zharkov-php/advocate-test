<?php

use App\Filedocs;
use Illuminate\Database\Seeder;
use Faker\Factory;

class FilesTableSeeder extends Seeder
{

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 100; $i++) {
           Filedocs::create([
                'name' => $faker->firstName . '.' . 'pdf',
                'body' => $faker->text,
                'document_id' => rand(1, 100)
            ]);
        }
    }

}
