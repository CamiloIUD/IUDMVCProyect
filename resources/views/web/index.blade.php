@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2>{{ $post['title'] }}</h2>
                        <p class="card-text">{{ $post['content'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('web.detail', ['id' => $post['id']]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                            <small class="text-muted">{{ $post['category'] }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <router-view></router-view>
  </div>
@endsection