<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'user@example.com',
            'name' => 'John Doe',
            'password' => Hash::make('password')
        ]);

        $domains = [
            [
                'name' => 'example.com',
                'da' => 10,
                'pa' => 20,
                'qa' => 30,
                'os' => 40,
                'ss' => 50,
                'bidding_time' => now()->addMinutes(30)
            ],
            [
                'name' => 'example.net',
                'da' => 20,
                'pa' => 30,
                'qa' => 40,
                'os' => 50,
                'ss' => 60,
                'bidding_time' => now()->addHour()
            ],
            [
                'name' => 'example.org',
                'da' => 30,
                'pa' => 40,
                'qa' => 50,
                'os' => 60,
                'ss' => 70,
                'bidding_time' => now()->addDay()
            ],
            [
                'name' => 'example.info',
                'da' => 40,
                'pa' => 50,
                'qa' => 60,
                'os' => 70,
                'ss' => 80,
                'bidding_time' => now()->addDays(2)
            ],
            [
                'name' => 'example.biz',
                'da' => 50,
                'pa' => 60,
                'qa' => 70,
                'os' => 80,
                'ss' => 90,
                'bidding_time' => now()->subHours(4)
            ],
            [
                'name' => 'example.co',
                'da' => 60,
                'pa' => 70,
                'qa' => 80,
                'os' => 90,
                'ss' => 100,
                'bidding_time' => now()->addHours(8)
            ],
            [
                'name' => 'example.me',
                'da' => 70,
                'pa' => 80,
                'qa' => 90,
                'os' => 100,
                'ss' => 110,
                'bidding_time' => now()->addHours(12)
            ],
            [
                'name' => 'example.us',
                'da' => 80,
                'pa' => 90,
                'qa' => 100,
                'os' => 110,
                'ss' => 120,
                'bidding_time' => now()->addMonth(1)
            ],
            [
                'name' => 'example.mobi',
                'da' => 90,
                'pa' => 100,
                'qa' => 110,
                'os' => 120,
                'ss' => 130,
                'bidding_time' => now()->addYears(2)
            ],
            [
                'name' => 'example.asia',
                'da' => 100,
                'pa' => 110,
                'qa' => 120,
                'os' => 130,
                'ss' => 140,
                'bidding_time' => now()->addMonth()
            ],
            [
                'name' => 'example.co.id',
                'da' => 110,
                'pa' => 120,
                'qa' => 130,
                'os' => 140,
                'ss' => 150,
                'bidding_time' => now()->subYear(2)
            ]
        ];

        $user->domains()->createMany($domains);
    }
}
