<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function ($user){
             Entry::factory(10)->create([
                 'user_id' => $user->id
             ]);
        });

    }
}
