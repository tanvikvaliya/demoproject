@extends('pages.frontend.layout.master')
@section('content')	
@section('css')
<style>
	.smallpro{
		height:140px;
		width:140px;
	}
</style>
@endsection
<title>Cart</title>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('index')}}">Home</a></li>
				  <li class="active">Wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@if(!empty($data))
						@foreach($data as $item)
								<tr>
									<td class="cart_product">
										<a href=""><img class="smallpro" src="{{ asset('images/'.$item['product_details']['product_images'][0]['image_name']) }}" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href="">{{$item['product_details']['name']}}</a></h4>
									</td>
									<td class="cart_price">
										<p>₹ {{$item['product_details']['price']}}</p>
									</td>
									<td class="cart_delete">
										<a data-value="" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
									</td>
								</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
	@section('js')
<script>
$(function(){
  $(document).on('click', '.cart_quantity_delete', function(){
		var j= $(this).data("value");
		$.ajax({
                type:'POST',
                url:'{{route("removecart")}}',
                data:{"_token": "{{ csrf_token() }}","id":j,
                },
                success: function( response ) {
                  
                }
            });
       })
});
	</script>
@endsection
@endsection