@extends('www.layouts.default')

@section('title','Results')

@section('main')
<div class="container">
    <div class="row search">
       <form method="GET" action="{{ nt_route('routine_search-'.user_lang())}}" name="search" id="search"  class="form-inline">
               {{ csrf_field() }}
               <select name="category_id" id="category_id" class="custom-select mb-2 mr-sm-2 mb-sm-0">
                   
                   @foreach($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name[user_lang()] }}</option>
                   @endforeach
               </select>
              <button type="submit" form="search" value="Submit" class="btn  btn_search"><i class="material-icons">search</i></button>
        </form>
    </div>
    <div class="row">
        <div class="col-12 main__title margin-bottom-20  margin-top-80">
            <h1>Resultados de busqueda</h1>
        </div>  
    </div>
    <div class="row bg_white box_shadow margin-bottom-80">
        <div class="col-12">  
         @if(count($routines) != 0)    
            <table class="table table-hover  table-responsive">
                <thead class="labelead-inverse">
                   <tr>
                        <th>{{ trans('web.name') }}</th>
                        <th class="hidden-sm-down">{{ trans('web.description') }}</th>
                        <th class="hidden-sm-down">{{ trans('web.categories') }}</th>
                        <th>Likes</th>
                        <th>{{ trans('web.author') }}</th>
                   </tr>
                </thead>
                <tbody>
                @foreach( $routines as $routine)
                    <tr> 
                        <td> <a href="{{ route('routine_detail-'.user_lang(),['routine_id' => $routine->id]) }}">{{ $routine -> name }}</a></td>
                        <td class="hidden-sm-down" ><p class="text_overflow">{{ $routine -> description }}</p></td>
                        <td class="hidden-sm-down">
                            @foreach ( $routine -> categories as $category )
                                <button class="btn bg_cat_{{ $category->id }}" data-toggle="collapse">
                                    {{ $category->name[user_lang()] }}
                                </button>
                            @endforeach
                        </td>
                        <td>{{ $routine -> likes }} </td>
                        <td>{{ $routine -> user->alias }} </td>               
                     </tr>
                @endforeach
                </tbody>
            </table>
             
            @else
             <h2 class="subtitle"> Lo sentimos, no hay resultados de busqueda </h2>
            @endif
        </div>
    </div>
</div>
@endsection