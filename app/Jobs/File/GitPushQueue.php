<?php


namespace App\Jobs\File;

use App\Jobs\BaseQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GitPushQueue extends BaseQueue
{

    protected $path = "/home/wwwroot/api/storage/app/sh/git_push.sh";

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $activeKey = "git-push-active";
        $active = Cache::get($activeKey);
        while (Cache::get($activeKey)) {
            exec($this->path, $output, $return_var);
            Cache::forever("git-push-last", [
                'time' => date('Y-m-d H:i:s'),
                "output" => $output,
                "return_var" => $return_var
            ]);
            Log::info("git push");
            Cache::forever("assets-md", Storage::allFiles("public/assets/md"));
            Cache::forever("assets-file", Storage::allFiles("public/assets/file"));
            if (Cache::get($activeKey) == $active) {
                Cache::forget($activeKey);
            }
        }
    }
}
