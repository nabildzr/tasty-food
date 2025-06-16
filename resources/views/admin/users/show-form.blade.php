@extends('admin.layouts.layout')

@section('title',  'Edit User' )

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon">
                        <i data-feather="edit-3"></i>
                    </div>
                    <span>{{ 'Edit User' }}</span>
                </h1>
                <div class="page-header-subtitle">
                    Use this dynamic form to easily edit user data
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
                            {{ "Edit $user->name User" }}
                        </div>

                        <div class="mr-4 ml-4 mt-4 mb-0">
                            @include('admin.layouts.feedback')
                        </div>

                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="" method="POST">

                                        @csrf
                                        @method('PUT' )

                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input class="form-control" id="name" name="name" type="text"
                                                value="{{ old('name', isset($user) ? $user->name : '') }}"
                                                placeholder="User Name" />
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="text"
                                                value="{{ old('email', isset($user) ? $user->email : '') }}"
                                                placeholder="Email" />
                                        </div>



                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role_id" class="form-control " id="role">
                                                <option class="bg-gray-200" disabled>Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ old('role_id', isset($user) ? $user->role_id : '') == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="password">Change Password</label>
                                            <input class="form-control" id="password" name="password" type="text"
                                                value="{{ old('password') }}"
                                                placeholder="Enter your password min: 6 (skip if not changing)" />
                                        </div>


                                        <button type="submit"
                                            class="btn btn-primary px-5 mt-2">{{ 'Update'  }}</button>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js"
        crossorigin="anonymous"></script>
@endpush
