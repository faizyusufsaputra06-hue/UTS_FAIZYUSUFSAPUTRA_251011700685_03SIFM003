<?php

namespace App\Support;

class Img
{
    /** URL gambar dari public/assets/images, otomatis pakai placeholder kalau file belum ada. */
    public static function url(?string $file): string
    {
        if ($file && file_exists(public_path('assets/images/' . $file))) {
            return asset('assets/images/' . $file);
        }
        return asset('assets/images/placeholder.svg');
    }
}
