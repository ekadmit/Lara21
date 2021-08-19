<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected array $allowedFields = ['id','title','author', 'status','description'];

    public function getNews()
    {

        return \DB::table($this->table)->select($this->allowedFields)->get();

    }

    public function getNewsById(int $id){
        return \DB::table($this->table)->select($this->allowedFields)->find($id);

    }
}
