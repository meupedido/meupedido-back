<?php

namespace App\Http\Controllers;

use App\Models\LineOfBusiness;
use Illuminate\Http\Request;

class LineOfBusinessController extends Controller
{

    public function getAll()
    {
        $fields = LineOfBusiness::all();

        return response()->json($fields);
    }

    public function getById($id)
    {
        $field =LineOfBusiness::where('id', $id)->first();

        return response()->json($field);
    }
}
