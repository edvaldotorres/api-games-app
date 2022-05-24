<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use Symfony\Component\HttpFoundation\JsonResponse;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $games = Game::simplePaginate(5);

        if ($games->isEmpty()) {
            return $this->notFound('No games found.');
        }

        return $this->successWithArgs($games);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request): JsonResponse
    {
        Game::create($request->validated());

        return $this->created('Game created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $game = Game::find($id);

        if (!$game) {
            return $this->notFound('Game not found.');
        }

        return $this->successWithArgs($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, $id): JsonResponse
    {
        $game = Game::find($id);

        if (!$game) {
            return $this->notFound('Game not found.');
        }

        $game->update($request->validated());

        return $this->success('Game updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $game = Game::find($id);

        if (!$game) {
            return $this->notFound('Game not found.');
        }

        $game->delete();

        return $this->success('Game deleted.');
    }
}
