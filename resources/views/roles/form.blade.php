@extends('layouts.layout')

@section('title', isset($result) ? 'Edit Role' : 'Create Role')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ isset($result) ? 'Edit Role' : 'Create Role' }}</span>
                </h1>
                <div class="page-header-subtitle">
                    Dynamic form component to make it easier for users to {{ isset($result) ? 'Edit' : 'Create' }} role data
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ isset($result) ? 'Edit $result->name Role' : 'Create new Role' }}
                        </div>

                        <div class="mr-4 ml-4 mt-4 mb-0">
                            @include('layouts.feedback')

                        </div>

                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="" method="POST">

                                        @csrf
                                        @method(isset($result) ? 'PUT' : 'POST')

                                        <div class="form-group">
                                            <label for="role">Role Name</label>
                                            <input class="form-control" id="role" name="name" type="text"
                                                value="{{ old('name', isset($result) ? $result->name : '') }}"
                                                placeholder="Name Role" />
                                        </div>


                                        {{-- need to learn --}}
                                        @php
                                            $permissions = [
                                                'news_access',
                                                'menu_access',
                                                'about_us_access',
                                                'about_us_gallery_access',
                                                'users_access',
                                                'slider_gallery_access',
                                                'gallery_access',
                                                'contact_access',
                                                'business_information_access',
                                            ];
                                        @endphp


                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input type="hidden" name="{{ $permission }}" value="0">
                                                        <input class="custom-control-input" id="perm_{{ $permission }}"
                                                            type="checkbox" name="{{ $permission }}" value="1"
                                                            {{ old($permission, isset($result) ? $result->$permission : false) ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="perm_{{ $permission }}">{{ ucwords(str_replace('_', ' ', $permission)) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-2">{{ isset($result) ? 'Update' : 'Create' }}</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            {{-- static navigation --}}
            {{-- <div class="col-lg-3">
                <div class="nav-sticky">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav flex-column" id="stickyNav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#default"> Form Controls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#solid">Solid Form Controls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#checkbox">Default Checkboxes &amp; Radio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#checkboxSolid">Solid Checkboxes &amp; Radio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@endpush
