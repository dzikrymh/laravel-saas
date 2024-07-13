<?php

namespace Database\Seeders;

use App\Models\CentralUser;
use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tenant = Tenant::create(['id' => 'etc']);
        $tenant->domains()->create(['domain' => 'etc.saas.test']);

//        Tenant::all()->runForEach(function () {
//            User::factory()->create([
//                'global_id' => 'etc',
//                'name' => 'Admin',
//                'email' => 'admin@etc.saas.test',
//            ]);
//        });

//        $tenant = Tenant::find('etc');
//
//        // update admin user
//        $userU = CentralUser::where('email', 'admin@etc.saas.test')->first();
//        $userU->update([
//            'name' => 'Admin Ajaa',
//        ]);


        $user = CentralUser::create([
            'global_id' => Str::orderedUuid(),
            'name' => 'Admin',
            'email' => 'admin@etc.saas.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->tenants()->attach($tenant);
    }
}
