@extends('components.layout')
@include('components.navbar')
@section('content')

    @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 gy-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$product->name}}</h5>
                    <div class="category-buttons d-flex justify-content-center gap-3 mt-2">
                    </div>

                </div>
            </div>
        </div>


    @endforeach


@endsection

@section('styling')
<style>
    .card{
        height: 350px;
    }
</style>
@endsection
