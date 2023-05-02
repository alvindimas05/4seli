<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CanCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $id_user;
    public function __construct(string $id_user)
    {
        $this->id_user = $id_user;
    }
    public function handle(): void
    {
        User::whereIdUser($this->id_user)->update([ "canComment" => 1 ]);
    }
}