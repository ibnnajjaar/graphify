<?php

namespace Ibnnajjaar\Graphify\Commands;

use Illuminate\Console\Command;

class GraphifyCommand extends Command
{
    public $signature = 'graphify';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
