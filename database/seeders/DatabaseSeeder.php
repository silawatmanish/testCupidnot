<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserOtherInfo;
use App\Models\PartnerPreference;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    
        $this->call(AdminUserSeeder::class);
        $user = User::factory(200)->create();
    }
}
