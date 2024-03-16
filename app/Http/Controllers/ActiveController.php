<?php

namespace App\Http\Controllers;

use App\Http\Requests\Active\CreateActiveRequest;
use App\Http\Requests\Active\UpdateActiveRequest;
use App\Models\Active;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ActiveResource;

class ActiveController extends Controller
{
    public function __construct(private Active $active)
    {
    }

    public function index(): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $actives = $this->active::all();
        } else {
            $actives = $this->active::where('branch_id', $user->getBranchId())->get();
        }

        return new JsonResponse(['actives' => ActiveResource::collection($actives)]);
    }

    public function show($id){
        $active = $this->active::find($id);

        if (!$active) {
            return $this->error('Актив не найден');
        }
        return new JsonResponse(['active' => ActiveResource::make($active)]);
    }

    public function store(CreateActiveRequest $request): JsonResponse
    {
        $active = $this->active->newInstance();

        $active->name = $request->getModel();
        $active->body_number = $request->getBodyNumber();
        $active->reg_number = $request->getRegNumber();
        $active->year = $request->getYear();
        $active->color_id = $request->getColorId();
        $active->cost = $request->getCost();
        $active->cost_of_rent = $request->getCostOfRent();
        $active->cost_of_buyout = $request->getCostOfBuyout();
        $active->investor_id = $request->getInvestorId();
        $active->branch_id = $request->getBranchId();
        $active->osago = $request->getOsago();
        $active->osago_number = $request->getOsagoNumber();
        $active->document_series = $request->getDocumentSeries();
        $active->document_number = $request->getDocumentNumber();
        $active->document_date = $request->getDocumentDate();
        $active->document_notes = $request->getDocumentNotes();

        $active->save();

        return new JsonResponse(['active' => ActiveResource::make($active)]);
    }

    public function update(UpdateActiveRequest $request, int $id): JsonResponse
    {
        $active = $this->active->find($id);

        if (!$active) {
            return $this->error('Актив не найден');
        }

        $active->name = $request->getModel();
        $active->body_number = $request->getBodyNumber();
        $active->reg_number = $request->getRegNumber();
        $active->year = $request->getYear();
        $active->color_id = $request->getColorId();
        $active->cost = $request->getCost();
        $active->cost_of_rent = $request->getCostOfRent();
        $active->cost_of_buyout = $request->getCostOfBuyout();
        $active->investor_id = $request->getInvestorId();
        $active->branch_id = $request->getBranchId();
        $active->osago = $request->getOsago();
        $active->osago_number = $request->getOsagoNumber();
        $active->document_series = $request->getDocumentSeries();
        $active->document_number = $request->getDocumentNumber();
        $active->document_date = $request->getDocumentDate();
        $active->document_notes = $request->getDocumentNotes();

        $active->save();

        return new JsonResponse(['active' => ActiveResource::make($active)]);
    }

    public function delete($id){
        $active = $this->active::find($id);

        if (!$active){
            return $this->error('Актив не найден');
        }

        $active->delete();

        return $this->success();
    }
}
