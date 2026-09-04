<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Illuminate\Foundation\Inspiring::quote());
})->purpose('Display an inspiring quote');

// Daily inventory alerts
Artisan::command('inventory:check-alerts', function () {
    $this->info('Checking inventory alerts...');
    // Logic for checking low stock items
})->daily();

// VAT period calculations
Artisan::command('vat:calculate-period', function () {
    $this->info('Calculating VAT for current period...');
    // Logic for VAT calculations
})->quarterly();

// Cleanup old sessions
Artisan::command('session:cleanup', function () {
    DB::table('sessions')->where('last_activity', '<', time() - 86400)->delete();
    $this->info('Old sessions cleaned up.');
})->daily();
