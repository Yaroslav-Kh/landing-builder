<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $domains = [
            'blog.jun',
            'news.jun',
            'spirit.jun',
        ];

        foreach ($domains as $domain) {
            Domain::create([
                'domain' => $domain,
            ]);
        }
    }
}
