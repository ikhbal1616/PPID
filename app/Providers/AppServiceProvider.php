<?php

namespace App\Providers;

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
        // Auto-run migrations and seeds in local environment
        if (app()->environment('local')) {
            try {
                $migrator = app('migrator');
                $paths = array_merge([database_path('migrations')], $migrator->paths());
                $files = $migrator->getMigrationFiles($paths);
                $ran = $migrator->getRepository()->getRan();
                $pending = array_diff(array_keys($files), $ran);
                if (count($pending) > 0) {
                    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                }
                
                // If the permohonans table is empty, auto-seed it
                if (\Illuminate\Support\Facades\Schema::hasTable('permohonans') && \App\Models\Permohonan::count() === 0) {
                    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'PermohonanSeeder', '--force' => true]);
                }
            } catch (\Exception $e) {
                // Silently ignore connection errors or uninitialized database tables
            }
        }

        // Shared global variables for admin views
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('users')) {
                $adminUser = \App\Models\User::first();
                if (!$adminUser) {
                    $adminUser = \App\Models\User::create([
                        'name' => 'Admin Humas',
                        'email' => 'admin@unbrah.ac.id',
                        'password' => bcrypt('password123'),
                    ]);
                }
                view()->share('adminUser', $adminUser);
            }
        } catch (\Exception $e) {
            // Silently ignore database errors
        }
    }
}
