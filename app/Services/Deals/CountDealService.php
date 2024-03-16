<?php

namespace App\Services\Deals;

use App\Models\Deal;

class CountDealService
{

    public function count_cost_of_rent()
    {
        return Deal::sum('cost_of_rent');
    }

    public function count_cost_of_buyout()
    {
        return Deal::sum('cost_of_buyout');
    }

    public function count_remain()
    {
        return Deal::sum('remain');
    }


}
