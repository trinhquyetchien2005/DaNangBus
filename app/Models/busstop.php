<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'info', 'longitude', 'latitude', 'route_id'];

    public function route()
    {
        return $this->belongsTo(Route::class); // Mối quan hệ n-1 với bảng routes
    }
}
