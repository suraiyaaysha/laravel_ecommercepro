      <section class="product_section layout_padding">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="heading_container heading_center">
                     <h2>
                        Our <span>products</span>
                     </h2>
                  </div>

                  {{-- Search Product form --}}
                  <div class="search-product-form">
                     <form action="{{url('product_search')}}" method="GET">
                     @csrf
                        <input type="text" name="search" placeholder="Search for Something">
                        <button type="submit" class="btn btn-primary bg-primary">Search</button>
                     </form>
                  </div>
                  {{-- Search Product form --}}
               </div>
            </div>

            {{-- <div class="row mb-4 mt-4 justify-content-center">
               <div class="col-sm-6 col-md-4 col-lg-4">                 
                  @if (session()->has('message'))
                  <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message')}}
                  </div> 
                  @endif
               </div>
            </div> --}}

            <div class="row">

               @foreach ($product as $item)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ url('product_details', $item->id)}}" class="option1">Product details</a>
                           {{-- <a href="" class="option2">
                           Buy Now
                           </a> --}}
                           <form action="{{url('add_cart', $item->id)}}" method="POST">
                           @csrf
                              <div class="row">
                                 <div class="col">
                                    <input type="number" name="quantity" value="1" min="1">
                                 </div>
                                 <div class="col">
                                    <input type="submit" value="Add to Cart">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{ $item->image }}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>{{ $item->title }}</h5>
                        @if ($item->discount_price!=null)
                           <h6 style="color:darkblue">${{ $item->discount_price }}</h6>
                           <h6 style="text-decoration: line-through; color:red;">${{ $item->price }}</h6>
                           @else
                           <h6 style="color:darkblue">${{ $item->price }}</h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach

               <span style="padding-top: 20px;">{!!$product->withQueryString()->links('pagination::bootstrap-5')!!}</span>

            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
            

         </div>
      </section>