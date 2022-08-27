<?php

namespace App\Models;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    protected $table = "files";
    use HasFactory;
    protected $fillable = ['name'];

    public function student(){
            return $this->hasMany(studentdata::class,'file_id');
    }
}
