<?php

    namespace Blixx\Invite\Models;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;


	/**
	 * @property \Carbon\Carbon $created_at
	 * @property string $email
	 * @property \Carbon\Carbon $expired_at
	 * @property string $first_name
	 * @property string $is_expired
	 * @property string $is_used
	 * @property string $token
	 * @property \Carbon\Carbon $updated_at
	 * @property \Carbon\Carbon $used_at
	 *
	 * Automatically generated property list, generated with phpdoc cli, by Josse Zwols [BLIXX]
	 **/

    class Invite extends Model
    {

        protected $dates = [
            'created_at',
            'updated_at',
            'used_at',
            'expired_at',
        ];

        protected $fillable = [
            'used_at',
            'expired_at',
            'token',
            'email',
            'first_name',
        ];

        public function markUsed()
        {
            $this->update(['used_at' => Carbon::now()]);
            return $this;
        }

        public function setExpiration()
        {
            $this->fill(['expired_at' => Carbon::now()->addDays(2)]);
            return $this;
        }

        public function setToken()
        {
            if (class_exists('Str')){
                $this->fill(['token'=>\Str::random(6)]);
            }
            else{
                $this->fill(['token'=>sha1(microtime(true) . 'xxxxxxxxxsaltxxxxxxxxx@#$%^&*(*&%#@#$%^&*^$#@#$%^&*')]);
            }
            return $this;
        }

        public function checkToken($token)
        {
            return $this->attributes['token'] === $token;
        }

        // provides us with the is_expired attribute
        public function getIsExpiredAttribute()
        {
            return $this->expired_at < Carbon::now();
        }

        // provides us with the is_used attribute
        public function getIsUsedAttribute()
        {
            return $this->used_at !== null;
        }

    }
