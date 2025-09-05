<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['contact_reason' => 'Dúvida']);
        MotivoContato::create(['contact_reason' => 'Elogio']);
        MotivoContato::create(['contact_reason' => 'Reclamação']);
    }
}
