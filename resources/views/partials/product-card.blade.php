<article class="card rf-card h-100">
    <div class="rf-card-img">
        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" loading="lazy">
    </div>
    <div class="card-body d-flex flex-column">
        <p class="rf-cat mb-1">{{ $item->category }}</p>
        <h3 class="rf-card-title mb-2">{{ $item->name }}</h3>
        <p class="rf-price mb-0">{{ $item->price_formatted }}</p>
        <a href="{{ route('products.show', $item) }}" class="btn-detail mt-auto">Detail Produk</a>
    </div>
</article>