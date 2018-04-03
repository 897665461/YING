<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class ShiyanController extends Controller
{
    public function getlist()
    {
        $data = [];
        $brands = Brand::find([26,27,28]);
        echo 1;
        foreach($brands as $brand) {
            echo $brand->name;
            echo '</br>';
        }
    }
    public function hah()
    {
        echo 1;
    }
}
