@extends('admin.layouts.layout')

@section('title', 'Roles')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="user"></i></div>
                    <span>User Profile</span>
                </h1>
                <div class="page-header-subtitle">{{ $user->name }} Profile
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <p class="mb-0">Users Datatables</p>
                <a href="{{ route('user.edit.profile') }}" class="d-block">
                    <button class="btn btn-primary ml-auto">Edit</button>
                </a>
            </div>

            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('admin.layouts.feedback')
            </div>

            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-profile ">
                        <img class="avatar-img img-fluid"
                            src="https://i.pinimg.com/736x/f5/36/6f/f5366fbdf85e3616bf923f8e9a1db451.jpg">
                    </div>
                    <div class="ml-4">
                        <h2 class="mb-0"> {{ $user->name }}</h2>
                        <p class="text-muted mb-0">Email: {{ $user->email }}</p>
                        <p class="text-muted mb-0">Role: {{ $user->role->name }}</p>
                        <p class="text-muted mb-0">Created At: {{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/asset/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@endpush
