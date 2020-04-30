<?php

return [
    'bookings'   =>  [
        'base_uri'  =>  env('BOOKINGS_SERVICE_BASE_URL'),
        'secret'  =>  env('BOOKINGS_SERVICE_SECRET'),
    ],

    'quotes'   =>  [
        'base_uri'  =>  env('QUOTES_SERVICE_BASE_URL'),
        'secret'  =>  env('QUOTES_SERVICE_SECRET'),
    ],
];