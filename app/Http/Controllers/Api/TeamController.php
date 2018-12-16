<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamPlayersResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TeamResource::collection(Team::latest()->get());
    }

    /**
     * @param TeamRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TeamRequest $request)
    {
        try{
            $team = Team::create($request->all());
            return response()->json(new TeamResource($team), 200);
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * @param Team $team
     * @return TeamPlayersResource
     */
    public function show(Team $team)
    {
        return new TeamPlayersResource($team);
    }
}
