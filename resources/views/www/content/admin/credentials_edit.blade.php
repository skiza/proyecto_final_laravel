@extends('www.layouts.default')

@section('title','Admin Credentials Edit')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>My Credentials Edit</h1> 
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 ">
            @if (count($errors) > 0)  
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('adminCredentialsEditPost') }}">
                {{ csrf_field() }}
            <div class="form-group row">
              <label for="" class="col-12 col-md-4 col-form-label">Email:</label>
                <div class="col-12 col-md-8">
                    <input class="form-control" type="text" name="email" value="{{ old('email', $admin -> email) }}" />
                </div>
            </div>
              <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">Password:</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="password" name="password" value="{{ old('password') }}" />
                    </div>
                </div>    
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">Confirm password:</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    </div>
                </div>    
                
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                    <a href="{{ route('adminProfile') }}" class="btn btn-danger" >Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

                