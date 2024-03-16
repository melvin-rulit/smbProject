<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\BranchResource;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Http\Requests\Branch\CreateBranchRequest;

class BranchController extends Controller
{
    public function __construct(private Branch $branches)
    {
    }

    public function index(): JsonResponse
    {
        $branches = $this->branches::all();
        return new JsonResponse(['branches' => BranchResource::collection($branches)]);
    }

    public function show($id): JsonResponse
    {
        $branch = $this->branches->find($id);

        if (!$branch) {
            return $this->error('Филиал не найден');
        }

        return new JsonResponse(['branch' => BranchResource::make($branch)]);
    }

    public function store(CreateBranchRequest $request): JsonResponse
    {
        $branch = $this->branches->newInstance();
        $branch->name = $request->getName();
        $branch->address = $request->getAddress();
        $branch->save();

        return new JsonResponse(['branch' => BranchResource::make($branch)]);
    }

    public function update(UpdateBranchRequest $request, int $id): JsonResponse
    {

        $branch = $this->branches->find($id);

        if (!$branch) {
            return $this->error('Филиал не найден');
        }

        $branch->name = $request->getName();
        $branch->address = $request->getAddress();
        $branch->save();

        return new JsonResponse(['branch' => BranchResource::make($branch)]);
    }

    public function delete(int $id): JsonResponse
    {
        $branch = $this->branches->find($id);

        if (!$branch) {
            return $this->error('Филиал не найден');
        }

        $branch->delete();

        return $this->success();
    }


}
