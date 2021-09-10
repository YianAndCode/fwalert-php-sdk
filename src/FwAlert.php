<?php

namespace FwAlert;

use FwAlert\Helpers\Http;

class FwAlert
{
    private $channels = [];

    public function SendAlert(string $webhook_url, array $variables)
    {
        $http_client = new Http;
        return $http_client->post($webhook_url, $variables);
    }

    public function AddChannel(string $channel, string $webhook_url)
    {
        $this->channels[$channel] = $webhook_url;
    }

    public function GetChannel(string $channel): string
    {
        return @$this->channels[$channel];
    }

    public function RemoveChannel(string $channel)
    {
        unset($this->channels[$channel]);
    }

    public function Send(string $channel, array $variables)
    {
        $webhook_url = $this->GetChannel($channel);
        if ($webhook_url) {
            return $this->Webhook($webhook_url, $variables);
        }
        return false;
    }
}
