<?php

namespace App\Libraries;

defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Exception\GuzzleException;
use Unione\UnioneClient;
use Webmozart\Assert\Assert;

class UnioneApiEmail
{
    /**
     * The UnioneClient client.
     *
     * @var UnioneClient
     */
    private $client;

    /**
     * @param UnioneClient $client
     */
    public function __construct(UnioneClient $client)
    {
        $this->client = $client;
    }

    /**
     * Send an email.
     *
     * @param array $params    {
     *                         'recipients': array {array {'email': string}},
     *                         'body': array,
     *                         'subject': string,
     *                         'from_email': string,
     *                         } $params the request parameters
     * @param array $headers   custom request headers
     *
     * @return array API response
     *
     * @throws GuzzleException
     *
     * @see  https://docs.unione.io/en/web-api-ref#email-send
     */
    public function send(array $params, array $headers = []): array
    {
        if (!empty($params['message'])) {
            $params = $params['message'];
        }

        Assert::isArray($params['recipients'], 'The recipients params must be an array. Got: %s');
        if (empty($params['template_id'])) {
            Assert::isArray($params['body'], 'The body params must be an array. Got: %s');
            Assert::string($params['subject'], 'The subject must be a string. Got: %s');
            Assert::email($params['from_email'], 'The from_email must be an email. Got: %s');
        }

        foreach ($params['recipients'] as $item) {
            Assert::email($item['email'], 'Recipient should be an array with "email" key containing a valid email address. Got: %s');
        }

        return $this->client->httpRequest('email/send.json', ['message' => $params], $headers);
    }

    /**
     * Send a subscription email.
     *
     * @param array $params {
     *                     'from_email': string,
     *                     'from_name': string,
     *                     'to_email': string,
     *                     } $params the request body containing the necessary keys
     *
     * @return array API response
     *
     * @throws GuzzleException
     *
     * @see https://docs.unione.io/en/web-api-ref#email-subscribe
     */
    public function subscribe(array $params): array
    {
        Assert::email($params['from_email'], 'The from_email must be an email. Got: %s');
        Assert::string($params['from_name'], 'The from_name must be a string. Got: %s');
        Assert::email($params['to_email'], 'The to_email must be an email. Got: %s');

        return $this->client->httpRequest('email/subscribe.json', $params);
    }
}
