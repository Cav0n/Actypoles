<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ActypolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actypoles:logo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Montre le logo des commandes Actypoles.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('
            ___        __                    __
           /   | _____/ /___  ______  ____  / /__  _____
          / /| |/ ___/ __/ / / / __ \/ __ \/ / _ \/ ___/
         / ___ / /__/ /_/ /_/ / /_/ / /_/ / /  __(__  )
        /_/  |_\___/\__/\__, / .___/\____/_/\___/____/
                       /____/_/
        ');
    }
}
