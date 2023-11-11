@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @foreach($repositories as $repository)
            <div class="col-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{$repository->name}}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$repository->full_name}}</h5>
                        <p class="card-text">{{$repository->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
