<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AlumniImport implements ToModel, SkipsEmptyRows,WithStartRow, WithMultipleSheets, ShouldQueue, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumni([
            'nama' => $row[0],
            'tahun_lulus' => $row[1],
            'lembaga_perusahaan' => $row[2]
        ]);
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
