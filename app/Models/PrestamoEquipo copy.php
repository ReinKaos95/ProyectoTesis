<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoEquipo extends Model
{
    use HasFactory;
    protected $table = "prestamo_equipos";
    protected $fillable = [
        'pres_salida', 'pres_fecha_salida', 'pres_fecha_entrada', 'usuarios_us_id', 'equipos_eq_id', 'pres_estatus',
    ];
     public function users()
    {
        return $this->hasMany(User::class, 'usuarios_us_id');
    }
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'equipos_eq_id');
    }
        public function orden_salida()
    {
        return $this->belongsTo(OrdenSalida::class, 'prestamo_equipos_pres_id');
    }
}
