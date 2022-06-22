<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var int $multiplier */
        $multiplier = env('FACTORY_ROUNDS', 1);

        User::factory($multiplier * 10)
            ->create()
            ->map(fn (User $user) => $user->addresses()
                    ->saveMany(
                        Address::factory($multiplier * 2)->make()
                    ));
    }
}
