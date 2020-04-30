<?php

namespace App\Http\Controllers\Quotes;


use App\Http\Controllers\Controller;
use App\Services\BookingsService;
use App\Services\QuotesService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    use ApiResponse;

    public $quotesService;

    public function __construct(QuotesService $quotesService)
    {
        $this->quotesService = $quotesService;
    }

    public function index()
    {
        return $this->successResponse($this->quotesService->obtainQuotes());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->quotesService->createQuote($request->all()));
    }

    public function show($book)
    {
        return $this->successResponse($this->quotesService->obtainQuote($book));
    }

    public function update(Request $request, $quote)
    {
        return $this->successResponse($this->quotesService->editQuote($request->all(),$quote));
    }

    public function destroy($book)
    {
        return $this->successResponse($this->quotesService->deleteQuote($book));
    }

}
