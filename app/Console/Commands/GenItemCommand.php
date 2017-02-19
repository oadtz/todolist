<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Item;

class GenItemCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todolist:gen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        for ($i = 0; $i < 1000; $i++) {
            $item = new Item([
                'subject'           =>  \Lipsum::short()->text(1),
                'description'       =>  \Lipsum::short()->text(3),
            ]);
            
            $dueDate = rand(-50, 100);
            $isDone = rand(-1, 1);

            if ($dueDate > -20) {
                $item->due_date = \Carbon\Carbon::now()->addDays($dueDate)->hour(23)->minute(59);
            }

            $item->is_done = boolval($isDone);
            
            $item->save();
        }
    }
}
