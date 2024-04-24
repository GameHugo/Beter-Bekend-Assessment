<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function getTotalTime()
    {
        $minutes = 0;
        $logs = $this->logs()->get();
        foreach ($logs as $log) {
            $minutes += $log->minutes;
        }
        return $minutes;
    }
}
