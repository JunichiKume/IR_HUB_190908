<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','doctor_name','post_code','clinic_address','clinic_phone_number','main_photo','tagline','clinic_pr','doctor_profile','doctor_photo','doctor_number','staff_number','personnel_details','clinic_url','clinic_category','clinic_treatment','clinic_features','disease_name','conference','open_date','sub_photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function toUserId()
    {
        return $this->hasMany('App\Reaction', 'to_user_id', 'id');
        // hasMany(相手のモデル名, 相手モデルのID, 自モデルのID) 
    }
    
    public function fromUserId()
    {
        return $this->hasMany('App\Reaction', 'from_user_id', 'id');
    }
    
    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }

    public function chatRoomUsers()
    {
        return $this->hasMany('App\ChatRoomUsers');
    }
}
