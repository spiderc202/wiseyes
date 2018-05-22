<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class apis extends Controller
{
    //
    public function user()
    {
        $rtn = User::select('name')->get();
        return $rtn;
    }

    public function address()
    {
        $rtn = User::select('address')->get();
        return $rtn;
    }
}
