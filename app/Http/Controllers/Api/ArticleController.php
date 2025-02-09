<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index(){
        // $articles = Article::latest()->with(['user'])->get();
        // $articles = Cache::remember('articles', now()->addMinutes(10), function () {
        //     return Article::where('is_visible', true)
        //     ->latest()
        //     ->with(['user'])
        //     ->get();
        // });

        // $articles = Cache::remember('articles', now()->addMinutes(10), function () {
            $articles = Article::where('is_visible', true)
                ->latest()
                ->with(['user']) // لود کردن user و seo
                ->get();
        // });
        
        return Response::success(null, ArticleResource::collection($articles));
    }

    public function show($id){
        
        // $article = Cache::remember("article_{$id}", now()->addMinutes(10), function () use ($id) {
            // return Article::where('id', $id)
            //     ->where('is_visible', true)
            //     // ->select('id', 'title', 'slug', 'image', 'text', 'created_at')
            //     ->with('user:id,name')
            //     ->first();
        // });
    
        $article = Article::where('id', $id)
            ->where('is_visible', true)
            ->with(['user', 'seo'])
            ->first();

        if (!$article) {
            return Response::error('Article not found');
        }

        return Response::success(null, new ArticleResource($article));
    }
}
