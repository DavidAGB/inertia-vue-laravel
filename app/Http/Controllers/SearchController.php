<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $busqueda =  "prue";
        $resultados = Product::search("$busqueda")->get();

      $e =  json_encode(   $resultados );

      return $e;

        return view('product.index', compact('busqueda','resultados', 'e') );

        

         
        
        
    }
}
