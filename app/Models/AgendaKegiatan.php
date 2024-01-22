<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaKegiatan extends Model
{
    protected $table = 'agenda_kegiatans';
    protected $guarded = ['id'];

    use HasFactory;
}
