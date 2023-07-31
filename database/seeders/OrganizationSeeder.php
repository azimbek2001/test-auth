<?php

namespace Database\Seeders;

use App\Models\Organization\Organization;
use App\Utils\Columns\OrganizationColumns;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем новые записи с помощью Faker
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Organization::create([
                OrganizationColumns::INN_COLUMN => $faker->unique()->numerify('##########'),
                OrganizationColumns::NAME_COLUMN => $faker->company,
            ]);
        }
    }
}
