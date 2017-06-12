@extends('www.layouts.default')

@section('title','Workout List')

@section('main')

<div class="container-fluid">
 <table class="table table-sdiviped">
        <thead class="labelead-inverse">
           <tr>
                <th>Id</th>
                <th>{{ trans('web.name') }}</th>
                <th>{{ trans('web.Description') }}</th>
                <th>Link</th>
                <th>{{ trans('web.categories') }}</th>
               
           </tr>
        </thead>
        <tbody>

        @foreach( $workouts as $workout)
            <tr>
                <td>{{ $workout -> id }}</td>
                <td>{{ $workout -> name[user_lang()]}}</td>
                <td>{{ $workout -> description[user_lang()]}} </td>
                <td> <a href=" https://www.youtube.com/watch?v={{ $workout -> link}}"> Link </a></td>
                <td>
                  {{ $workout -> category -> name[user_lang()] }}
                </td>               
             </tr>
        @endforeach

        </tbody>
    </table>
     {{ $workouts->links() }}
</div>
@endsection
