<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//para que este logueado
    }

     public function create()
    {
        return view('admin.brands.create');
    }

  
   public function store(BrandRequest $request)
    {
       $brand= new Brand($request->all());
       $brand->save();
       flash("La marca  ". $brand->name . " ha sido creada con exito" , 'success')->important();
     

       return redirect()->route('brands.create');//redirecciona la categoria
    }
}
