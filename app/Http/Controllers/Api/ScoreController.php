<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScoreRequest;
use App\Models\Score;
use Symfony\Component\HttpFoundation\JsonResponse;

class ScoreController extends Controller
{
    /**
     * @param ScoreRequest $request
     * @return JsonResponse
     */
    public function index($id): JsonResponse
    {
        $ranking = Score::getRanking($id);

        if ($ranking->isEmpty()) {
            return $this->notFound('No ranking found.');
        }

        return $this->successWithArgs($ranking);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScoreRequest $request): JsonResponse
    {
        Score::create($request->validated());

        return $this->created('Score created.');
    }
}
