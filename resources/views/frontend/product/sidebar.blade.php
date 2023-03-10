<div class="sidebar-wrapper sidebar-wrapper-mrg-right">
    <div class="sidebar-widget mb-40">
        <h4 class="sidebar-widget-title">Search </h4>
        <div class="sidebar-search">
            <form class="sidebar-search-form" action="{{route('product.search')}}" method="GET" >
                @csrf
                <input type="text" placeholder="Search here..." id="search" name="search" autocomplete="off">
                
                <button type="submit">
                    <i class="icon-magnifier"></i>
                </button>
            </form>
        </div>
        @error('search') 
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
        <h4 class="sidebar-widget-title">Categories </h4>
        <div class="shop-catigory">
            <ul>
                @php 
                    $categories_list = App\Models\Category::orderby('category_name','ASC')->get();
                @endphp
                @foreach ($categories_list as $category_view)
                <li>
                  <a href="{{ url('category/product/'.$category_view->id) }}">{{$category_view->category_name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <div class="sidebar-widget shop-sidebar-border pt-40">
        <h4 class="sidebar-widget-title">Popular Tags</h4>
        <div class="tag-wrap sidebar-widget-tag">
          @php 
            $tags = App\Models\Product::groupBy('tags')->select('tags')->limit('8')->get();
           @endphp
            @foreach ($tags as $product_tag)
            <a href="{{url('product/tag/'.$product_tag->tags) }}">{{ str_replace(',',' ',$product_tag->tags)}}</a>
            @endforeach
        </div>
    </div>
</div>
