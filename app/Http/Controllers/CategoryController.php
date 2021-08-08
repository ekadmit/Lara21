<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{

 public function index(){
     return view ('categories.index', [
         'category' => $this->categoryList
     ]);
 }

 public function show(int $id){
     $categoryList = [];
     foreach ($this->categoryList as $categories){
         if($categories['id'] === $id){
             $categoryList[] = $categories;
         }
     }

     return view ('categories.show', [
         'id' => $id,
     ]);
 }

}
