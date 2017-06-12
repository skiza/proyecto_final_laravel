@extends('www.layouts.default')

@section('title','Edit User Credentials')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.credentials_title') }}</h1> 
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 bg_white box_shadow padding-vertical-30">
            @if (count($errors) > 0)  
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ nt_route('user_credentials_post-'.user_lang()) }}" >
                {{ csrf_field() }}
            <div class="form-group row">
              <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.email') }}</label>
                <div class="col-12 col-md-8">
                    <input class="form-control" type="text" name="email" value="{{ old('email', $user -> email) }}" />
                </div>
            </div>
              <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.password') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="password" name="password" value="{{ old('password') }}" />
                    </div>
                </div>    
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.rep_password') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    </div>
                </div>    
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
                        <a href="{{ nt_route('profile-'.user_lang()) }}" class="btn btn-danger" ><i class="material-icons">cancel</i></a>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection

                