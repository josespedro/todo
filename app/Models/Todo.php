<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Step;

class Todo extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['title','user_id','completed','details'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function steps()
    {
      return $this->hasMany(Step::class);
    }

    
}
