<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'Maquilhagem Social',
            'description' => 'Ideal para festas, jantares e eventos especiais.',
            'duration_minutes' => 60,
            'price' => 45.00,
        ]);

        Service::create([
            'name' => 'Maquilhagem de Noiva',
            'description' => 'Serviço completo e personalizado para o dia do casamento.',
            'duration_minutes' => 90,
            'price' => 120.00,
        ]);

        Service::create([
            'name' => 'Maquilhagem de Passarela / Editorial',
            'description' => 'Produções de alta durabilidade e estilo conceptual.',
            'duration_minutes' => 75,
            'price' => 70.00,
        ]);
    }
}