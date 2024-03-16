<?php

namespace App\Http\Controllers;

use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Http\JsonResponse;

class DealController extends Controller
{
    public function __construct(private Deal $deals)
    {
    }

    public function index(): JsonResponse
    {
        $deals = $this->deals::all();

        return new JsonResponse(['deals' => DealResource::collection($deals)]);
    }

    public function show($id): JsonResponse
    {

        $user = auth()->user();

        if ($user->isAdmin()) {
            $deal = $this->deals->find($id);
        } else {
            $deal = $this->deals->where('branch_id', $user->getBranchId())->where('id', $id)->first();
        }

        if (!$deal) {
            return $this->error('Сделка не найдена');
        }


        return new JsonResponse(['deal' => DealResource::make($deal)]);
    }

    public function delete($id)
    {
        $deal = $this->deals::find($id);

        if (!$deal) {
            return $this->error('Сделка не найдена');
        }

        $deal->delete();

        return $this->success();
    }
}
