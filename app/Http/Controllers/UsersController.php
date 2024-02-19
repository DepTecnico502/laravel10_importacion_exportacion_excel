<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('usuarios.import.index');
    }

    // public function import() 
    // {
    //     Excel::import(new UsersImport, 'excel/users.xlsx');
        
    //     return redirect('/')->with('success', 'All good!');
    // }

    public function importExcel(Request $request)
    {
        $archivo_excel = $request->file('archivo_excel');
        
        Excel::import(new UsersImport, $archivo_excel);

        return redirect()->back()->with('success', 'Archivo Excel importado correctamente.');
    }
}
