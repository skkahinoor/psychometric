@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">{{ __('All Students') }}</h2>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('institutestudent.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add New Student
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                @if ($students->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Institution</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Class</th>
                                    <th>School</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $student->institute->name ?? 'N/A' }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->school }}</td>
                                        <td>
                                            <a href="{{ route('institutestudent.show', $student->id) }}"
                                                class="btn btn-sm btn-outline-primary">View Result</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {!! $students->links() !!}
                    </div>
                @else
                    <p class="text-muted">No student found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
