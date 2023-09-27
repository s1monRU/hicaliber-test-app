<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertySeeder extends Seeder
{
    private const CSV_COLUMN_TO_KEY_MAP = [
        0 => 'name',
        1 => 'price',
        2 => 'bedrooms',
        3 => 'bathrooms',
        4 => 'storeys',
        5 => 'garages',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = $this->retrievePropertiesFromFile();
        DB::table('properties')->insert($properties);
    }

    private function retrievePropertiesFromFile(): array
    {
        $properties = [];
        $propertiesRaw = Storage::get('property-data.csv');
        $propertiesRows = str_getcsv($propertiesRaw, "\n");

        foreach ($propertiesRows as $propertyKey => $propertyRow) {
            $propertyRow = str_getcsv($propertyRow);

            foreach ($propertyRow as $key => $propertyField) {
                $properties[$propertyKey][self::CSV_COLUMN_TO_KEY_MAP[$key]] = $propertyField;
            }
        }

        array_shift($properties);

        return $properties;
    }
}
