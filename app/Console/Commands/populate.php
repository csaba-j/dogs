<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class populate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates the database with an amount of dogs from the DogAPI';

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
        $count = $this->ask('How many dogs do you want to get?');
        $this->info('The command was successful! Count:'.$count);

        return 0;
    }
}
