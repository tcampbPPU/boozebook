<?php

namespace Database\Seeders;

use App\Models\Bartender;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class BartenderEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var int $numberOfEvents */
        $numberOfEvents = (int) round(User::count() / 3);

        Event::query()
            ->take($numberOfEvents)
            ->get()
            ->map(fn (Event $event) => $event->bartenders()
                    ->attach(
                        Bartender::query()
                            ->where('user_id', '!=', $event->user_id)
                            ->inRandomOrder()
                            ->value('id')
                    ));
    }
}
