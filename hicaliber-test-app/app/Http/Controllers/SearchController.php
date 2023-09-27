<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Searching for properties
     *
     * @param Request $request
     * @return Collection|array
     */
    public function search(Request $request): Collection|array
    {
        $properties = Property::query();

        if ($request->has('name')) {
            $properties->where('name', 'like', "%{$request->name}%");
        }

        if ($request->has('bedrooms')) {
            $properties->where('bedrooms', $request->bedrooms);
        }

        if ($request->has('bathrooms')) {
            $properties->where('bathrooms', $request->bathrooms);
        }

        if ($request->has('storeys')) {
            $properties->where('storeys', $request->storeys);
        }

        if ($request->has('garages')) {
            $properties->where('garages', $request->garages);
        }

        if ($request->has('price')) {
            $min = $request->price['min'] ?? false;
            $max = $request->price['max'] ?? false;

            $properties->when($min, function($query, $min) {
                $query->where('price', '>=', $min);
            })->when($max, function($query, $max) {
                $query->where('price', '<=', $max);
            });
        }

        return $properties->get();
    }
}
