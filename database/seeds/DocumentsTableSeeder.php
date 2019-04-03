<?php

use App\Document;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
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
            Document::create([
                'name' => $faker->firstName . '.' . 'document',
            ]);
        }
    }
}
