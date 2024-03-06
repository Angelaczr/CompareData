<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'NO' => $row['NO'],
            'KODE_PT' => $row['KODE_PT'],
            'KODE_PRODI' => $row['KODE_PRODI'],
            'NIM' => $row['NIM'],
            'NAMA' => $row['NAMA'],
            // 'TEMPAT_LAHIR' => $row['TEMPAT_LAHIR'],
            // 'TGL_LAHIR' => $row['TGL_LAHIR'],
            // 'KELAMIN' => $row['KELAMIN'],
            // 'TANGGAL_WISUDA' => $row['TANGGAL_WISUDA'],
            // 'WISUDA_KE' => $row['WISUDA_KE'],
            // 'TGL_YUDISIUM' => $row['TGL_YUDISIUM'],
        ]);
    }
}
