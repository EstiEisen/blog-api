<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExternalPostService;

class FetchExternalPosts extends Command
{
    protected $signature = 'posts:fetch-external';
    protected $description = 'Fetches posts from an external API and displays them';

    protected $postService;

    public function __construct(ExternalPostService $postService)
    {
        parent::__construct();
        $this->postService = $postService;
    }

    public function handle()
    {
        $posts = $this->postService->fetchPosts();

        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $this->info("Title: {$post['title']}");
                $this->line("Body: {$post['body']}");
                $this->line(str_repeat('-', 20));
            }
        } else {
            $this->error('No posts were retrieved.');
        }

        return 0;
    }
}