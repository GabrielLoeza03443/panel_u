@extends('layouts.index')
 
@section('title', 'LOGS')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('search')}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Ratekey</label>
                      <input type="text" class="form-control" name="rate" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection