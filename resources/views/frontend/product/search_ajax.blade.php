<style>
.card{
background-color: #fff;
padding: 15px;
border:none;
}

.input-box{
position: relative;
}

.input-box i {
position: absolute;
right: 13px;
top:15px;
color:#ced4da;

}

.form-control{

height: 50px;
background-color:#eeeeee69;
}

.form-control:focus{
background-color: #eeeeee69;
box-shadow: none;
border-color: #eee;
}


.list{

padding-top: 20px;
padding-bottom: 10px;
display: flex;
align-items: center;

}

.border-bottom{

border-bottom: 2px solid #eee;
}

.list i{
font-size: 19px;
color: red;
}

.list small{

color:#dedddd;
}
</style>
{{-- <ul style="list-style: none;">
    @foreach ($products as $product)
        <li>
            <img src="{{asset($product->product_thumbnail)}}" style="width: 30px; height: 30px;" alt="">    
            {{$product->product_name_vn}}
        </li> 
    @endforeach --}}
{{-- </ul> --}}

@if ($products->isEmpty())
  <h3 class="text-center text-danger">Product Not Found</h3>
@else
<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
      <div class="col-md-6">
          <div class="card">           
            @foreach ($products as $product)
            <a href="{{ url('product/details/' . $product->id .'/'.$product->product_slug_vn) }}">
              <div class="list border-bottom">
                <img src="{{asset($product->product_thumbnail)}}" style="width: 30px; height: 30px;margin-right: 8px;" alt="">    
                <div class="d-flex flex-column ml-3">
                  <span>{{$product->product_name_vn}}</span> 
                  <small>{{number_format($product->selling_price)}}đ</small>
                </div>                   
              </div>
            </a>
            @endforeach
          </div> 
      </div>  
    </div>  
</div>
@endif