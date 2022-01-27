<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    use HasFactory;
    protected $table = 'message_replies';
    protected $fillable = ['message_id', 'body_reply', 'created_at', 'updated_at'];

    public function messageParent()
    {
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
