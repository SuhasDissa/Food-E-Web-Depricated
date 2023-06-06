<?php

namespace App\Http\Controllers;

use App\Models\Additives;

class AdditivesApiController extends Controller
{
    public function index()
    {
        $additives = Additives::all();
        return response($additives->toJson())->header('Content-Type', 'application/json');
    }

    public function show(Additives $additive)
    {
        return response($additive->toJson())->header('Content-Type', 'application/json');
    }
}
