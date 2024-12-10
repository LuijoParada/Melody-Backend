<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;



class Partitura extends Model
{
    use HasFactory;

    protected $table = 'partituras';

    protected $fillable = [
        'id_usuario',
        'nombre_pdf',
        'ruta_pdf',
        'nombre_audio',
        'ruta_audio',
        'fecha_generacion',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
