<?php

namespace Database\Seeders;

use App\Models\CentralUser;
use App\Models\Tenant;
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
        $tenant = Tenant::create(['id' => 'central']);
        $tenant->domains()->create(['domain' => config('app.central_domain')]);

        $user = CentralUser::create([
            'global_id' => Str::orderedUuid(),
            'name' => 'Admin',
            'email' => 'admin@saas.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->tenants()->attach($tenant);
    }
}
