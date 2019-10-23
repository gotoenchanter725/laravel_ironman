{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body d-flex">
                <div class="product-single-img w-50">
                    <img src="{{ asset('uploads/product_photos') }}/{{ $single_product->product_image }}" alt="">
                </div>
                <div class="product-single-content w-50">
                    <h3>{{ $single_product->product_name }}</h3>
                    <div class="rating-wrap fix">
                        <span class="pull-left">${{ $single_product->product_price }}</span>
                        <ul class="rating pull-right">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li>(05 Customar Review)</li>
                        </ul>
                    </div>
                    <p>{{ $single_product->product_breif_description }}</p>
                    <ul class="input-style">
                        <form id="add-to-cart" action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                        <li class="quantity cart-plus-minus">
                            <input type="text" value="1" name="product_quantity" />
                        </li>
                        <li>
                            <a href="#" onclick="event.preventDefault();
                            document.getElementById('add-to-cart').submit()">Add to Cart</a>
                        </li>
                        </form>
                    </ul>
                    <ul class="cetagory">
                        <li>Categories:</li>
                        <li><a href="{{ route('index') }}">{{ $single_product->category->categoryname }}</a></li>
                    </ul>
                    <ul class="socil-icon">
                        <li>Share :</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}