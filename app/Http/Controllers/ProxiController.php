<?php

namespace App\Http\Controllers;

use App\Models\Proxi;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProxiResource;
use App\Http\Requests\Proxi\UpdateProxiRequest;
use App\Http\Requests\Proxi\CreateProxiRequest;

class ProxiController extends Controller
{
    private Proxi $proxi;

    public function __construct(Proxi $proxi)
    {
        $this->proxi = $proxi;
    }

    public function index(): JsonResponse
    {
        $proxies = $this->proxi::all();
        return new JsonResponse(['proxies' => ProxiResource::collection($proxies)]);
    }

    public function show(int $id): JsonResponse
    {
        $proxi = $this->proxi->find($id);

        if (!$proxi) {
            return $this->error('Доверенность не найдена');
        }

        return new JsonResponse(['proxi' => ProxiResource::make($proxi)]);
    }

    public function dict(): JsonResponse
    {
        $proxies = [];

        foreach ($this->proxi::all() as $proxy) {
            $proxies[] = [
                'id'   => $proxy->id,
                'name' => $proxy->getName(),
            ];
        }

        return new JsonResponse(['proxies' => $proxies]);
    }

    public function update(UpdateProxiRequest $request, int $id): JsonResponse
    {
        $proxi = $this->proxi->find($id);

        if (!$proxi) {
            return $this->error('Доверенность не найдена');
        }

        $proxi->delegate_id = $request->getDelegateId();
        $proxi->owner_id = $request->getOwnerId();
        $proxi->number = $request->getNumber();
        $proxi->valid_until = $request->getValidUntil();
        $proxi->issued_by = $request->getIssuedBy();
        $proxi->issued_number = $request->getIssuedNumber();

        $proxi->save();

        return new JsonResponse(['proxi' => ProxiResource::make($proxi)]);
    }

    public function store(CreateProxiRequest $request): JsonResponse
    {
        $proxi = $this->proxi->newInstance();

        $proxi->delegate_id = $request->getDelegateId();
        $proxi->owner_id = $request->getOwnerId();
        $proxi->number = $request->getNumber();
        $proxi->valid_until = $request->getValidUntil();
        $proxi->issued_by = $request->getIssuedBy();
        $proxi->issued_number = $request->getIssuedNumber();

        $proxi->save();

        return new JsonResponse(['proxi' => ProxiResource::make($proxi)]);
    }

    public function delete(int $id): JsonResponse
    {
        $proxi = $this->proxi->find($id);

        if (!$proxi) {
            return $this->error('Доверенность не найдена');
        }

        $proxi->delete();

        return $this->success();
    }

}
