@extends('layouts.app')

@section('title','Admin: Posts')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="table-primary text-secondary small">
            <tr>
                <th></th>
                <th></th>
                <th>CATEGORY</th>
                <th>OWNER</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($all_posts as $post)
                <tr>
                    <td class="text-end">{{$post->id}}</td>
                    <td>
                        <a href="{{route('post.show',$post->id)}}">
                            <img src="{{$post->image}}" alt="post id {{$post->id}}" class="d-block mx-auto image-lg">
                        </a>
                    </td>
                    <td>
                        @foreach($post->categoryPost as $category_post)
                            <span class="badge bg-secondary bg-opacity-50">{{$category_post->category->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('profile.show',$post->user->id)}}" class="text-dark text-decoration-none">
                            {{$post->user->name}}
                        </a>
                    </td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <i class="fa-solid fa-circle text-primary"></i>&nbsp; Visible
                    </td>
                    <td>
                        <div class="fropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-{{$post->id}}">
                                    <i class="fa-solid fa-eye-slash"></i> Hide Post {{$post->id}}
                                </button>
                            </div>
                        </div>
                        {{-- Include modal here --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="lead text-muted text-center">
                        No Posts Found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection