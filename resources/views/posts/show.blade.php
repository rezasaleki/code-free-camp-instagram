@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="{{ $post->caption }}" class="rounded-circle w-100" style="max-width: 60px">
                    </div>
                    <div>
                        <h2 class="font-weight-bold">
                            <a style="text-decoration: none" href="{{ route('profiles.show', [$post->user->id]) }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </h2>
                    </div>
                    <div class="pl-3">
                        <a style="text-decoration: none" href="#"><span class="text-bold">Follow</span></a>
                    </div>
                </div>
                <hr>
                <p>
                    <a style="text-decoration: none" href="{{ route('profiles.show', [$post->user->id]) }}"> <span class="text-dark">{{ $post->user->username }}</span> </a>: {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
