<?php

namespace App\Models;

use App\Support\Img;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    // Laravel menganggap "furniture" tak punya bentuk jamak, jadi nama tabel ditulis manual.
    protected $table = 'furnitures';

    protected $fillable = ['name', 'category', 'material', 'price', 'dimensions', 'image', 'description'];

    public const CATEGORIES = ['Sofa', 'Meja', 'Kursi', 'Lemari', 'Tempat Tidur', 'Rak', 'Dekorasi',];

    public function getImageUrlAttribute(): string
    {
        return Img::url($this->image);
    }

    public function getPriceFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
