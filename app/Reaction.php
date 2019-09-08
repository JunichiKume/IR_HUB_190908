<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    public $incrementing = false;  // インクリメントIDを無効化
    public $timestamps = false; // update_at, created_at を無効化

    // Relation
    public function toUserId()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
        // belongsTo(相手のモデル名, 自モデルのID, 相手のID名)
    }

    public function fromUserId()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }
}
