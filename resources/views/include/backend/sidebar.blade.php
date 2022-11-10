<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu text-uppercase" id="menu">
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('product.create') }}">Add products</a></li>
                    <li><a href="{{ url('products') }}">allproducts</a></li>
                    <li><a href="#">trashed products</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">catagories</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('catagories') }}">catagories</a></li>
                    <li><a href="{{ route('subcatagories') }}">sub catagories</a></li>
                    <li><a href="{{ route('ptype') }}">prodect type</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-093-waving"></i>
                    <span class="nav-text">more default data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('manufacturer') }}">manufacturers</a></li>
                    <li><a href="{{ route('brands') }}">brands</a></li>
                    <li><a href="{{ route('suppliers') }}">suppliers</a></li>
                    <li><a href="{{ route('uoms') }}">uom</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
