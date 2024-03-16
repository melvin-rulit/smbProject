<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;

class UserController extends Controller
{
const PER_PAGE = 20;

    /**
     * UserController constructor.
     */
    public function __construct(private User $users)
    {
    }

   public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()){
            $users = $this->users;
        } else {
            $users = $this->users->where('branch_id', $user->getBranchId());
        }
        if ($query = $request->query('query')) {
            $users->where('first_name', 'like', "%{$query}%")
                ->orWhere('middle_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%");
        }

        $users = $users->paginate(self::PER_PAGE);

        return new JsonResponse(
            [
                'users' => UserResource::collection($users),
                'limit' => self::PER_PAGE,
                'total' => $users->total(),
            ]
        );
    }
    public function show($id): JsonResponse
    {
        $user = $this->users->find($id);

        if (!$user) {
            return $this->error('Филиал не найден');
        }

        return new JsonResponse(['user' => UserResource::make($user)]);
    }

    public function store(UserCreateRequest $request): JsonResponse
    {
        $user = $this->users->newInstance();

        $user->email = $request->getEmail();
        $user->password = \Hash::make($request->getPassword());
        $user->role_id = $request->getRoleId();
        $user->enabled = $request->isEnabled();
        $user->branch_id = $request->getBranchId();

        $user->first_name = $request->getFirstName();
        $user->middle_name = $request->getMiddleName();
        $user->last_name = $request->getLastName();
        $user->birthday = $request->getBirthday();
        $user->passport_series = $request->getPassportSeries();
        $user->passport_number = $request->getPassportNumber();
        $user->passport_notes = $request->getPassportNotes();
        $user->registration_address = $request->getRegistrationAddress();
        $user->phone_number = $request->getPhone();
        $user->comment = $request->getComment();

        $user->save();

        return new JsonResponse(['user' => UserResource::make($user)]);
    }
    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        $user = $this->users->find($id);

        if (!$user) {
            return $this->error('Пользователь не найден');
        }
        $user->role_id = $request->getRoleId();
        $user->enabled = $request->isEnabled();

        $user->first_name = $request->getFirstName();
        $user->middle_name = $request->getMiddleName();
        $user->last_name = $request->getLastName();
        $user->birthday = $request->getBirthday();
        $user->passport_series = $request->getPassportSeries();
        $user->passport_number = $request->getPassportNumber();
        $user->passport_notes = $request->getPassportNotes();
        $user->registration_address = $request->getRegistrationAddress();
        $user->phone_number = $request->getPhone();
        $user->comment = $request->getComment();

        if ($request->getPassword()) {
            $user->password = \Hash::make($request->getPassword());
        }

        $user->branch_id = $request->getBranchId();

        $user->save();

        return new JsonResponse(['user' => UserResource::make($user)]);
    }

    public function delete(int $id)
    {
        $user = $this->users::find($id);

        if (!$user){
            return $this->error('Пользователь не найден');
        }

        $user->delete();

        return $this->success();
    }

    public function current(): JsonResponse
    {
       return new JsonResponse(['user' => UserResource::make(auth()->user())]);
    }

    public function managersList(): JsonResponse
    {
        $managersList = [];
        $managers = User::whereIn('role_id', [User::ROLE_MANAGER, User::ROLE_ADMIN])->get();

        foreach ($managers as $manager) {
            $managersList[] = ['id' => $manager->id, 'name' => $manager->getFullName()];
        }

        return new JsonResponse(['managers' => $managersList]);
    }

    public function adminsList(): JsonResponse
    {
        $adminsList = [];
        $admins = User::whereIn('role_id', [User::ROLE_MANAGER, User::ROLE_ADMIN])->get();

        foreach ($admins as $admin) {
            $adminsList[] = ['id' => $admin->id, 'name' => $admin->getFullName()];
        }

        return new JsonResponse(['admins' => $adminsList]);
    }

    public function investorsList(): JsonResponse
    {
        $adminsList = [];
        $investors = User::where('role_id', '=', User::ROLE_INVESTOR)->get();

        foreach ($investors as $investor) {
            $adminsList[] = ['id' => $investor->id, 'name' => $investor->getFullName()];
        }

        return new JsonResponse(['investors' => $adminsList]);
    }

}
