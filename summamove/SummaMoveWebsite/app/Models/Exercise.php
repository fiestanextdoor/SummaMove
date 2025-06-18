<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model {
    use HasFactory;

    protected $fillable = ['name','description_nl','description_en'];

    public function performances() {
        return $this->hasMany(Performance::class);
    }
}
