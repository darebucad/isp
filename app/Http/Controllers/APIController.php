<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class APIController extends Controller
{
    // Get the product categories
    public function getCategories(){
        $query = Categories::select('Id','Name','Description');
        return datatables($query)->make(true);
    }
}
