<?php

namespace App\Http\Controllers;


use App\Models\UserSubAccount;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class UserSubAccountsListController extends Controller
{
    public function getAllSubAccounts(): JsonResponse
    {
        $list = UserSubAccount::where('user_id', auth()->id())->get();

        $items = [];
        foreach ($list as $v) {
            $items[] = [
                'id' => $v->id,
                'text' => $v->name,
                'exchange' => $v->exchange,
            ];
        }

        $json = [
            'total_count' => $list->count(),
            'incomplete_results' => true,
            'items' => $items,
        ];


        return new JsonResponse(
            [
                'sub_accounts' => $json,
            ]
        );
//        return response()->json($json);
    }
}
