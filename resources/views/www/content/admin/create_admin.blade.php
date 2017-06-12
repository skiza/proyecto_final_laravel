@extends('www.layouts.default')

@section('title','Create Admin')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>Create Admin</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('createAdminPost') }}" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Name:</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="alias" placeholder="Insert a name" value="{{ old('alias') }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Email:</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Insert a email"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Password:</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="password" name="password" placeholder="Insert a password"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Confirm password:</label>
                    <div class="col-12 col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repeat the password" required>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">Date of Birth:</label>
                  <div class="col-12 col-md-8">
                        <input class="form-control" type="date" name="age" value="{{ old('age') }}" min="1900-01-01" max="2017-01-01" required/>
                    </div>
                </div>
               <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Gender:</label>
                    <div class="col-12 col-md-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='M' {{ old('gender') == 'M' ? 'checked' : '' }}>
                                &nbsp;Male
                            </label>
                        </div>    
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='F' {{ old('gender') == 'F' ? 'checked' : '' }}>
                                &nbsp;Female
                            </label>
                        </div>
                        <div class="form-check"> 
                            <label class="form-check-label">
                                <input class="form-check-input" checked type="radio" name="gender" value='PND' {{ old('gender') == 'PND' ? 'checked' : '' }}>
                                &nbsp;Not Specified
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary"/>
                <a href="{{ route('adminsList') }}" class="btn btn-danger" >Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
