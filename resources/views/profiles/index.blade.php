@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle" style="width:10rem" src="{{ $user->profile?->profileImage() }}" alt="freeCodeCamp">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }} <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button> </h1>
                <h5>
                    @can('update', $user->profile)
                        <a style="text-decoration: none" href="{{ route('posts.create') }}">New Post</a>
                    @endcan
                    @can('update', $user->profile)
                        |
                        <a style="text-decoration: none" href="{{ route('profiles.edit', [$user->id]) }}">Edit Profile</a>
                    @endcan
                </h5>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() ?? 0 }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->profile->following?->count() ?? 0 }}</strong> following</div>
            </div>
            <div class="pt-3"><strong>{{ $user->profile?->title }}</strong></div>
            <p>
                {{ $user->profile?->bio }}
            </p>
            <div>
                <a style="font-weight: bold;" href="{{ $user->profile?->website }}">{{ $user->profile?->website ?? '' }}</a>
            </div>
        </div>
    </div>

    <div class="row pt-5">
        @if (count($user->posts))
            @foreach ($user->posts as $post)
                <div class="col-4">
                    <a href="{{ route('posts.show', [$post->id]) }}">
                        <img src="/storage/{{ $post->image }}"class="w-100">
                    </a>
                </div>
            @endforeach
        @endif

    </div>
</div>
@endsection
