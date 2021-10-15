<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AndroidTestsController extends Controller
{
    //
    public function getMethodTest(Request $request) {
        return json_encode(array(
            'method' => $request->method(),
            'params' => $request->all(),
        ));
    }

    public function postMethodTest(Request $request) {
        return json_encode(array(
            'method' => $request->method(),
            'params' => $request->all(),
        ));
    }
}
