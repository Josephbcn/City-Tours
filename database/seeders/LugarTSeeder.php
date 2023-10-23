<?php

namespace Database\Seeders;

use App\Models\LugaresT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LugarTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lugar1 = new LugaresT();
        $lugar1->nombre = 'Machu Picchu';
        $lugar1->region = 'Cusco';
        $lugar1->paquete = 'Oro';
        $lugar1->descripcion = 'Machu Picchu es un antiguo sitio inca en las montañas de Cusco. Es uno de los destinos turísticos más famosos del mundo.';
        $lugar1->imagen = "";
        $lugar1->save();
    }
}
