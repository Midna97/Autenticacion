<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'description',
         'created_at',
         'updated_at',
     ];

     public function user(){
         return $this->hasOne(User::class,'role_id');
     }
}
