@extends('www.layouts.default')

@section('title','Profile')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.profile') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 bg_white box_shadow padding-vertical-30">
            <table class="table table-sdiviped">
                <tr>
                    <th>{{ trans('web.name') }}</th> <td>{{ $user -> alias}}</td>
                </tr>    
                <tr>
                    <th>{{ trans('web.email') }}</th> <td>{{ $user -> email }}</td>
                </tr>
                <tr>
                    <th>{{ trans('web.born') }}</th>    <td>{{ date('d/m/Y',strtotime($user -> age)) }}</td>
                </tr>    
                <tr>
                    <th>{{ trans('web.gender') }}</th>  <td>{{ $user -> gender == 'F' ? 'Female' : 'Male' }}</td>
                </tr>    
                <tr>
                    <th>{{ trans('web.weight') }}</th>  <td>{{ $user -> weight }}</td>
                </tr>    
                <tr>
                    <th>{{ trans('web.height') }}</th> <td>{{ $user -> height }}</td>
                    </tr>    
                <tr>
                    <th>{{ trans('web.privacy') }}</th> 
                    <td>
                      {{ $user -> privacy->name[user_lang()] }}
                          
                    </td>  
                </tr>
            </table>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ nt_route('edit_user-'.user_lang()) }}" class="btn btn-primary"><i class="material-icons">create</i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
