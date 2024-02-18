<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function import() 
    {
        Excel::import(new UsersImport, 'excel/users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}
