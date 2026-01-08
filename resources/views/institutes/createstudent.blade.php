@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Create Student</h2>
            </div>
        </div>

        {{-- Sessions msg  --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('institutestudent.store') }}">
                            @csrf
                            <input type="hidden" name="register_institute_id" value="{{ $currentInstituteId }}">
                            
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" 
                                    value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" 
                                    value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Age -->
                            <div class="mb-3">
                                <label for="age" class="form-label">{{ __('Age') }}</label>
                                <input id="age" class="form-control @error('age') is-invalid @enderror" type="number" name="age" 
                                    value="{{ old('age') }}" required>
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Class -->
                            <div class="mb-3">
                                <label for="class" class="form-label">{{ __('Class') }}</label>
                                <input id="class" class="form-control @error('class') is-invalid @enderror" type="text" name="class" 
                                    value="{{ old('class') }}" required>
                                @error('class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- School -->
                            <div class="mb-3">
                                <label for="school" class="form-label">{{ __('School') }}</label>
                                <input id="school" class="form-control @error('school') is-invalid @enderror" type="text" name="school" 
                                    value="{{ old('school') }}" required>
                                @error('school')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">{{ __('Location') }}</label>
                                <input id="location" class="form-control @error('location') is-invalid @enderror" type="text" name="location" 
                                    value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subjects/Stream -->
                            <div class="mb-3">
                                <label for="subjects_stream" class="form-label">{{ __('Subjects/Stream') }}</label>
                                <input id="subjects_stream" class="form-control @error('subjects_stream') is-invalid @enderror" type="text" 
                                    name="subjects_stream" value="{{ old('subjects_stream') }}" required>
                                @error('subjects_stream')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Career Aspiration -->
                            <div class="mb-3">
                                <label for="career_aspiration" class="form-label">{{ __('Career Aspiration') }}</label>
                                <input id="career_aspiration" class="form-control @error('career_aspiration') is-invalid @enderror" type="text" 
                                    name="career_aspiration" value="{{ old('career_aspiration') }}">
                                @error('career_aspiration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Parental Occupation -->
                            <div class="mb-3">
                                <label for="parental_occupation" class="form-label">{{ __('Parental Occupation') }}</label>
                                <input id="parental_occupation" class="form-control @error('parental_occupation') is-invalid @enderror" type="text" 
                                    name="parental_occupation" value="{{ old('parental_occupation') }}">
                                @error('parental_occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
