<div class="search-area flex-style">
    <span class="closebar">Close</span>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="search-form">
                    <form method="GET" action="{{ route('search') }}">
                        <input type="text" placeholder="Search Here..." name="filter[product_name]">
                        <select name="filter[category_id]" class="form-control" id="">
                            <option value="">-Select One Category-</option>
                            @foreach (App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                            @endforeach
                        </select>
                        <select name="sort" class="form-control">
                            <option value="product_name">Sort By: A-Z</option>
                            <option value="-product_name">Sort By: Z-A</option>
                        </select>
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>