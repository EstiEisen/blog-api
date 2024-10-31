<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalPostService
{
    public static function fetchPosts()
    {
        // שליחת בקשת GET ל-API של JSONPlaceholder
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://jsonplaceholder.typicode.com/posts');

        // בדיקה אם הבקשה הצליחה והמרת התגובה למערך
        return $response->successful() ? $response->json() : [];
    }
}