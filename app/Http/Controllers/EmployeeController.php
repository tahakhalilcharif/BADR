<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientActivationCode;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.home_emp');
    }

    public function unactivatedUsers()
    {
        $unactivatedUsers = ClientActivationCode::where('is_activated', false)->get();

        return view('employee.unactivated_users', compact('unactivatedUsers'));
    }
}
