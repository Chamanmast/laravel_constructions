<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmtpSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('smtp_settings')->insert([
            'id' => 1,
            'mailer' => 'smtp',
            'host' => 'mail.mastheadtechnologies.in',
            'port' => '465',
            'username' => 'support@mastheadtechnologies.in',
            'password' => 'chaman@123#', // Consider encrypting or using env() in production
            'encryption' => 'ssl',
            'from_name' => 'Masthead Technologies',
            'from_email' => 'support@mastheadtechnologies.in',
            'created_at' => '2023-07-25 02:04:21',
            'updated_at' => '2024-09-20 11:55:57',
        ]);
    }
}
