<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('site_settings')->insert([
            'id' => 1,
            'logo' => '',
            'favicon' => '',
            'site_title' => 'India Health Care',
            'app_name' => 'India Health Care',
            'meta_description' => '',
            'meta_keywords' => '',
            'about' => '',
            'phone' => '',
            'address' => '',
            'email' => '',
            'facebook' => '#',
            'twitter' => '#',
            'pinterest' => '#',
            'instagram' => '',
            'youtube' => '',
            'copywrite' => '',
            'pagination' => 10,
            'script' => '',
        ]);
    }
}
