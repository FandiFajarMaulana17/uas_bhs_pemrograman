<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $query = DB::connection('mysql')->table('users')->get();
        return response()->json($query, 200);
    }
}
