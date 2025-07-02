<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Fashion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/api/fashions', function () {
//     return Fashion::select('id', 'user_id', 'photo_path', 'created_at')
//         ->get()
//         ->map(function ($fashion) {
//             return [
//                 'title' => '',
//                 'start' => $fashion->created_at->toDateString(),
//                 'id' => $fashion->id,
//                 'photo_url' => asset('storage/' . $fashion->photo_path),
//                 'url' => route('fashions.show', $fashion->id), // ← 詳細ページへのリンク
//             ];
//         });
// });


Route::get('/fashions', function (\Illuminate\Http\Request $request) {
    $start = $request->query('start');
    $end = $request->query('end');

    return \App\Models\Fashion::whereBetween('created_at', [$start, $end])
        ->get()
        ->map(function ($fashion) {
            return [
                'title' => '',
                'start' => $fashion->created_at->toDateString(),
                'id' => $fashion->id,
                'photo_url' => asset('storage/avatar/' . $fashion->photo_path),
                'url' => route('fashions.show', $fashion),
            ];
        });
});
