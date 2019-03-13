<?php
return [

    // these options are related to the sign-up procedure
    'sign_up' => [

        // this option must be set to true if you want to release a token
        // when your user successfully terminates the sign-in procedure
        'release_token' => env('SIGN_UP_RELEASE_TOKEN', false),

        // here you can specify some validation rules for your sign-in request
        'validation_rules' => [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]
    ],

    // these options are related to the login procedure
    'login' => [

        // here you can specify some validation rules for your login request
        'validation_rules' => [
            'email' => 'required|email',
            'password' => 'required'
        ]
    ],

    // these options are related to the password recovery procedure
    'forgot_password' => [

        // here you can specify some validation rules for your password recovery procedure
        'validation_rules' => [
            'email' => 'required|email'
        ]
    ],

    // these options are related to the password recovery procedure
    'reset_password' => [

        // this option must be set to true if you want to release a token
        // when your user successfully terminates the password reset procedure
        'release_token' => env('PASSWORD_RESET_RELEASE_TOKEN', false),

        // here you can specify some validation rules for your password recovery procedure
        'validation_rules' => [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]
    ],

    // these options are related to the user request
    'user' => [

        // here you can specify some validation rules for your user request
        'validation_rules' => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'sometimes|integer'
        ],

        // here you can specify some validation rules for your user request
        'update_validation_rules' => [
          'first_name' => 'required',
          'last_name' => 'required',
          'date_of_birth' => 'required',
          'gender_id' => 'required',
        ],

        // here you can specify some validation rules for your user request
        'change_pass_validation_rules' => [
          'password' => 'required|confirmed|min:6',
        ]
    ],

    // these options are related to the city request
    'city' => [

        // here you can specify some validation rules for your city store request
        'store_validation_rules' => [
            'name' => 'required|max:255',
            'country_id' => 'required'
        ],

        // here you can specify some validation rules for your city update request
        'update_validation_rules' => [
            'name' => 'sometimes|required|max:255'
        ]
    ],

    // these options are related to the itinerary request
    'itinerary' => [

        // here you can specify some validation rules for your itinerary store request
        'store_validation_rules' => [
            'ticket_type_id' => 'required|integer',
            'flight_type_id' => 'required|integer'
        ],

        // here you can specify some validation rules for your itinerary update request
        'update_validation_rules' => [
            'ticket_type_id' => 'sometimes|integer',
            'flight_type_id' => 'sometimes|integer'
        ]
    ],

    // these options are related to the flight request
    'flight' => [

        // here you can specify some validation rules for your flight store request
        'store_validation_rules' => [
            'number' => 'required|integer',
            'destination_id' => 'required|integer',
            'origin_id' => 'required|integer'
        ],

        // here you can specify some validation rules for your flight update request
        'update_validation_rules' => [
            'number' => 'sometimes|integer',
            'destination_id' => 'sometimes|integer',
            'origin_id' => 'sometimes|integer'
        ]
    ],

    // these options are related to the fare request
    'fare' => [

        // here you can specify some validation rules for your fare store request
        'store_validation_rules' => [
            'travel_class_id' => 'required|integer',
            'itinerary_id' => 'required|integer',
            'seats_remaining' => 'sometimes|integer',
            'adult_price' => 'sometimes|integer',
            'child_price' => 'sometimes|integer',
            'infant_price' => 'sometimes|integer'
        ],

        // here you can specify some validation rules for your fare update request
        'update_validation_rules' => [
            'travel_class_id' => 'sometimes|integer',
            'itinerary_id' => 'sometimes|integer',
            'seats_remaining' => 'sometimes|integer',
            'adult_price' => 'sometimes|integer',
            'child_price' => 'sometimes|integer',
            'infant_price' => 'sometimes|integer'
        ]
    ],

    // these options are related to the inbound request
    'inbound' => [

        // here you can specify some validation rules for your inbound store request
        'store_validation_rules' => [
            'flight_id' => 'required|integer',
            'itinerary_id' => 'required|integer'
        ],

        // here you can specify some validation rules for your inbound update request
        'update_validation_rules' => [
            'flight_id' => 'sometimes|integer',
            'itinerary_id' => 'sometimes|integer'
        ]
    ],

    // these options are related to the outbound request
    'outbound' => [

        // here you can specify some validation rules for your outbound store request
        'store_validation_rules' => [
            'flight_id' => 'required|integer',
            'itinerary_id' => 'required|integer'
        ],

        // here you can specify some validation rules for your outbound update request
        'update_validation_rules' => [
            'flight_id' => 'sometimes|integer',
            'itinerary_id' => 'sometimes|integer'
        ]
    ],

    // these options are related to the flight travel class request
    'flight_travel_class' => [

        // here you can specify some validation rules for your flight travel class store request
        'store_validation_rules' => [
            'flight_id'               => 'required|integer',
            'travel_class_id'         => 'required|integer',
            'unsold_seat_48'          => 'sometimes|integer',
            'unsold_seat_24'          => 'sometimes|integer',
            'stand_by_seats'          => 'sometimes|integer',
            'max_acceptable_discount' => 'sometimes|integer'
        ],

        // here you can specify some validation rules for your flight travel class update request
        'update_validation_rules' => [
            'flight_id'               => 'sometimes|integer',
            'travel_class_id'         => 'required|integer',
            'unsold_seat_48'          => 'sometimes|integer',
            'unsold_seat_24'          => 'sometimes|integer',
            'stand_by_seats'          => 'sometimes|integer',
            'max_acceptable_discount' => 'sometimes|integer'
        ]
    ],

    // these options are related to the country request
    'country' => [

        // here you can specify some validation rules for your country request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the travel class type request
    'travel_class_type' => [

        // here you can specify some validation rules for your travel class type request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the configuration request
    'configuration' => [

        // here you can specify some validation rules for your country request
        'validation_rules' => [
        ]
    ],

    // these options are related to the airline request
    'airline' => [

        // here you can specify some validation rules for your airline request
        'validation_rules' => [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'iata_code' =>'required',
            'is_automatic' => 'boolean' // 1 or 0
        ]
    ],

    // these options are related to the gender request
    'gender' => [

        // here you can specify some validation rules for your gender request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the booking code request
    'booking_code' => [

        // here you can specify some validation rules for your booking code request
        'validation_rules' => [
            'name' => 'required|max:255',
            'flight_id' => 'required'
        ]
    ],

    // these options are related to the bid status request
    'bid_status' => [

        // here you can specify some validation rules for your bid status request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the currency request
    'currency' => [

        // here you can specify some validation rules for your currency request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the ticket type request
    'ticket_type' => [

        // here you can specify some validation rules for your ticket type request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the travel_class request
    'travel_class' => [

        // here you can specify some validation rules for your travel_class request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],

    // these options are related to the airport request
    'airport' => [

        // here you can specify some validation rules for your airport request
        'validation_rules' => [
            'name' => 'required|max:255'
        ]
    ],
    
    // these options are related to the fellow request
    'fellow' => [

        // here you can specify some validation rules for your fellow request
        'validation_rules' => [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email',
            'date_of_birth' => 'date_format:Y-m-d',
            'gender_id' => 'required'
        ]
    ],

    // these options are related to the bid request
    'bid' => [

        // here you can specify some validation rules for your bid request
        'validation_rules' => [
            'starting_point' => 'required',
            'destination' => 'required',
            'outbound_date' => 'required',
            'travel_class_type_id' => 'required',
            'flight_type_id' => 'required',
            'ticket_type_id' => 'required',
            'airline_id' => 'required',
            'adult_count' => 'required',
            'children_count' => 'required',
            'infant_count' => 'required',
            'adult_bid' => 'required',
            'children_bid' => 'required',
            'infant_bid' => 'required',
            'fellow_ids' => 'required|array',
            'itinerary_id' => 'nullable|int'
        ]
    ],

    // these options are related to the flight_type request
    'flight_type' => [

        // here you can specify some validation rules for your flight_type request
        'validation_rules' => [
            'name' => 'required',
        ]
    ],
    // these options are related to the ininerary request
    'intinerary' => [

        // here you can specify some validation rules for your ininerary request
        'validation_rules' => [
            'origin'  => 'required' ,
	        'destination' => 'required' ,
            'departure_date' => 'required|date_format:Y-m-d',
            'return_date' => 'sometimes|date_format:Y-m-d',
	        'adults' => 'required',
	        'children' => 'sometimes',
	        'infants' => 'sometimes',
            'travel_class' => 'required',
            'flight_type' => 'required',
            'nonstop' => 'required'
        ]
    ],
    // these options are related to the add phone request
    'add_phone' => [

        // here you can specify some validation rules for your ininerary request
        'validation_rules' => [
            'country_id' => 'required',
            'phone' => 'required'
        ]
    ],
    // verify_sms_token
    'verify_sms_token' => [

        // here you can specify some validation rules for your verify_sms_token request
        'validation_rules' => [
            'token' => 'required',
        ]
        ],
    // verify_sms_token
    'store_credit_card' => [
        // here you can specify some validation rules for your verify_sms_token request
        'validation_rules' => [
            'stripe_token' => 'required'
        ]
    ],

    'social_login' => [
        // here you can specify some validation rules for your verify_sms_token request
        'validation_rules' => [
            'token' => 'required'
        ]
    ],

];
