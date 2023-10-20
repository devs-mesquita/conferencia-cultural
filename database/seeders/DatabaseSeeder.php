<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate(["name" => "Victor Mussel"], [
            'name' => 'Victor Mussel',
            'email' => 'victor.mussel@hotmail.com',
            'nivel' => 'Avaliador',
            'password' => bcrypt('secret')
        ]);

        \App\Models\Gts::firstOrCreate(["nome" => "GT 1. Institucionalização, Marcos Legais e Sistema Nacional de Cultura"], [
                "nome" => "GT 1. Institucionalização, Marcos Legais e Sistema Nacional de Cultura",
                "qtd"  => "20",
                "color"=> "#ebeb05",
            ]);

        \App\Models\Gts::firstOrCreate(["nome" => "GT 2. Democratização do Acesso à Cultura e Participação Social"],
            [
                "nome" => "GT 2. Democratização do Acesso à Cultura e Participação Social",
                "qtd"  => "20",
                "color"=> "#0521eb",                
            ]);

        \App\Models\Gts::firstOrCreate(["nome" => "GT 3. Identidade, Patrimônio, Memória, Direito às Artes e Linguagens Digitais"],
            [
                "nome" => "GT 3. Identidade, Patrimônio, Memória, Direito às Artes e Linguagens Digitais",
                "qtd"  => "20",
                "color"=> "#05eb2c",                
            ]);

        \App\Models\Gts::firstOrCreate(["nome" => "GT 4. Diversidade Cultural e Transversalidade de Gênero, Raça e Acessibilidade na Política Cultural"],
            [
                "nome" => "GT 4. Diversidade Cultural e Transversalidade de Gênero, Raça e Acessibilidade na Política Cultural",
                "qtd"  => "20",
                "color"=> "#eb0505",                
            ]);

        \App\Models\Gts::firstOrCreate(["nome" => "GT 5. Economia Criativa, Trabalho, Renda e Sustentabilidade"],
            [
                "nome" => "GT 5. Economia Criativa, Trabalho, Renda e Sustentabilidade",
                "qtd"  => "20",
                "color"=> "#eb05cf",                
            ]);
    }
}
