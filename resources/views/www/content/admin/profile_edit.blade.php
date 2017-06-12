@extends('www.layouts.default')

@section('title','Admin Profile Edit')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>My Profile Edit</h1>
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
            <form method="POST" action="{{ route('adminProfileEditPost') }}" >
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">Name: </label>
                  <div class="col-12 col-md-8">
                    <input class="form-control" type="text" name="alias" value="{{ old('alias', $admin -> alias) }}" />
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">Date of Birth:</label>
                  <div class="col-12 col-md-8">
                    <input class="form-control" type="date" name="age" value="{{ old('age', $admin -> age) }}" />
                  </div>
                </div>
               <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">Gender:</label>
                    <div class="col-12 col-md-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='M' {{ old('gender', $admin -> gender) == 'M' ? 'checked' : '' }}>
                                &nbsp;Male
                            </label>
                        </div>    
                        <div class="form-check">    
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='F' {{ old('gender', $admin -> gender) == 'F' ? 'checked' : '' }}>
                                &nbsp;Female
                            </label>
                        </div>    
                        <div class="form-check"> 
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='PND' {{ old('gender', $admin -> gender) == 'PND' ? 'checked' : '' }}>
                                &nbsp;Not specified
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary"/>
                <a href="{{ route('adminProfile') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
