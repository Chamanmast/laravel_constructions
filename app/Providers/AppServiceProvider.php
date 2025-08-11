<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Models\SmtpSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('components.pagination.default');

        Paginator::defaultSimpleView('components.pagination.simple');
        if (Schema::hasTable('site_settings')) {
            $site_settings = SiteSetting::first();
            if ($site_settings) {
                $data = $site_settings->app_name;

                Config(['app.name' => $data]);
            }
        } // End If
        if (Schema::hasTable('smtp_settings')) {

            $smtpsetting = SmtpSetting::first();
            if ($smtpsetting) {
                $data = [

                    'driver' => $smtpsetting->mailer,
                    'host' => $smtpsetting->host,
                    'port' => $smtpsetting->port,
                    'username' => $smtpsetting->username,
                    'password' => $smtpsetting->password,
                    'encryption' => $smtpsetting->encryption,
                    'from' => [
                        'address' => $smtpsetting->from_address,
                        'name' => $smtpsetting->from_name,
                    ],
                ];
                config(['app.mail' => $data]);
            }
        } // End If
    }
}
