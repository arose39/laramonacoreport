<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        echo "Hello World";
        echo $request->query('order');
        echo $request->query('driver_id');

    }
}
