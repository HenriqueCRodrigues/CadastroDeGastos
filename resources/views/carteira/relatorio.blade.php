@extends('welcome')
@section('carteira')
	<div class="col-sm-12">
		<?php
			$types = ['pie', 'bar'];
	    ?>
			@foreach($types as $type)

				{!! $chart->setType($type)->render() !!}
				
			@endforeach
	</div>

@endsection