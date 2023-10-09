@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                @if (Session::has('success'))
                    <script>
                        alert('{{ Session::get('success') }}');
                    </script>
                @endif


                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', ['id' => Auth::user()->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control @error('email') is-invalid @enderror" name="mobile" value="{{ Auth::user()->mobile }}" required autocomplete="mobile">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                        <div class="col-md-6">
                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ Auth::user()->date_of_birth }}" required autocomplete="dob">

                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('email') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" required autocomplete="address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <button type="button" class="btn btn-primary" onclick="location.href='/'">
                                    Cancel
                                </button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
