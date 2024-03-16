<?php

namespace App\Http\Controllers;


use App\Models\UserSubAccount;
use Illuminate\Routing\Controller as BaseController;

class UserSubAccountsListController extends Controller
{
    public function list()
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

        return response()->json($json);
    }
}
