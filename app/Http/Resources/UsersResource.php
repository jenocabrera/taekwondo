<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\User;

class UsersResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (User $user) {
            return (new UserResource($user));
        });

        return [
            'version' => '1.0.0',
            'author_url' => 'https://simplystatedrs.com',
            'data' => $this->collection
        ];
    }
}