<?php

namespace FwAlert;

use FwAlert\Helpers\Http;

class FwAlert
{
    public function Webhook(string $webhook_url, array $variables)
    {
        $http_client = new Http;
        return $http_client->post($webhook_url, $variables);
    }
}
