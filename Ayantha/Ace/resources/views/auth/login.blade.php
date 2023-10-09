@extends('layouts.app')

@section('content')
<div id="login" class="container-fluid mt-5 pt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mt-8 ">
            <div class="card ">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="branchOpt" class="col-md-4 col-form-label text-md-end">{{ __('Select Branch') }}</label>

<div class="col-md-6">
                        <select id="branchOpt" class="form-control @error('region') is-invalid @enderror" name="branchOpt" required>
					<option value="" disabled selected>Select Branch</option>
				</select>

                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

			<input id="branch" type="hidden" class="form-control @error('branch') is-invalid @enderror" name="branch" required placeholder="branch">
            </div>
            </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var branchOpt = document.getElementById('branchOpt');
    var branchInput = document.getElementById('branch');

    // Function to fetch branch data and populate the dropdown
    function loadBranches() {
        var branchUrl = '/branches'; 

        // Fetch branch data from the server
        fetch(branchUrl)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                // Clear existing options
                branchOpt.innerHTML = '<option value="" disabled selected>Select Branch</option>';

                // Add branch options dynamically
                data.forEach(function (branch) {
                    var option = document.createElement('option');
                    option.value = branch.id; 
                    option.textContent = branch.location;
                    branchOpt.appendChild(option);
                });
            })
            .catch(function (error) {
                console.error('Error loading branches:', error);
            });
    }

    // Add an event listener to the select element
    branchOpt.addEventListener('change', function () {
        // Get the selected option's value
        var selectedBranch = branchOpt.value;

        // Set the selected branch in the input field
        branchInput.value = selectedBranch;
    });

    // Load branches when the page is ready
    document.addEventListener('DOMContentLoaded', function () {
        loadBranches();
    });
</script>
@endsection
