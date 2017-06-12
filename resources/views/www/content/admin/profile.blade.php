@extends('www.layouts.default')

@section('title','Admin Profile')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>My Profile</h1>
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
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2">
            <table class="table table-sdiviped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $admin -> alias }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <a href="mailto:{{ $admin -> email }}">{{ $admin -> email }}</a>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>{{ date('d/m/Y', strtotime($admin->age)) }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $admin -> gender == 'F' ? 'Female' : 'Male' }}</td>
                </tr>
            </table>
            <a href="{{ route('adminProfileEdit') }}" class="btn btn-primary">Edit Profile</a>
            <a href="{{ route('adminCredentialsEdit') }}" class="btn btn-primary">Edit Credentials</a>
        </div>
    </div>
</div>
@endsection

