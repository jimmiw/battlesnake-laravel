<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Game\MoveRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
    return response()->json([
        'apiversion' => '1',
        'version' => '1.0.0',
        'author' => 'Jimmi Westerberg',
        'color' => '#670000',
        'head' => 'sneaky',
        'tail' => 'skinny-jeans'
    ]);
});

Route::post('/start', function (Request $request) {
    return response()->json([
        'status' => 'ok',
    ]);
});

Route::post('/move', function (Request $request) {
    $moveRequest = new MoveRequest($request->json()->all());

    // choosing the standard engine for processing the move
    $engine = new \App\Models\Engines\StandardEngine();

    // making the engine calculate the next move based on the request
    $move = $engine->processMove($moveRequest);

    return response()->json([
        'move' => $move,
        'shout' => 'Moving ' . $move,
    ]);
});
