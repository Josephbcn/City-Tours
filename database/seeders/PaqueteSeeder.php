<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paquete1 = new Paquete();
        $paquete1->nombre = 'Oro';
        $paquete1->precio = 300.00;
        $paquete1->save();

        $paquete2 = new Paquete();
        $paquete2->nombre = 'Plata';
        $paquete2->precio = 200.00;
        $paquete2->save();

        $paquete3 = new Paquete();
        $paquete3->nombre = 'Bronce';
        $paquete3->precio = 100.00;
        $paquete3->save();

    }
}
