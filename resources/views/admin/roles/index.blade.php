@extends('admin.layouts.layout')

@section('title', 'Roles Management')

@section('content')
    <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
            <div class="container-fluid">
                <div class="page-header-content">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="filter"></i></div>
                        <span>Roles</span>
                    </h1>
                    <div class="page-header-subtitle">
                        Manage user roles and permissions effectively with our intuitive interface.
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-n10">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <p class="mb-0">Roles Datatables</p>
                    <a href="{{ route('roles.create') }}" class="d-block">
                        <button class="btn btn-primary ml-auto">Create new Role</button>
                    </a>
                </div>

                <div class="mr-4 ml-4 mt-4 mb-0">

                    @include('admin.layouts.feedback')
                </div>
                <div class="card-body">
                    <div class="datatable table-responsive" style="overflow-x: auto;">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"
                            style="min-width: 1200px;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>News Access</th>
                                    <th>Menu Access</th>
                                    <th>About Us Access</th>
                                    <th>Users Access</th>
                                    <th>Slider Gallery Access</th>
                                    <th>Gallery Access</th>
                                    <th>Contact Access</th>
                                    <th>Business Information Access</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>News Access</th>
                                    <th>Menu Access</th>
                                    <th>About Us Access</th>
                                    <th>Users Access</th>
                                    <th>Slider Gallery Access</th>
                                    <th>Gallery Access</th>
                                    <th>Contact Access</th>
                                    <th>Business Information Access</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <span class="badge {{ $role->news_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->news_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $role->menu_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->menu_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->about_us_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->about_us_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->users_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->users_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->slider_gallery_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->slider_gallery_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->gallery_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->gallery_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->contact_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->contact_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $role->business_information_access ? 'badge-success' : 'badge-danger' }}">
                                                {{ $role->business_information_access ? 'Allowed' : 'Not Allowed' }}
                                            </span>
                                        </td>


                                        <td>
                                            @if ($role->name !== 'Super Admin')
                                                <a href="{{ route('roles.edit', $role->id) }}">
                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                        title="Edit"><i data-feather="edit-2"></i></button>
                                                </a>


                                                <button class="btn btn-datatable btn-icon btn-transparent-dark"
                                                    title="Delete"><i data-feather="trash-2" data-toggle="modal"
                                                        data-target="#deleteRoleModal"></i></button>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteRoleModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteRoleModalTitle">Delete
                                                        {{ $role->name }} Role</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">Are you sure for deleting this Role?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Close</button>

                                                    <form action="{{ route('roles.delete', $role->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-primary" type="submit">I'm Sure</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

    </main>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
@endsection
