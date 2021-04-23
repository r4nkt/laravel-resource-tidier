<?php

namespace R4nkt\ResourceTidier\Commands;

use Illuminate\Console\Command;
use R4nkt\ResourceTidier\Support\Facades\ResourceTidier;

class Tidy extends Command
{
    protected $signature = 'resource-tidier:tidy {tidier}';

    public $description = 'Runs the named tidier, culls and handles.';

    public function handle()
    {
        $this->info('Tidying...');

        $tidier = ResourceTidier::tidier($this->argument('tidier'));

        $this->info('Culling...');

        $count = $tidier->cull();

        $this->info("Done. Culled {$count}...");

        $this->info('Handling...');

        $count = $tidier->handle();

        $this->info("Done. Handled {$count}...");

        $this->info('All done!');
    }
}
