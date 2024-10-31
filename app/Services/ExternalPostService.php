<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalPostService
{
    public static function fetchPosts()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://jsonplaceholder.typicode.com/posts');

        return $response->successful() ? $response->json() : [];
    }
}