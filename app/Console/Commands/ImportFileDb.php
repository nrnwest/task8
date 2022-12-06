<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportFileDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import_file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing data about the race into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        if (1 === $this->call('migrate:status')) {
            $this->call('migrate');
            $this->call('db:seed');

            return 0;
        }
        $this->call('migrate:fresh');
        $this->call('db:seed');

        return 0;
    }
}
