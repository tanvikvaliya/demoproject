@extends('pages.frontend.layout.master')
@section('content')	
<title>Home</title>
@section('css')
<style>
.proimage{
	height:210px;
	width:134px;
}
	</style>
@endsection
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend/home/girl1.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('images/frontend/home/pricing.png') }}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend/home/girl2.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('images/frontend/home/pricing.png') }}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend/home/girl3.jpg') }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('images/frontend/home/pricing.png') }}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@if(!empty($data))
							@foreach($data as $cat)	
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											@if(!empty($cat['child']))
												<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat['id']}}">
													<span class="badge pull-right"><i class="fa fa-plus"></i></span>
														<a href="{{route('homepage',['category_id' => $cat['id']])}}">{{$cat['name']}}</a>
												</a>
											@else
												<a href="#">{{$cat['name']}}</a>
											@endif
										</h4>
									</div>
								</div>
								<div id="{{$cat['id']}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@if(!empty($cat['child']))
												@foreach($cat['child'] as $mcat)
													<li><a href="#">{{$mcat['name']}}</a></li>
												@endforeach
											@endif
										</ul>
									</div>
								</div>
							@endforeach
						@endif
							
					</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">₹ 0</b> <b class="pull-right">₹ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('images/frontend/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($product as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											@if(!empty($pro['product_images']))
												
													<a href="{{route('product_details',$pro['id'])}}">
														<img class="proimage" src="{{ asset('images/'.$pro['product_images'][0]['image_name']) }}" alt="" />
													</a>	
												
											@endif
											<h2>₹ {{$pro['price']}}</h2>
											<p>{{$pro['name']}}</p>
											<a data-value="{{$pro['id']}}" id="proid" class="btn btn-default add-to-cart add_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>₹ {{$pro['price']}}</h2>
												<p>{{$pro['name']}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
				</div><!--features_items-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
							<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active">	
										@foreach($product as $pro)
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															@if(!empty($pro['product_images']))
																@foreach($pro['product_images'] as $proi)
																	<img class="proimage" src="{{ asset('images/'.$proi['image_name']) }}" alt="" />
																@endforeach
															@endif
															<h2>₹ {{$pro['price']}}</h2>
															<p>{{$pro['name']}}</p>
															<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							 	<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  	</a>
							  	<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  	</a>			
							</div><!--/recommended_items-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@section('js')
<script>
$(function(){
  $(document).on('click', '.add_cart', function(){
		var j= $(this).data("value");
		$.ajax({
                type:'POST',
                url:'{{route("addcart")}}',
                data:{"_token": "{{ csrf_token() }}","id":j,"qty":1,
                },
                success: function( response ) {
                  
                }
            });
       })
});
	</script>
@endsection
@endsection