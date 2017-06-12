@extends('www.layouts.default')

@section('title','Edit')

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
             @if (session('action_status'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success text-center">
                            {{ session('action_status') }}
                        </div>
                    </div>
                </div>  
            @endif    
            <form method="POST" action="{{ nt_route('edit_user_post-'.user_lang()) }}" >
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.name') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="alias" value="{{ old('alias', $user -> alias) }}" />
                    </div>
                </div> 
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.born') }}</label>
                  <div class="col-12 col-md-8">
                        <input class="form-control" type="date" name="age" value="{{ old('age', $user -> age) }}" />
                    </div>
                </div>    
               <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.gender') }}</label>
                    <div class="col-12 col-md-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='M' {{ old('gender', $user-> gender) == 'M' ? 'checked' : '' }}>
                                &nbsp;{{ trans('web.man') }}
                            </label>
                        </div>    
                        <div class="form-check">    
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='F' {{ old('gender', $user-> gender) == 'F' ? 'checked' : '' }}>
                                &nbsp;{{ trans('web.woman') }}
                            </label>
                        </div>    
                        <div class="form-check"> 
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value='PND' {{ old('gender', $user-> gender) == 'PND' ? 'checked' : '' }}>
                                &nbsp;{{ trans('web.pnd') }}
                            </label>
                        </div>    
                    </div>
                </div>   
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.weight') }}</label>
                  <div class="col-12 col-md-8">
                        <input class="form-control" type="number" min="1" name="weight" value={{ old('weight', $user -> weight) }} />
                    </div>
                </div>   
               <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.height') }}</label>
                  <div class="col-12 col-md-8">
                        <input class="form-control" type="number" min="1" name="height" value={{ old('height', $user -> height) }} />
                    </div>
                </div>    
                <div class="form-group row">
                  <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.privacy') }}</label>
                    <div class="col-12 col-md-8">
                        @foreach ($privacies as $pri)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="privacy_id" value='{{  $pri->id }}' {{ old('privacy_id', $user->privacy_id) == $pri->id ? 'checked' : '' }}>
                                &nbsp;{{  $pri->name[user_lang()] }}
                            </label>
                        </div>    
                       @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
                        <a href="{{ nt_route('profile-'.user_lang()) }}" class="btn bg-danger" ><i class="material-icons" title="cancel">cancel</i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
