<?php

namespace App\Http\Controllers;


use App\Enum\ExchangeEnum;
use App\Models\UserSubAccount;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class UserSubAccountsListController extends Controller
{
    public function getAllSubAccounts(): JsonResponse
    {
        $list = UserSubAccount::where('user_id', auth()->id())->with('bots')->get();

        $items = [];
        foreach ($list as $v) {
            $bots = $v->bots->map(function ($bot) {
                return [
                    'id' => $bot->id,
                    'name' => $bot->name,
                    // Добавьте другие поля бота, которые вам нужны
                ];
            });

            $items[] = [
                'id' => $v->id,
                'name' => $v->name,
                'exchange' => $v->exchange,
                'count' => rand(1, 10),
                'bots' => $bots->toArray(), // Перевести коллекцию ботов в массив
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
    }
    public  function getExchanges(): JsonResponse
    {
        $exchangeNames = ExchangeEnum::FOR_SELECT;

        return new JsonResponse(
            [
                'exchangeNames' => $exchangeNames,
            ]
        );
    }
}
