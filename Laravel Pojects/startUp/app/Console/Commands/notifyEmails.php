<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\notifyEmail;

class notifyEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify user by email each x time';

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
       // $users=User::select('email')->get();
        $emails=User::pluck('email')->to_array();
        $data=["title"=>"Email title","body"=>"Email Body"];
        foreach ($emails as $email) {
            # code...
            Mail::to($email)->send(new notifyEmail($data));
        }
    }
}
