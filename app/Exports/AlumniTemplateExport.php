<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class AlumniTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            [
                'Nama',
                'Angkatan',
                'Lembaga Pendidikan/Perusahaan'
            ],
            [
                'Contoh Nama',
                '2020',
                'Contoh Perusahaan'
            ]
        ];
    }
}
