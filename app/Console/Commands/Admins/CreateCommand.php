<?php

namespace App\Console\Commands\Admins;

use App\Admin;
use App\Console\Commands\ActypolesCommand;
use Illuminate\Support\Facades\Hash;

class CreateCommand extends ActypolesCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actypoles:admins:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un administrateur.';

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
        parent::handle();

        $firstname = $this->ask('Prénom');
        $lastname = $this->ask('Nom de famille');
        $nickname = $this->ask('Pseudo');
        $email = $this->ask('Email');
        $password = $this->ask('Password');

        $admin = new Admin();
        $admin->firstname = $firstname;
        $admin->lastname = $lastname;
        $admin->nickname = $nickname;
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->save();

        $this->info("L\'administrateur $nickname a été créé avec succés !");
    }
}
