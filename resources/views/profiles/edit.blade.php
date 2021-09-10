@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Profile') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('profiles.update', [$user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title"
                                type="text"
                                class="form-control
                                @error('title') is-invalid @enderror"
                                name="title"
                                value="{{ old('title') ?? $user->profile->title }}" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

                        <div class="col-md-6">
                            <input id="bio"
                                type="text"
                                class="form-control
                                @error('bio') is-invalid @enderror"
                                name="bio"
                                value="{{ old('bio') ?? $user->profile->bio }}">

                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('WebSite') }}</label>

                        <div class="col-md-6">
                            <input id="website"
                                type="text"
                                class="form-control
                                @error('website') is-invalid @enderror"
                                name="website"
                                value="{{ old('website') ?? $user->profile->website }}">

                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                        <div class="col-md-6">
                            <input id="image"
                                type="file"
                                class="form-control-file @error('image') is-invalid @enderror"
                                name="image" value="{{ old('image') }}" >

                            @if($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
