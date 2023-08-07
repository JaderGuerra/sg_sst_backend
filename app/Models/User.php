<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table ="users";
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

  public $timestamps = false;

  public $incrementing = false;

  protected static function booted()
  {
    static::creating( function ($model){
      $model->id = Str::uuid()->toString();
    });
  }

}
