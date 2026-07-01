<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all(); 
        return "<h1>Travel Agency Fleet: All available luxury cars and transport vehicles will be displayed here soon! 🚗</h1>";
    }
}