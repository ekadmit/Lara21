<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

 public function index(){
     $category = Category::all();
     return view ('categories.index', [
         'category' => $category
     ]);
 }

 public function show(Category $category){

     return view ('categories.show', [
         'category' => $category,
     ]);
 }

}
