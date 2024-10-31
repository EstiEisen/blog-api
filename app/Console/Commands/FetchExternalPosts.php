<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExternalPostService;
use App\Models\Post;

class FetchExternalPosts extends Command
{
    protected $signature = 'posts:fetch-external';
    protected $description = 'Fetches posts from an external API';

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
                Post::updateOrCreate(
                    ['title' => $post['title']], 
                    ['content' => $post['body'],
                    'publication_date' =>  now()]  
                );
            }
        } else {
            $this->error('No posts were retrieved.');
        }

        return 0;
    }
}