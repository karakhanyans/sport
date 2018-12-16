<?php

use Illuminate\Database\Seeder;

class FakeDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Team::class, 10)
            ->create()
            ->each(function ($team) {
                $team->players()->saveMany(factory(\App\Models\Player::class, 15)->make());
            });
    }
}
