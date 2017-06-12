@extends('www.layouts.default')

@section('title','New Routine')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.contact') }}</h1>
        </div>
    </div>
    @if (session('action_status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success text-center">
                {{ session('action_status') }}
            </div>
        </div>
    </div>    
    @endif
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 bg_white box_shadow padding-vertical-30">
             <!-- form -->
            <form action="{{ nt_route('contact_post-'.user_lang()) }}" method="POST">
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label for="name" class="col-12 col-md-4 col-form-label">{{ trans('web.name') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required/>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-12 col-md-4 col-form-label">{{ trans('web.email') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required/>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="message" class="col-12 col-md-4 col-form-label">{{ trans('web.message') }}</label>
                    <div class="col-12 col-md-8">
                        <textarea class="form-control" name="message" rows=7 cols=70 required> </textarea>
                    </div>
                </div>
               
                    
               
                <button type="submit" value="Submit" class="btn btn-info pull-right"><i class="material-icons">send</i></button>
                
            </form>
        </div>
    </div>
</div>   
@endsection