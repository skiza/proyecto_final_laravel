@extends('www.layouts.default')

@section('title','Admins List')

@section('main')

<div class="container-fluid main__title">
    <h1>Admins List</h1>
</div>

<div class="container-fluid col-6">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr class="row">
                <th class="col-6">name</th>
                <th class="col-6">email</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach( $admins as $admin)
            <tr class="row">
                <td class="col-6">
                    <a href="{{ route('adminsListOne', ['id' => $admin->id]) }}">{{ $admin -> alias }}</a>
                </td>
                <td class="col-6">
                    <a href="mailto:{{ $admin -> email }}">{{ $admin -> email }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('createAdmin') }}" class="btn btn-primary fit_btn-primary pull-right">New Admin</a>
</div>
@endsection
