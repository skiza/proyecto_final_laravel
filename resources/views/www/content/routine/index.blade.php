@extends('www.layouts.default')

@section('title','Routine List')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.routine_list') }}</h1>
        </div>
        @if (session('action_status'))
        <div class="col-12">
            <div class="alert alert-success">
                {{ session('action_status') }}
            </div>
        </div>    
        @endif
    </div>
 <table class="table table-sdiviped bg_white box_shadow table-responsive">
        <thead class="labelead-inverse">
           <tr>
            <th>{{ trans('web.name') }}</th>
            <th class="hidden-sm-down">{{ trans('web.description') }}</th>
            <th class="hidden-sm-down">{{ trans('web.categories') }}</th>
            <th class="text-center">{{ trans('web.workout') }}</th>
            <th class="text-center hidden-lg-down">Likes</th>
            <th class="text-center hidden-sm-down">{{ trans('web.delete') }}</th>
           </tr>
        </thead>
        <tbody>
        @foreach( $routines as $routine)
            <tr id="{{ $routine -> id }}">
                <td>
                    <a href="{{ nt_route('routine_detail-'.user_lang(),['id_routine' => $routine->id]) }}" title="Editar">
                    {{ $routine -> name}}
                    </a>
                </td>
                <td class="hidden-sm-down">{{ $routine -> description}} </td>
                <td class="hidden-sm-down">
                    @foreach ( $routine -> categories as $category )
                        <button class="btn bg_cat_{{ $category->id }}" data-toggle="collapse">
                            {{ $category->name[user_lang()] }}
                        </button>
                    @endforeach
                </td>
                <td class="text-center">
                    {{ count($routine->workout) }}
                </td>
                <td class="text-center hidden-lg-down">
                    {{ count($routine->likes) }}
                </td>
                <td class="delete text-center " data-id="{{  $routine -> id }}" data-action="delete" data-url="{{ nt_route('routine_delete-'.user_lang(),['id_routine' => $routine->id ]) }} ">
                    <i class="material-icons">delete</i>
                </td>               
             </tr>
        @endforeach

        </tbody>
    </table>
    {{ $routines->links() }}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){

        $('.delete').on('click', function(){
            
            var routine_id = $(this).attr('data-id');
            
            var response = confirm('¿ Estas seguro de que desea borrar la rutina?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                    if(data != ''  && status == 'success'){
                        $("#" + routine_id).remove();
                        alert('Rutina borrada');
                    }else{
                        alert('no se pudo borrar la rutina');
                    }
                });
            }
        });
    });
</script>
@endsection