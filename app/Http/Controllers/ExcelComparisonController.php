<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MahasiswaImport;


class ExcelComparisonController extends Controller
{
    public function index()
    {
        return view("compare-data");
    }
    public function compareData(Request $request)
    {
        $request->validate([
            'file1' => 'required|mimes:xlsx,xls',
            'file2' => 'required|mimes:xlsx,xls',
        ]);

        $data1 = Excel::toArray(new MahasiswaImport, $request->file('file1'));
        $data2 = Excel::toArray(new MahasiswaImport, $request->file('file2'));

        $comparisonResult = $this->compareArrays($data1, $data2);

        return view('compare-data', ['comparisonResult' => $comparisonResult]);
    }

    private function compareArrays($array1, $array2)
    {
        $matchingResult = [];
        $mismatchResult = [];

        foreach ($array1 as $row1) {
            $isMatch = false;

            foreach ($array2 as $row2) {

                $isEqual = (
                    $row1['NO'] === $row2['NO'] &&
                    $row1['KODE_PT'] === $row2['KODE_PT'] &&
                    $row1['KODE_PRODI'] === $row2['KODE_PRODI'] &&
                    $row1['NIM'] === $row2['NIM'] &&
                    $row1['NAMA'] === $row2['NAMA']

                );

                if ($isEqual) {
                    $isMatch = true;
                    $matchingResult[] = [
                        'NO' => $row1['NO'],
                        'KODE_PT' => $row1['KODE_PT'],
                        'KODE_PRODI' => $row1['KODE_PRODI'],
                        'NIM' => $row1['NIM'],
                        'NAMA' => $row1['NAMA'],

                    ];
                    break;
                }
            }

            if (!$isMatch) {
                $mismatchResult[] = [
                    'NO' => $row1['NO'],
                    'KODE_PT' => $row1['KODE_PT'],
                    'KODE_PRODI' => $row1['KODE_PRODI'],
                    'NIM' => $row1['NIM'],
                    'NAMA' => $row1['NAMA'],

                ];
            }
        }

        return [
            'matchingResult' => $matchingResult,
            'mismatchResult' => $mismatchResult,
        ];
    }
}
