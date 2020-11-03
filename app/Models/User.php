<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Models\Todo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //if you are validating things in controller then you can use guarded
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
`  */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //mutator
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password']=  \bcrypt('password');
    // }
    //accessor
    // public function getNameAttribute($name)
    // {
    //     return "My name is :".($name);
    // }

    public static function uploadAvatar($image)
    {
        $file_name = $image->getClientOriginalName();
        (new self())->deleteOldImage();
        $image->storeAs('images',$file_name,'public');
        auth()->user()->update(['avatar'=>$file_name]);   
    }
    protected function deleteOldImage()
    {
        if($this->avatar){
            // dd('/public/images'.auth()->user()->avatar);
            Storage::delete('/public/images/'.$this->avatar);
        }
    }
    public function todos(){
        return $this->hasMany(Todo::class);
    }

}
