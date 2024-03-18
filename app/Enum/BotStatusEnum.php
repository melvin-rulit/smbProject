<?php

namespace App\Enum;

class BotStatusEnum
{
    const NOT_STARTED = 'not_started';
    const RUNNING = 'running';
    const STOPPED = 'stopped';
    const CLEARED = 'cleared';
    const NAMES = [
        self::NOT_STARTED => 'не запускался',
        self::RUNNING => 'работает',
        self::STOPPED => 'остановлен',
        self::CLEARED => 'очищен',
    ];
    const COLORS = [
        self::NOT_STARTED => 'primary',
        self::RUNNING => 'success',
        self::STOPPED => 'danger',
        self::CLEARED => 'warning',
    ];
}
