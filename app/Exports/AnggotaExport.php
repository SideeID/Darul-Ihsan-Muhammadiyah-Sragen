<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;


class AnggotaExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anggota::select('*')->get();
    }

    public function headings(): array
    {
        return [
            'NAMA',
            'JABATAN',
            'RANTING',
            'ALAMAT'
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->jabatan,
            $row->ranting,
            $row->alamat,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30.00,
            'B' => 30.00,
            'C' => 30.00,
            'D' => 30.00,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER]
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D' . $event->sheet->getHighestDataRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ]
                    ]
                ]);
            }
        ];
    }
}
