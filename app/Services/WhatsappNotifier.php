<?php

namespace App\Services;


use App\Messages\Message;
use App\Services\Clients\WhatsappClient;

class WhatsappNotifier implements Notifier
{
    private WhatsappClient $client;

    public function __construct(WhatsappClient $client)
    {
        $this->client = $client;
    }

    public function notify(string $address, Message $message): void
    {
        $this->client->notify($address, $message);
    }

    public function notifyWithProfileId(string $address, string $profileId, Message $message): void
    {
        $this->client->notifyWithProfileId($address, $profileId, $message);
    }

    public function sendFile(string $address, string $caption, string $filename, string $content): void
    {
        $this->client->sendFile($address, $caption, $filename, $content);
    }
}
