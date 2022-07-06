<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles'; //To connect with the table in database"Here 'employee' is the table name"
    protected $primaryKey = 'id';
    protected $fillable =[
        'work',
        'study',
        'college',
        'currentlocation',
        'permanentlocation',
        'join',
        'user_id2',
        'email',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    
        
    
}
