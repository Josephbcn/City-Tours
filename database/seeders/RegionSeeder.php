<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionesPeru = [
            'Amazonas', 'Áncash', 'Apurímac', 'Arequipa', 'Ayacucho', 'Cajamarca',
            'Cusco', 'Huancavelica', 'Huánuco', 'Ica', 'Junín', 'La Libertad',
            'Lambayeque', 'Lima', 'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco',
            'Piura', 'Puno', 'San Martín', 'Tacna', 'Tumbes', 'Ucayali'
        ];

        foreach ($regionesPeru as $region) {
            Region::create(['nombre' => $region]);
        }
    }
}
