<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = [
      'category_name'
    ];

    public $timestamps = false;


    public function books(): HasMany
    {
        return $this->hasMany(book::class);
    }
}
