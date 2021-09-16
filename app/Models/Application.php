<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
	
	protected $table = 'applications';

	protected $fillable = [
		'first_name',
		'last_name',
		
		'birth_date',
		'gender',
		
		'address',
		'city',
		'postal_code',
		
		'phone_number',
		'email_address',
		
		'notifications',
		
		'guardian_first_name',
		'guardian_last_name',
		
		'guardian_phone_number',
		
		'guardian_relationship',
		
		'pregnant_flag',
		
		'illness_flag',
		'illness_description',
		
		'medications_flag',
		'medications_description',
		
		'injuries_flag',
		'injuries_description',
		
		'concussion_flag',
		'concussion_description',

		'others_flag',
		'others_description',

		'goal',

		'reference',

		'signee',
		'signature',

		'media_release',
		'media_release_signature'
    ];
	
	protected $hidden = [];	
}
