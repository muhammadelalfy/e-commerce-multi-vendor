<x-front-layout>


    <x-slot name="breadcrumbs">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Shop Grid</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="javascript:void(0)">Shop</a></li>
                            <li>Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>


    <!-- Start Product Grids -->
        <div class="container">
            <div class="row">



                                    @forelse($products as $product)
                                        <div class="col-lg-4 col-md-6 col-6">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <img src="{{$product->image_url}}" alt="#">
                                                    <div class="button">
                                                        <a href="{{route('front.cart.store')}}" class="btn"><i
                                                                class="lni lni-cart"></i> Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
{{--                                                    <span class="category">Watches</span>--}}
                                                    <h4 class="title">
                                                        <a href="{{route('front.products.show',$product->id)}}">{{$product->name}}</a>
                                                    </h4>

{{--                                                    </ul>--}}
                                                    <div class="price">
                                                        <span>{{\App\Helpers\Currency::format($product->price)}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>

                                    @empty
                                        {{'no products found'}}
                                    @endforelse
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="javascript:void(0)">1</a></li>
                                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)"><i
                                                            class="lni lni-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>


            </div>
        </div>

    <!-- End Product Grids -->
</x-front-layout>
