@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Members List') }}</div>

                <div class="card-body">
                    <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                    </tr>
                    @foreach($members as $member)
                    <tr>
                        <td>{{$member['id']}}</td>
                        <td>{{$member['name']}}</td>
                        <td>{{$member['email']}}</td>
                    </tr>
                    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
