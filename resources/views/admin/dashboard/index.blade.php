@extends('admin.layouts.layout')

@section('title', 'Dashboard')

@section('content')
    {{-- page header --}}
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
        <div class="container-fluid">
            <div class="page-header-content">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                    <span>Dashboard</span>
                </h1>
                <div class="page-header-subtitle">Shows our data overview and content summary</div>
            </div>
        </div>
    </div>

    {{-- main content --}}
    <div class="container-fluid mt-n10">

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Area Chart Example</div>
                    <div class="card-body">
                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Bar Chart Example</div>
                    <div class="card-body">
                        <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            @if (Auth::user()->role->name === 'Super Admin')
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h2 class="mb-0 text-white">Total Roles</h2>
                            <span class="h3 mb-0 text-white font-weight-bolder">
                                {{ $roles }}
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('roles.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif

            @if (user_can('news_access'))
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h2 class="mb-0 text-white">Total News</h2>
                            <span class="h3 mb-0 text-white font-weight-bolder">
                                {{ $news }}
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('news.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif

            @if (user_can('galleries_access'))
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h2 class="mb-0 text-white">Total Galleries</h2>
                            <span class="h3 mb-0 text-white font-weight-bolder">
                                {{ $galleries }}
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('galleries.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif

            @if (user_can('users_access'))
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h2 class="mb-0 text-white">Total Users</h2>
                            <span class="h3 mb-0 text-white font-weight-bolder">
                                {{ $users }}
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('users.index') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="card mb-4">
            <div class="card-header">

                @if (Auth::user()->role->name == 'Super Admin' || user_can('contacts_access'))
                    Contact Mails
                @else
                    You do not have permission to view more content.
                @endif
            </div>
            <div class="card-body">

                @if (Auth::user()->role->name == 'Super Admin' || user_can('contacts_access'))

                    <div class="datatable table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($contactMails as $mail)
                                    <tr>
                                        <td>{{ $mail->name }}</td>
                                        <td>{{ $mail->subject }}</td>
                                        <td>{{ $mail->email }}</td>
                                        <td>{{ $mail->message }}</td>
                                        <td>
                                            <a href="{{ route('contacts.show', $mail->id) }}">
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"
                                                    title="Edit"><i data-feather="mail"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No contacts mail found.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                @else 
                    <div class="alert alert-warning" role="alert">
                        See ya!
                    </div>
                @endif

            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
@endsection
