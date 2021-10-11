<?php

return [
    'address' => env('COMPANY_ADDRESS', 'Example Adress, State, Country'), // 'Example Adress, State, Country' is default if COMPANY_ADDRESS is missing in .env
    'phone' => env('COMPANY_PHONE', '070 12 34 567'),
    'mail' => env('COMPANY_MAIL', 'root@localhost'),
    'working-hours-mon-fri' => env('COMPANY_WORKING_HOURS_MONDAY_TO_FRIDAY', '10.00 - 18.00'),
    'working-hours-sat' => env('COMPANY_WORKING_HOURS_SATURDAY', '11.00 - 15.00'),
    'working-hours-sun' => env('COMPANY_WORKING_HOURS_SUNDAY', 'Endast tidsbokade besök'),
];