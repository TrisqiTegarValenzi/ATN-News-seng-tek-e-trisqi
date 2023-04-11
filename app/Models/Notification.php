<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'comment_id', 'message', 'is_read', 'induk_user', 'berita'];
    
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function komentar(){
        return $this->belongsTo(Komentar::class, 'comment_id', 'id');
    }
}
