<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecusadosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $delegados = DB::table('inscricao')->where('tipo','DELEGADO')->where('avaliado',2)->get();

        return $delegados;
    }

    public function map($delegados): array
    {
        return [
            $delegados->nome,
            $delegados->email,
            $delegados->observacao,
        ];
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Email',
            'Motivo',
        ];
    }
}
