<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class QuotesService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume authors service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to book api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.quotes.base_uri');
        $this->secret = config('services.quotes.secret');
    }


    public function obtainQuotes()
    {
        return $this->performRequest('GET', '/quotes');
    }

    public function createQuote($data)
    {
        return $this->performRequest('POST', '/quotes', $data);
    }

    public function obtainQuote($quote)
    {
        return $this->performRequest('GET', "/quotes/{$quote}");
    }

    public function editQuote($data, $quote)
    {
        return $this->performRequest('PUT', "/quotes/{$quote}", $data);
    }

    public function deleteQuote($quote)
    {
        return $this->performRequest('DELETE', "/quotes/{v}");
    }
}