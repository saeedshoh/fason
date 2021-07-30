<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city_id',
        'profile_photo_path',
        'sms_verified_at',
        'registered_at',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
	 * The password attribute should be hashed
	 */
	public function setPasswordAttribute($password)
	{
		if ($password !== null && $password !== "")
		{
			$this->attributes['password'] = bcrypt($password);
		}
    }

    public function store() {
        return $this->hasOne('App\Models\Store', 'user_id')->withoutGlobalScopes();
    }

    public function favorite() {
        return $this->hasMany('App\Models\Favorite', 'user_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
