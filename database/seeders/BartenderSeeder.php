<?php

namespace Database\Seeders;

use App\Models\{Bartender, User};
use Illuminate\Database\Seeder;

class BartenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var int $numberOfUser */
        $numberOfUser = (int) round(User::count() / 4);

        User::query()
            ->inRandomOrder()
            ->take($numberOfUser)
            ->get()
            ->map(fn(User $user) =>
                $user->bartender()->save(
                    Bartender::factory()->make()
                ));
    }
}
