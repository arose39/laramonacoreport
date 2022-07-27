<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RacerInfoController extends Controller
{
    public function showAll(Request $request)
    {
        echo "Hello World 22";
        echo $request->query('order');


    }

    public function showOne($id)
    {
        echo "Hello World $id";
    }
}
