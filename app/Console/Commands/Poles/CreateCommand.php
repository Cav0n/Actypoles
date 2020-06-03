<?php

namespace App\Console\Commands\Poles;

use App\Pole;
use App\PoleI18n;
use Illuminate\Console\Command;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actypoles:poles:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un pôle.';

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
        $code = $this->ask('Code (laissez vide pour générer automatiquement :');
        $title = $this->ask('Titre :');
        $description = $this->ask('Description :');
        $lang = $this->ask('Langue (laissez vide pour français) :');

        if (null === $code) {
            $code = preg_replace('/\s+/', '-', $title);
        }

        $pole = new Pole();
        $pole->code = $code;
        $pole->save();

        $poleI18n = new PoleI18n();
        $poleI18n->pole_id = $pole->id;
        $poleI18n->lang = $lang;
        $poleI18n->title = $title;
        $poleI18n->description = $description;
        $poleI18n->save();

        $this->info("Le pôle $title a été créé avec succés !");
    }
}
