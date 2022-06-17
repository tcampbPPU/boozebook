<?php

namespace Database\Seeders;

use App\Models\{Event, User};
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
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

        User::query()
            ->get()
            ->map(fn(User $user) =>
                $user->events()
                    ->saveMany(
                        Event::factory($multiplier * 3)
                        ->for($user->addresses()->inRandomOrder()->first())
                        ->make()
                    ));
    }
}
