<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AnggotaImport implements ToModel, SkipsEmptyRows, WithStartRow, WithMultipleSheets, ShouldQueue, WithChunkReading
{
    public function model(array $row)
    {
        if ($row[0] != "test") {
            return new Anggota([
                'nama' => $row[0] ?? '-',
                'jabatan' => $row[1] ?? '-',
                'ranting' => $row[2] ?? '-',
                'alamat' => $row[3] ?? '',
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
