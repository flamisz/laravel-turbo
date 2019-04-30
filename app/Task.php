<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/tasks/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function toggle()
    {
        if ($time = $this->times()->whereNull('stop')->first()) {
            $length = now()->diffInSeconds($time->start);
            $time->update([
                'stop' => now(),
                'length' => $length
            ]);

            $this->increment('length', $length);

            return $time;
        }

        return $this->times()->create(['start' => now()]);
    }

    public function times()
    {
        return $this->hasMany(Time::class)->latest('start');
    }

    public function getLengthAttribute($value)
    {
        return CarbonInterval::seconds($value)->cascade()->forHumans();
    }

    public function hasUnstoppedTime()
    {
        return ! ! $this->times->where('stop', null)->count();
    }
}
