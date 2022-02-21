@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<h2>Products</h2>
    
    <div class="row">
        @if(count($products)>0)
           @foreach($products as $product)
                <div class="col-lg-4">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h2 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{ $product->name }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-area">
                                <img src="/img/product/{{ $product->image }}" alt="{{ $product->name }}">
                            </div> 
                        </div>     
                        <div class="card-footer my-0">
                                {{ 'R$: '. $product->price }}     
                        </div>             
                    </div>
                </div>
           
            @endforeach
        @else
          <div class="col-sm-12 {{ $class ?? '' }}">
                Você não possui product cadastrado!
                
          </div>
          <a href="{{ route('product.add') }}" class="btn btn-secodary mt-2 ml-3">Cadastrar</a>
          
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
