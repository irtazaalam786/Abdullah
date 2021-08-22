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
                        <div class="card-header"><strong>Agency Profession</strong></div>

                        <div class="card-body">
                            <form method="POST" action="/agency/profession/store">
                                {{csrf_field()}}
                                <label>Profession:</label>
                                <select name="profession_id" class="form-control">
                                    @foreach($professions as $profession)
                                       <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                                    @endforeach
                                    <option value="select_all">Select All</option>
                                </select>

                                <label>Agency:</label>
                                <select name="agency_id" class="form-control">
                                    @foreach($agencies as $agency)
                                       <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                                
                                <label>Price:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter a price">
                                </div>
                                <br>
                                <button class="btn btn-primary" type="Submit" >Add</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection