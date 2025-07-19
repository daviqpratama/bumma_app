<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NeracaLajurExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection(): Collection
    {
        return collect($this->data)->map(function ($row) {
            return [
                $row['nama'],
                $row['awal'],
                $row['debit'],
                $row['kredit'],
                $row['akhir'],
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Akun', 'Saldo Awal', 'Debet', 'Kredit', 'Saldo Akhir'];
    }
}
