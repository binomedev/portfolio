<?php

namespace Binomedev\Portfolio\Commands;

use Illuminate\Console\Command;

class PortfolioCommand extends Command
{
    public $signature = 'portfolio';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
