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


Route::get('/fashions', function (Request $request) {
    $start = $request->query('start');
    $end = $request->query('end');
    $user_id = $request->query('user_id');

    return response()->json(
        Fashion::whereBetween( 'created_at', [$start, $end])
            ->where('user_id', Auth::user()->id)
            ->get()
            ->map(function ($fashion) {
                return [
                    'title' => '',
                    'start' => $fashion->created_at->toDateString(),
                    'id' => $fashion->id,
                    'photo_url' => asset('storage/avatar/' . $fashion->photo_path),
                    'url' => route('fashions.show', $fashion),
                ];
            })
        );
});
