<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookingsService
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
        $this->baseUri = config('services.bookings.base_uri');
        $this->secret = config('services.bookings.secret');
    }


    public function obtainBookings()
    {
        return $this->performRequest('GET', '/bookings');
    }

    public function createBooking($data)
    {
        return $this->performRequest('POST', '/bookings', $data);
    }

    public function obtainBooking($booking)
    {
        return $this->performRequest('GET', "/bookings/{$booking}");
    }

    public function editBooking($data, $booking)
    {
        return $this->performRequest('PUT', "/bookings/{$booking}", $data);
    }

    public function deleteBooking($booking)
    {
        return $this->performRequest('DELETE', "/bookings/{$booking}");
    }
}