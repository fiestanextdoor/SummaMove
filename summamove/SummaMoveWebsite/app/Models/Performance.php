<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Performance extends Model {
    use HasFactory;

    protected $fillable = ['user_id','exercise_id','count','start_time','end_time'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
