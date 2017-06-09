@extends('welcome')
@section('carteira')
<div class="col-sm-12">

{!! $chart->render() !!}
</div>

@endsection