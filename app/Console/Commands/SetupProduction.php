<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupProduction extends Command
{
    protected $signature = 'clensmedix:setup';

    protected $description = 'Run migrations and create the public storage link for production';

    public function handle(): int
    {
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);
        $this->line(Artisan::output());

        $this->info('Creating storage link...');
        Artisan::call('storage:link');
        $this->line(Artisan::output());

        $this->info('Done. Careers form database and uploads are ready.');

        return self::SUCCESS;
    }
}
