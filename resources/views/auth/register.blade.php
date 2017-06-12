@extends('www.layouts.default')

@section('title','User Register')

@section('main')

<script>
  function checkHeight(){
    // alert(height.value);
     if(height.value<140){
         height.value=140;
     }
     
     if (height.value>215){
         height.value=215;
     }
  }
  
  function checkWeight(){
     
     if(weight.value<40){
         weight.value=40;
     }
     
     if (weight.value>200){
         weight.value=200;
     }
  }
</script>

<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading">{{ trans('web.register') }}</div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        
                        
                        <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                            <label for="alias" class="col-md-4 control-label">{{ trans('web.name') }}</label>

                            <div class="col-md-6">
                                <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}" required autofocus>

                                @if ($errors->has('alias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alias') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('web.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans('web.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{ trans('web.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">{{ trans('web.born') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="age" value="{{ old('age') }}" min="1900-01-01" max="2017-01-01" required>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">{{ trans('web.gender') }}</label>

                            <div class="col-md-6">
                               <label class="radio-inline"><input type="radio" name="gender" id='male' value='M' checked>{{ trans('web.man') }}</label>
                                <label class="radio-inline"><input type="radio" name="gender" id='female' value='F'>{{ trans('web.woman') }}</label>
                                <label class="radio-inline"><input type="radio" name="gender" id='no' value='PND'> {{ trans('web.pnd') }}</label>
                                

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            <label for="height" class="col-md-4 control-label">{{ trans('web.height') }}</label>

                            <div class="col-md-6">
                                <input id="height" type="number" class="form-control" name="height" min="140" max="215" value="{{ old('height') }}" autofocus onblur="checkHeight()">

                                @if ($errors->has('height'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">{{ trans('web.weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" class="form-control" name="weight" min="40" max="200" value="{{ old('weight') }}" autofocus onblur="checkWeight()">

                                @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('privacy') ? ' has-error' : '' }}">
                            <label for="privacy" class="col-md-4 control-label">{{ trans('web.perf_privacy') }}</label>

                            <div class="col-md-6">
                               <label class="radio-inline"><input type="radio" name="privacy_id" id='public' value='1' checked>{{ trans('web.public') }}</label>
                               <label class="radio-inline"><input type="radio" name="privacy_id" id='private' value='2'>{{ trans('web.private') }}</label>
                               

                                @if ($errors->has('privacy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('privacy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('web.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection