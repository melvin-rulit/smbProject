<?php

namespace App\Enum;

class BotStrategyTypeEnum
{
    const BASIC = 'basic';
    const FLOATING = 'floating';
    const NAMES = [
        self::BASIC => 'Стратегия с фиксированным процентом',
        self::FLOATING => 'Стратегия с искуственным интелектом',
    ];
    const VALUES = [
        self::BASIC,
        self::FLOATING,
    ];
}
