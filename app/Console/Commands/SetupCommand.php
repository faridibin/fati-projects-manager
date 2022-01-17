<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Setting up ' . config('app.name') . '...');

        //Clear Database
        $this->call('migrate:fresh');

        //Setup Laravel Passport
        $this->call('passport:install');

        if ($this->option('seed')) {
            $this->comment('Importing data into database.');

            //Run Database Seeder
            $this->call('db:seed');
        }

        $this->info("Finished setup!");
    }
}
