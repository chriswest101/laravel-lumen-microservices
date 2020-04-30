<?php

namespace App\Http\Controllers\Bookings;


use App\Http\Controllers\Controller;
use App\Services\BookingsService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    use ApiResponse;

    public $bookingsService;

    public function __construct(BookingsService $bookingsService)
    {
        $this->bookingsService = $bookingsService;
    }

    public function index()
    {
        return $this->successResponse($this->bookingsService->obtainBookings());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->bookingsService->createBooking($request->all()));
    }

    public function show($booking)
    {
        return $this->successResponse($this->bookingsService->obtainBooking($booking));
    }

    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookingsService->editBooking($request->all(),$book));
    }

    public function destroy($book)
    {
        return $this->successResponse($this->bookingsService->deleteBooking($book));
    }

}
