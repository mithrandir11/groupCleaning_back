<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function($message, $data, $pagination = null) {
            $response = [
                'status' => 1,
                'message' => $message,
                'data' => $data,
            ];
            
            if (!is_null($pagination)) $response['pagination'] = $pagination;
            
            return response()->json($response);
        });
        

        Response::macro('error', function($message, $data = null, $code = 400) {
            return response()->json([
                'status' => 0,
                'message' => $message,
                'data' => $data,
            ], $code);
        });

        
    }
}
