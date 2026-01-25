<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'About Us',
            'slug' => 'about',
            'content' => 'Tentang kami',
        ]);

        Page::create([
            'title' => 'Contact',
            'slug' => 'contact',
            'content' => 'Halaman kontak',
        ]);
    }
}
