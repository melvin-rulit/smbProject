<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ClientResource;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * ClientController constructor.
     */
    public function __construct(private Client $client)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $clientsQuery = $this->client->newQuery();
        } else {
            $clientsQuery = $this->client->newQuery()->where('branch_id', $user->getBranchId());
        }

        if ($query = $request->query('query')) {
            $clientsQuery->where('phone_number', 'like', "%{$query}%")
                ->orWhere('first_name', 'like', "%{$query}%")
                ->orWhere('middle_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        }

        $clients = $clientsQuery->get();

        return new JsonResponse(['clients' => ClientResource::collection($clients)]);
    }

    public function show($id): JsonResponse
    {
        $client = $this->client->find($id);

        if (!$client) {
            return $this->error('Клиент не найден');
        }

        return new JsonResponse(['client' => ClientResource::make($client)]);
    }

    public function store(CreateClientRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $client = $this->client->newInstance();

        $client->first_name = $request->getFirstName();
        $client->middle_name = $request->getMiddleName();
        $client->last_name = $request->getLastName();
        $client->birthday = $request->getBirthday();
        $client->passport_series = $request->getPassportSeries();
        $client->passport_number = $request->getPassportNumber();
        $client->passport_notes = $request->getPassportNotes();
        $client->registration_address = $request->getRegistrationAddress();
        $client->residence_address = $request->getResidenceAddress();
        $client->phone_number = $request->getPhone();
        $client->email = $request->getEmail();
        $client->comment = $request->getComment();
        $client->branch_id = $user->getBranchId();
        $client->resident_card = $request->getResidentCard();
        $client->personnel_number = $request->getPersonnelNumber();

        $client->save();

        return new JsonResponse(['client' => ClientResource::make($client)]);
    }

    public function update(UpdateClientRequest $request, int $id): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $client = $this->client->find($id);

        if (!$client || $client->branch_id !== $user->getBranchId()) {
            return $this->error('Клиент не найден');
        }

        $client->first_name = $request->getFirstName();
        $client->middle_name = $request->getMiddleName();
        $client->last_name = $request->getLastName();
        $client->birthday = $request->getBirthday();
        $client->passport_series = $request->getPassportSeries();
        $client->passport_number = $request->getPassportNumber();
        $client->passport_notes = $request->getPassportNotes();
        $client->registration_address = $request->getRegistrationAddress();
        $client->residence_address = $request->getResidenceAddress();
        $client->phone_number = $request->getPhone();
        $client->email = $request->getEmail();
        $client->comment = $request->getComment();
        $client->branch_id = $user->getBranchId();
        $client->resident_card = $request->getResidentCard();
        $client->personnel_number = $request->getPersonnelNumber();

        $client->save();

        return new JsonResponse(
            [
                'client' => ClientResource::make($client),
            ]
        );
    }

    public function delete($id)
    {
        $client = $this->client::find($id);

        if (!$client) {
            return $this->error('Клиент не найден');
        }

        $client->delete();
    }
}
