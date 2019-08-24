<?php

namespace App;
use App\File;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
   protected $fillable = ['file_name'];

   public function users(){
       return $this->belongsTo(User::class);
   }
}
