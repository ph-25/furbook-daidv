<?php

use Illuminate\Database\Seeder;

class PaginateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Breeds Seeder
        factory(Furbook\Breed::class, 5)->create()->each(function ($breed) {
            // Create Cats Seeder
            $breed->cats()->saveMany(
                factory(Furbook\Cat::class, rand(1, 10))->create([
                    'breed_id' => $breed->id
                ])
            );
        });
    }
}
