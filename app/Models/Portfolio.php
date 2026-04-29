<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function portfoliocategories()
    {
        return $this->belongsTo(Portfoliocategory::class, 'category_id');
    }
    
    public function category()
{
    return $this->belongsTo(Portfoliocategory::class, 'category_id'); // foreign key চেক করো
}


}