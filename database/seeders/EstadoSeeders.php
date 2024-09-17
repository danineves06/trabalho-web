<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'name' => 'ACRE',
            'abreviatura' => 'AC',
        ]);

        Estado::create([
            'name' => 'ALAGOAS',
            'abreviatura' => 'AL',
        ]);

        Estado::create([
            'name' => 'AMAZONAS',
            'abreviatura' => 'AM',
        ]);

        Estado::create([
            'name' => 'BAHIA',
            'abreviatura' => 'BA',
        ]);

        Estado::create([
            'name' => 'CEARÁ',
            'abreviatura' => 'CE',
        ]);

        Estado::create([
            'name' => 'DISTRITO FEDERAL',
            'abreviatura' => 'DF',
        ]);

        Estado::create([
            'name' => 'ESPÍRITO SANTO',
            'abreviatura' => 'ES',
        ]);

        Estado::create([
            'name' => 'GOIÁS',
            'abreviatura' => 'GO',
        ]);

        Estado::create([
            'name' => 'MARANHÃO',
            'abreviatura' => 'MA',
        ]);

        Estado::create([
            'name' => 'MATO GROSSO',
            'abreviatura' => 'MT',
        ]);

        Estado::create([
            'name' => 'MATO GROSSO DO SUL',
            'abreviatura' => 'MS',
        ]);

        Estado::create([
            'name' => 'MINAS GERAIS',
            'abreviatura' => 'MG',
        ]);

        Estado::create([
            'name' => 'PARÁ',
            'abreviatura' => 'PA',
        ]);

        Estado::create([
            'name' => 'PARAÍBA',
            'abreviatura' => 'PB',
        ]);

        Estado::create([
            'name' => 'PARANÁ',
            'abreviatura' => 'PR',
        ]);

        Estado::create([
            'name' => 'PERNAMBUCO',
            'abreviatura' => 'PE',
        ]);

        Estado::create([
            'name' => 'PIAUÍ',
            'abreviatura' => 'PI',
        ]);

        Estado::create([
            'name' => 'RIO DE JANEIRO',
            'abreviatura' => 'RJ',
        ]);

        Estado::create([
            'name' => 'RIO GRANDE DO NORTE',
            'abreviatura' => 'RN',
        ]);

        Estado::create([
            'name' => 'RIO GRANDE DO SUL',
            'abreviatura' => 'RS',
        ]);

        Estado::create([
            'name' => 'RONDÔNIA',
            'abreviatura' => 'RO',
        ]);

        Estado::create([
            'name' => 'RORAIMA',
            'abreviatura' => 'RR',
        ]);

        Estado::create([
            'name' => 'SANTA CATARINA',
            'abreviatura' => 'SC',
        ]);

        Estado::create([
            'name' => 'SÃO PAULO',
            'abreviatura' => 'SP',
        ]);

        Estado::create([
            'name' => 'SERGIPE',
            'abreviatura' => 'SE',
        ]);

        Estado::create([
            'name' => 'TOCANTINS',
            'abreviatura' => 'TO',
        ]);
    }
}
