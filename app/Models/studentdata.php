<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentdata extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','department','title','file_id'];
    public function file(){
        return $this->belongsTo(File::class);
    }

}
