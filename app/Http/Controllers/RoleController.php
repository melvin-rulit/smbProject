<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(
            [
                'roles' => [
                    ['id' => User::ROLE_ADMIN, 'name' => 'Администратор'],
                    ['id' => User::ROLE_MANAGER, 'name' => 'Менеджер'],
                    ['id' => User::ROLE_INVESTOR, 'name' => 'Инвестор'],
                ]
            ]
        );


    }
}
