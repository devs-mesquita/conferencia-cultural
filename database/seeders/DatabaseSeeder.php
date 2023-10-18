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
        DB::table('users')->insert([
            'name' => 'Victor Mussel',
            'email' => 'victor.mussel@hotmail.com',
            'nivel' => 'Avaliador',
            'password' => bcrypt('secret')
        ]);

        DB::table('gts')->insert([
            [
                "nome" => "GT 1. Institucionalização, Marcos Legais e Sistema Nacional de Cultura",
                "qtd"  => "30",
                "color"=> "#ebeb05",
            ],
            [
                "nome" => "GT 2. Democratização do Acesso à Cultura e Participação Social",
                "qtd"  => "30",
                "color"=> "#eb0505",                
            ],
            [
                "nome" => "GT 3. Identidade, Patrimônio, Memória, Direito às Artes e Linguagens Digitais",
                "qtd"  => "30",
                "color"=> "#eb05cf",                
            ],
            [
                "nome" => "GT 4. Diversidade Cultural e Transversalidade de Gênero, Raça e Acessibilidade na Política Cultural",
                "qtd"  => "30",
                "color"=> "#0521eb",                
            ],
            [
                "nome" => "GT 5. Economia Criativa, Trabalho, Renda e Sustentabilidade",
                "qtd"  => "30",
                "color"=> "#05eb2c",                
            ],
        ]);
    }
}
