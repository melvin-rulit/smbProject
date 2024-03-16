<?php

namespace App\Services;

use App\Messages\Message;

interface Notifier
{
    public function notify(string $address, Message $message);
    public function notifyWithProfileId(string $address, string $profileId, Message $message);
    public function sendFile(string $address, string $caption, string $filename, string $content);
}
