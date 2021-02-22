<?php

namespace WeAreModus\MailgunWebhooks;

class Webhook
{
    /**
     * Validate and raise an appropriate event.
     *
     * @param  $payload
     * @param  array $signature
     * @param  string $secret
     * @return WeAreModus\MailgunWebhooks\Event
     */
    public static function constructEvent(array $payload, array $signature, string $secret): Event
    {
        // verify we are good, else throw an expection
        WebhookSignature::make($signature, $secret)->verify();
        // Make an event
        return Event::constructFrom($payload);
    }
}
