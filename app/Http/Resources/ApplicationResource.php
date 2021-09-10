<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
			
			'first_name' => (string)$this->first_name,
			'last_name' => (string)$this->last_name,
			
			'birth_date' => (string)$this->birth_date,
			'gender' => (string)$this->gender,
			
			'address' => (string)$this->address,
			'city' => (string)$this->city,
			'postal_code' => (string)$this->postal_code,
			
			'phone_number' => (string)$this->phone_number,
			'email_address' => (string)$this->email_address,
			
			'notifications' => (int)$this->notifications,
			
			'guardian_first_name' => (string)$this->guardian_first_name,
			'guardian_last_name' => (string)$this->guardian_last_name,
			
			'guardian_phone_number' => (string)$this->guardian_phone_number,
			
			'guardian_relationship' => (string)$this->guardian_relationship,
			
			'pregnant_flag' => (int)$this->pregnant_flag,
			
			'illness_flag' => (int)$this->illness_flag,
			'illness_description' => (string)$this->illness_description,
			
			'medications_flag' => (int)$this->medications_flag,
			'medications_description' => (string)$this->medications_description,
			
			'injuries_flag' => (int)$this->injuries_flag,
			'injuries_description' => (string)$this->injuries_description,
			
			'concussion_flag' => (int)$this->concussion_flag,
			'concussion_description' => (string)$this->concussion_description,

			'others_flag' => (int)$this->others_flag,
			'others_description' => (string)$this->others_description,

			'goal' => (string)$this->goal,

			'reference' => (string)$this->reference,

			'signee' => (string)$this->signee,
			'signature' => (string)$this->signature,

			'media_release' => (int)$this->media_release,
			'media_release_signature' => (string)$this->media_release_signature,
			
			'created_at' => (string)$this->created_at
        ];
    }
}
