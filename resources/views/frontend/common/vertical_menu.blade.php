@php
$categories = App\Models\Category::orderBy('category_name_vn', 'ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i style="width: 16px;"
                            class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
                        @if (session()->get('language') == 'vietnamese')
                            {{ $category->category_name_vn }}
                        @else
                            {{ $category->category_name_en }}
                        @endif
                    </a>
                    @php
                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                            ->orderBy('subcategory_name_vn', 'ASC')
                            ->get();
                    @endphp
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">
                                        <a
                                            href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug_vn) }}">
                                            <h2 class="title">
                                                @if (session()->get('language') == 'vietnamese')
                                                    {{ $subcategory->subcategory_name_vn }}
                                                @else
                                                    {{ $subcategory->subcategory_name_en }}
                                                @endif
                                            </h2>
                                        </a>
                                        @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                ->orderBy('subsubcategory_name_vn', 'ASC')
                                                ->get();
                                        @endphp
                                        <ul class="links list-unstyled">
                                            @foreach ($subsubcategories as $subsubcategory)
                                                <li><a
                                                        href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->subsubcategory_slug_vn) }}">
                                                        @if (session()->get('language') == 'vietnamese')
                                                            {{ $subsubcategory->subsubcategory_name_vn }}
                                                        @else
                                                            {{ $subsubcategory->subsubcategory_name_en }}
                                                        @endif
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
