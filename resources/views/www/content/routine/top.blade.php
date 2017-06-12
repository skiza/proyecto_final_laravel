@extends('www.layouts.default')

@section('title','Home')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title margin-bottom-20">
            <h1>{{ trans('web.welcome') }}</br>Fit&Up</h1>
        </div>  
    </div> 
    <div class="row">
        <div class="col-12 text-center">
            <p class=" margin-bottom-50">
                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. 
                Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <h2 class="subtitle margin-bottom-50" >Top 10 {{ trans('web.routines') }}</h2>
        </div> 
    </div>    
    <div class="row bg_white box_shadow margin-bottom-80">
        <div class="col-12">        
            <table class="table table-hover">
                <thead class="labelead-inverse">
                   <tr>
                        <th>{{ trans('web.name') }}</th>
                        <th>{{ trans('web.description') }}</th>
                        <th>{{ trans('web.categories') }}</th>
                        <th>Likes</th>
                        <th>{{ trans('web.author') }}</th>
                   </tr>
                </thead>
                <tbody>
                @foreach( $top_10_likes as $routine)
                    <tr> 
                        <td> <a href="{{ route('routine_detail-'.user_lang(),['routine_id' => $routine->id]) }}">{{ $routine -> name }}</a></td>
                        <td><p class="text_overflow">{{ $routine -> description }}</p></td>
                        <td>
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
        </div>
    </div>
            
     <div class="row">       
        <div class="col-12 text-center">  
            <h2 class="subtitle margin-bottom-50">{{ trans('web.last_routines') }}</h2>
        </div>
    </div>
    <div class="row  bg_white box_shadow">       
        <div class="col-12">         
                 <table class="table table-hover">
                        <thead class="labelead-inverse">
                           <tr>
                        <th>{{ trans('web.name') }}</th>
                        <th>{{ trans('web.description') }}</th>
                        <th>{{ trans('web.categories') }}</th>
                        <th>Likes</th>
                        <th>{{ trans('web.author') }}</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach( $top_10_created as $routine)
                            <tr> 
                                <td> <a href="{{ route('routine_detail-'.user_lang(),['routine_id' => $routine->id]) }}">{{ $routine -> name }}</a></td>
                                <td>{{ $routine -> description }} </td>
                                <td>
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
                </div>
         </div>
</div>
@endsection