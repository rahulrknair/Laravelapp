@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs') }}
                    <a class="navbar-brand" href="{{ url('/addblog') }}" style="float:right">
                    {{ __('Add New') }}
                    </a>
                </div>

                <div class="panel panel-default">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="card-body">
                    <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Description</td>
                        <td>Blog</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->author}}</td>
                        <td>{{$blog->description}}</td>
                        <td>{{$blog->blog}}</td>
                        <td>@if($blog->status == 1)
                            Active
                            @else
                            InActive
                            @endif
                        </td>
                        <td>
                            @if($blog->status == 1)
                            <a class="navbar-brand" href="{{ url('/updateblogstatus/'.$blog->id.'/'.$blog->status) }}">Disable</a>
                            @else
                            <a class="navbar-brand" href="{{ url('/updateblogstatus/'.$blog->id.'/'.$blog->status) }}">Enable</a>
                            @endif
                    </tr>
                    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
