<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TotalInscricoesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $total = DB::table('inscricao')->get();

        return $total;
    }

    public function map($total): array
    {
        return [
            $total->nome,
            $total->email,
            $total->tipo,
            $total->gt,
        ];
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Email',
            'Tipo',
            'GT',
        ];
    }
}
