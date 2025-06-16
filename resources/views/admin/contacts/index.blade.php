@extends('admin.layouts.layout')

@section('title', 'Contacts')

@section('content')
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="users"></i></div>
                    <span>Contacts</span>
                </h1>
                <div class="page-header-subtitle">
                    Manage your contact messages from this page.
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <p class="mb-0">Contacts Datatables</p>
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
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <a href="{{ route('contacts.show', $contact->id) }}">
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                title="Edit"><i data-feather="mail"></i></button>
                                        </a>
                                        {{-- <button class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete" data-toggle="modal" data-target="#deleteContact{{ $contact->id }}"><i data-feather="trash-2"></i></button> --}}
                                    </td>
                                </tr>


                                <div class="modal fade" id="deleteContact{{ $contact->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteContactTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteContactTitle">Delete
                                                    {{ $contact->name }} Contact Mail</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are you sure for deleting this Contact Mail?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Close</button>

                                                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary" type="submit">I'm Sure</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No contacts mail found.</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card card-icon mb-4">
            <div class="row no-gutters">
                <div class="col-auto card-icon-aside bg-primary"><i class="mr-1 text-white-50"
                        data-feather="alert-triangle"></i></div>
                <div class="col">
                    <div class="card-body py-5">
                        <h5 class="card-title">Third-Party Documentation Available</h5>
                        <p class="card-text">DataTables is a third party plugin that is used to generate the demo table
                            above. For more information about how to use DataTables with your project, please visit the
                            official DataTables documentation.</p>
                        <a class="btn btn-primary btn-sm" href="https://datatables.net/" target="_blank"><i class="mr-1"
                                data-feather="external-link"></i>Visit DataTables Docs</a>
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
