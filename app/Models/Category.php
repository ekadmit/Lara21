<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function getCategories()
    {

//      return \DB::select("SELECT id, title, description FROM {$this->table}"); //возвращает массив

        return \DB::table($this->table)->get(); //возвращает коллекцию

    }

    public function getCategoryById(int $id){

        //return \DB::table($this->table)->find($id);
        return \DB::table($this->table)->select(['id','title','description'])->find($id);

    }

}
