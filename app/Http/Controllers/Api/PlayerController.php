<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PlayerResource::collection(Player::latest()->get());
    }

    /**
     * @param PlayerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlayerRequest $request)
    {
        try {
            $team = Team::find($request->team['id']);
            $player = $team->players()->create($request->only(['first_name', 'last_name']));
            return response()->json(new PlayerResource($player), 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * @param Player $player
     * @return PlayerResource
     */
    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    /**
     * @param PlayerRequest $request
     * @param Player $player
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PlayerRequest $request, Player $player)
    {
        try {
            $team = Team::find($request->team['id']);
            $player->team()->associate($team);
            $player->fill($request->only(['first_name', 'last_name']));
            $player->save();
            return response()->json(new PlayerResource($player), 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
