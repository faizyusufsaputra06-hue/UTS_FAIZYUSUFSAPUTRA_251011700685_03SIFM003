<article class="card rf-card h-100">
    <div class="rf-card-img">
        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" loading="lazy">
    </div>
    <div class="card-body d-flex flex-column">
        <p class="rf-cat mb-1">{{ $item->category }}</p>
        <h3 class="rf-card-title mb-2">
            <a href="{{ route('products.show', $item) }}" class="stretched-link">{{ $item->name }}</a>
        </h3>
        <p class="rf-price mt-auto mb-0">{{ $item->price_formatted }}</p>
    </div>
</article>
