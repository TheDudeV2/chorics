<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class freshdb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freshdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate:fresh + db:seed';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}
