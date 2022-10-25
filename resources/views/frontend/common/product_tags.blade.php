@php
$tags_en = App\Models\Product::groupBy('product_tag_en')
    ->select('product_tag_en')
    ->get();
$tags_vn = App\Models\Product::groupBy('product_tag_vn')
    ->select('product_tag_vn')
    ->get();
// dd($tags_en);
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if (session()->get('language') == 'vietnamese')
                @foreach ($tags_vn as $tag)
                    @php
                        $tag->product_tag_vn = explode(',', $tag->product_tag_vn);
                        
                    @endphp
                    @foreach ($tag->product_tag_vn as $tagItem)
                        <a class="item" title="Phone" href="{{ url('product/tag/' . $tagItem) }}">
                            {{ $tagItem }}
                        </a>
                    @endforeach
                @endforeach
            @else
                @foreach ($tags_en as $tag)
                    @php
                        $tag->product_tag_en = explode(',', $tag->product_tag_en);
                        
                    @endphp
                    @foreach ($tag->product_tag_en as $tagItem)
                        @if (isset($productTag) && $productTag == $tagItem)
                            <a class="item active" title="Phone" href="{{ url('product/tag/' . $tagItem) }}">
                                {{ $tagItem }}
                            </a>
                        @else
                            <a class="item" title="Phone" href="{{ url('product/tag/' . $tagItem) }}">
                                {{ $tagItem }}
                            </a>
                        @endif
                    @endforeach
                    {{-- <a class="item active" title="Phone" href="{{ url('product/tag/' . $tag->product_tag_en) }}">
                        {{ $tag->product_tag_en }}
                    </a> --}}
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
