<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts'; //To connect with the table in database"Here 'employee' is the table name"
    protected $primaryKey = 'id';
    protected $fillable =[
        'title',
        'text',
        'image_path',
        'user_id',
        'email',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
