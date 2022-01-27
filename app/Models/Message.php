<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['for_user_id', 'body', 'created_at', 'updated_at'];
    protected $appends = ['replies'];

    public function replies()
    {
        return $this->hasMany(MessageReply::class, 'message_id', 'id');
    }

    public function getRepliesAttribute()
    {

        return $this->replies()->get();

    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
