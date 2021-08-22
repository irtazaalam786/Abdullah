@extends('layouts/app')
@section('content')
    @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </div>
    @endif
    
    @if(Session::has('success'))
       <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @else
       <p> {{ Session::get('success')  }}</p>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><strong>Profession</strong></div>

                        <div class="card-body">
                            <form method="POST" action="/profession/store">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter a name">
                                </div>
                                <button class="btn btn-primary" type="Submit" >Add</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection