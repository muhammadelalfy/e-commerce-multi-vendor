
@props(['product' => ''])
<div class="single-product">
    <div class="product-image">
        <img src="{{ $product->image_url }}" alt="#">
        {{-- if has sale --}}

        @if ($product->sale_percent >= 0.0)
            <span class="sale-tag">-{{ $product->sale_percent }}%</span>
        @endif
        {{-- if is new --}}
        @if ($product->new)
            <span class="sale-price">-{{ $product->new }}%</span>
        @endif
        <div class="button">

            <a href="{{ route('front.products.show',$product->slug) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
        </div>
    </div>
    <div class="product-info">
        <span class="category">{{ $product->category->name }}</span>
        <h4 class="title">
            <a href="{{ route('front.products.show',$product->slug) }}">{{ $product->name }}</a>
        </h4>
        <ul class="review">
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star-filled"></i></li>
            <li><i class="lni lni-star"></i></li>
            <li>
                <span>4.0 Review(s)</span>
            </li>
        </ul>
        <div class="price">
            <span>{{ $product->price }}</span>
            <span class="discount-price">{{ $product->compare_price ?? '' }}</span>

        </div>
    </div>
</div>
