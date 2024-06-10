<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\Module;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Module::factory(10)->create();
        Role::create(['name' => 'admin', 'key' => 'admin']);
        Role::create(['name' => 'subscriber', 'key' => 'subscriber']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('welcome'),
            'is_verified' => true,
        ]);

        $user->roles()->attach(1);

        $user = User::create([
            'name' => 'Mike',
            'email' => 'mike@mail.com',
            'password' => Hash::make('welcome'),
            'process_link' => Str::random(),
            'is_verified' => false,
        ]);

        $user->roles()->attach(2);

        // create countries
        $filePath = 'data/countries.json';
        $json = Storage::get($filePath);
        $countries = json_decode($json, true);
        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'code' => $country['code'],
            ]);
        }

        
    }
}
