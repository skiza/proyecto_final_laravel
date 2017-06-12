@extends('www.layouts.default')

@section('title','Calendar Edit')

@section('main')
<div class="container">
    <div class="row">
        <div class="row bg_white box_shadow margin-bottom-80">
            <div class="col-12">        
                <table class="table table-hover">
                    <thead class="labelead-inverse">
                       <tr>
                            <th>name</th>
                            <th>category</th>
                            <th>workouts</th>
                            <th>add/remove</th>
                       </tr>
                    </thead>
                    <tbody>

                    @foreach($routines as $routine)
                        <tr> 
                            <td> <a href="{{ nt_route('routine_detail-'.user_lang(),['routine_id' => $routine->id]) }}">{{ $routine -> name }}</a></td>
                            <td>
                                @foreach ( $routine -> categories as $category )
                                    <button class="btn bg_cat_{{ $category->id }}" data-toggle="collapse">
                                        {{ $category->name[user_lang()] }}
                                    </button>
                                @endforeach
                            </td>
                            <td class="text-center">{{ count($routine->workout) }}</td>
                            @if($routines_by_day->contains('id', $routine->id))
                                <td class="text-center">
                                    <a class="btn_edit_day" data-id="{{ $routine -> id }}" data-url="{{ nt_route('calendar_edit_post-'.user_lang(), ['id_day' => $route_parameters, 'id_routine' => $routine -> id]) }}"><i class="text-danger cursor-hand material-icons icon-{{ $routine -> id }}">remove_circle</i></a>
                                </td>
                            @else
                                <td class="text-center">
                                    <a class="btn_edit_day" data-id="{{ $routine -> id }}" data-url="{{ nt_route('calendar_edit_post-'.user_lang(), ['id_day' => $route_parameters, 'id_routine' => $routine -> id]) }}"><i class="text-success cursor-hand material-icons icon-{{ $routine -> id }}">add_circle</i></a>
                                </td>
                            @endif
                         </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){

        $('.btn_edit_day').on('click', function(){
            
            var routine_id = $(this).attr('data-id');
               
           jQuery.get($(this).attr('data-url'), function(data, status){
               
                if(data != '' && status == 'success'){
                        $('.icon-'+routine_id).toggleClass('text-danger');
                        $('.icon-'+routine_id).toggleClass('text-success');
                        
                        if($('.icon-'+routine_id).text() == 'add_circle'){
                            $('.icon-'+routine_id).text('remove_circle');
                        }else{
                            $('.icon-'+routine_id).text('add_circle');
                        }
                        
                }else{
                    alert('The routine could not be removed.');
                }
            });
            
        });
        
    });
</script>
@endsection
