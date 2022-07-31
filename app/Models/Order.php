<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [];
    protected $guarded = [];

    public function Category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function User()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
