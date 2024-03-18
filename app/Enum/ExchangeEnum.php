<?php

namespace App\Enum;

class ExchangeEnum
{
    const BINANCE = 'binance';
    const BYBIT = 'bybit';
    const NAMES = [
        self::BINANCE => 'Binance',
        self::BYBIT => 'Bybit',
    ];
    const FOR_SELECT = [
        ['id' => self::BINANCE, 'name' => 'Binance'],
        ['id' => self::BYBIT, 'name' => 'Bybit'],
    ];
}
