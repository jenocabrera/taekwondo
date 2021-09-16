<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Models\Application;

class ApplicationsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Application $application) {
            return (new ApplicationResource($application));
        });

        return [
            'version' => '1.0.0',
            'author_url' => 'https://4pointtkd.com',
            'data' => $this->collection
        ];
    }
}