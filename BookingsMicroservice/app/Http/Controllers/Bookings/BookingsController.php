<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookingsController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        //
    }

    public function index()
    {
        $bookings = Booking::all();
        return $this->successResponse($bookings);
    }

    public function store(Request $request)
    {
        $rules = [
            'from_destination'      => 'required|string',
            'from_latlong'          => 'required|string',
            'to_destination'        => 'required|string',
            'to_latlong'            => 'required|string',
            'date'                  => 'required|date_format:Y-m-d',
            'time'                  => 'required',
            'user_id'               => 'required|numeric',
            'no_of_people'          => 'required|numeric|min:1|max:10',
            'distance'              => 'required|numeric|min:0',
            'status'                => 'in:Confirmed,Cancelled,Unconfirmed'
        ];

        $this->validate($request, $rules);
        $booking = Booking::create($request->all());
        return $this->successResponse($booking, Response::HTTP_CREATED);
    }

    public function show($booking)
    {
        $booking = Booking::findOrFail($booking);
        return $this->successResponse($booking);
    }

    public function update(Request $request, $booking)
    {
        $rules = [
            'from_destination'      => 'required|string',
            'from_latlong'          => 'required|string',
            'to_destination'        => 'required|string',
            'to_latlong'            => 'required|string',
            'date'                  => 'required|date_format:Y-m-d',
            'time'                  => 'required',
            'user_id'               => 'required|numeric',
            'no_of_people'          => 'required|numeric|min:1|max:10',
            'distance'              => 'required|numeric|min:0',
            'status'                => 'in:Confirmed,Cancelled,Unconfirmed'
        ];

        $this->validate($request, $rules);
        $booking = Booking::findOrFail($booking);
        $booking->fill($request->all());
        if($booking->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $booking->save();
        return $this->successResponse($booking);
    }

    public function destroy($booking)
    {
        $booking = Booking::findOrFail($booking);
        $booking->delete();
        return $this->successResponse($booking);
    }
}
