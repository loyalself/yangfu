<?php

namespace App\Jobs;

use App\Model\Notice;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    private $notice;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notice $notice)
    {
        //
        $this->notice = $notice;
    }

    /**
     * Execute the job.
     * 这个handle指的是job要做的事情
     * @return void
     */
    public function handle()
    {
        //通知每个用户系统信息
        $users = \App\User::all();
        foreach ($users as $user)
        {
            $user->addNotice($this->notice);
        }
    }
}
