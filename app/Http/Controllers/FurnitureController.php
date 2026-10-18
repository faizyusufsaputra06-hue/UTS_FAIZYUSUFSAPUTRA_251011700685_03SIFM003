<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function home()
    {
        return view('home', [
            'latest'     => Furniture::latest('id')->take(4)->get(),
            'categories' => $this->categoryList(),
        ]);
    }

    public function index(Request $request)
    {
        $query = Furniture::query();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        match ($request->get('urut')) {
            'termurah' => $query->orderBy('price'),
            'termahal' => $query->orderByDesc('price'),
            default    => $query->latest('id'),
        };

        return view('products.index', [
            'furnitures' => $query->paginate(6)->withQueryString(),
            'categories' => $this->categoryList(),
            'total'      => Furniture::count(),
        ]);
    }

    public function show(Furniture $furniture)
    {
        $related = Furniture::where('category', $furniture->category)
            ->where('id', '!=', $furniture->id)->take(4)->get();

        return view('products.show', compact('furniture', 'related'));
    }   

    public function categories()
    {
        return view('products.categories', ['categories' => $this->categoryList()]);
    }

    /** Daftar kategori + jumlah produk + gambar produk pertama sebagai sampul. */
    private function categoryList()
    {
        return collect(Furniture::CATEGORIES)->map(function ($name) {
            $first = Furniture::where('category', $name)->orderBy('id')->first();
            return (object) [
                'name'  => $name,
                'count' => Furniture::where('category', $name)->count(),
                'image' => $first?->image_url ?? \App\Support\Img::url(null),
            ];
        });
    }
}
