<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $table = "events";
    protected $primaryKey = "id_event";

    protected $fillable = [
        'event_image',
        'host',
        'tags',
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'event_detail',
        'requirement',
        'target_donasi'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'host');
    }

    public function relawan(): HasMany{
        return $this->hasMany(Relawan::class, 'event_id');
    }
}
