<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ExcelCSVController extends Controller
{
    public function index()
    {
        return view("excel-csv-import");
    }

    public function importExcelCSV(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required',
        ]);

        Excel::import(new UsersImport,$request->file('file'));

        return redirect('excel-csv-file')->with('success','the file has been excel/csv import to database in laravel 10');
    }

    public function exportExcel($slug)
    {
        return Excel::download(new UsersExport,'users.'.$slug);

    }
}
