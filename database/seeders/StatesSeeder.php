<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Country;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Get the country ID for the United States
        $country = Country::where('iso2', 'MX')->first();                               
        if ($country) {
            // Create states for the United States
            State::create([
                'country_id' => $country->id,
                'code' => '01',
                'abbreviation' => 'AS',
                'name' => 'Aguascalientes',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '02',
                'abbreviation' => 'BC',
                'name' => 'Baja California Norte',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '03',
                'abbreviation' => 'BS',
                'name' => 'Baja California Sur',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '04',
                'abbreviation' => 'CC',
                'name' => 'Campeche',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '05',
                'abbreviation' => 'CS',
                'name' => 'Chiapas',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '06',
                'abbreviation' => 'CH',
                'name' => 'Chihuahua',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '07',
                'abbreviation' => 'CL',
                'name' => 'Coahuila de Zaragoza',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '08',
                'abbreviation' => 'CM',
                'name' => 'Colima',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '09',
                'abbreviation' => 'DF',
                'name' => "Ciudad de México",
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '10',
                'abbreviation' => "DG",
                "name" => "Durango",
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '11',
                'abbreviation' => 'GT',
                'name' => 'Guanajuato',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '12',
                'abbreviation' => 'GR',
                'name' => 'Guerrero',
            ]);
            
            State::create([
                'country_id' => $country->id,
                'code' => '13',
                'abbreviation' => 'HG',
                'name' => 'Hidalgo',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '14',
                'abbreviation' => 'JC',
                'name' => 'Jalisco',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '15',
                'abbreviation' => 'MC',
                'name' => "Estado de México",
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '16',
                'abbreviation' => "MN",
                "name" => "Michoacán de Ocampo",
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '17',
                'abbreviation' => 'MS',
                'name' => 'Morelos',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '18',
                'abbreviation' => 'NT',
                'name' => 'Nayarit',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '19',
                'abbreviation' => 'ML',
                'name' => 'Nuevo León',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '20',
                'abbreviation' => 'OC',
                'name' => 'Oaxaca',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '21',
                'abbreviation' => 'PL',
                'name' => 'Puebla',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '22',
                'abbreviation' => 'QT',
                'name' => 'Querétaro',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '23',
                'abbreviation' => 'QR',
                'name' => 'Quintana Roo',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '24',
                'abbreviation' => 'SP',
                'name' => 'San Luis Potosí',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '25',
                'abbreviation' => 'SL',
                'name' => 'Sinaloa',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '26',
                'abbreviation' => 'SR',
                'name' => 'Sonora',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '27',
                'abbreviation' => 'TC',
                'name' => 'Tabasco',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '28',
                'abbreviation' => 'TS',
                'name' => 'Tamaulipas',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '29',
                'abbreviation' => 'TL',
                'name' => 'Tlaxcala',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '30',
                'abbreviation' => 'VZ',
                'name' => 'Veracruz de Ignacio de la Llave',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '31',
                'abbreviation' => 'YN',
                'name' => 'Yucatán',
            ]);
            State::create([
                'country_id' => $country->id,
                'code' => '32',
                'abbreviation' => 'ZS',
                'name' => 'Zacatecas',
            ]);
        }
    }
}
