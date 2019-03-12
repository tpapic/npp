<?php
/*
 PHP Anonymous Package For Amadeus In Laravel 
 Easy Way To Use Amadeus For Normal Services
 This Package Created By PHPAnonymous
 website phpanonymous.com
*/
return [
	'apikey'=> env('AMADEUS_SANDBOX_KEY','8GgPxqAnDCylJuOKPM1r6rWgFsfMKUCc'),
	'sandbox'=>true,
	'sandboxlink'=>'https://api.sandbox.amadeus.com/v1.2',
	'livelink'=>'https://api.live.amadeus.com/v1.2',
	'timeout'=>30,
	'RETURNTRANSFER'=>true,
];