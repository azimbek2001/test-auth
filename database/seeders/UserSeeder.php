<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Http\Dto\User\CreateUserDto;
use App\Models\Organization\Organization;
use App\Models\User\User;
use App\Utils\Columns\OrganizationColumns;
use App\Utils\Columns\UserColumns;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        // Создаем новые записи с помощью Faker
        $faker = Factory::create();
        for ($i = 1; $i < 11; $i++) {
            $userDto = new CreateUserDto([
                UserColumns::EMAIL_COLUMN => $faker->unique()->email(),
                'middle_name' => $faker->name,
                'last_name' => $faker->lastName(),
                'first_name' => $faker->firstName(),
                UserColumns::ORGANIZATION_ID => $i,
                UserColumns::PASSWORD_COLUMN => 'password',
            ]);

            $user = User::add($userDto);
            $user->save();
        }
    }
}
