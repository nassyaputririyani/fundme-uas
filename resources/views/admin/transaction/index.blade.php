@extends('admin.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Transactions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Transactions</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Transaction list</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Transaction ID</th>
                                <th>Project Title</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->project->title }}</td>
                                <td>{{ toCurrency('Rp', $transaction->amount) }}</td>
                                <td>
                                    @switch($transaction->status)
                                        @case('pending')
                                            <div class="badge badge-warning text-light">
                                                Pending
                                            </div>
                                            @break
                                        @case('paid')
                                            <div class="badge badge-success text-light">
                                                Paid
                                            </div>
                                            @break
                                        @case('cancelled')
                                            <div class="badge badge-danger text-light">
                                                Cancelled
                                            </div>
                                            @break
                                        @default
                                            <div class="badge badge-danger text-light">
                                                Failed
                                            </div>
                                    @endswitch
                                </td>
                                <td>
                                    {{-- <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" class="d-flex">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('admin.projects.detail', $project->id) }}" class="btn btn-info btm-sm mr-2">
                                            Detail
                                        </a>

                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btm-sm mr-2">
                                            Edit
                                        </a>

                                        <button type="submit" class="btn btn-danger btm-sm">
                                            Delete
                                        </button>
                                        
                                    </form> --}}
                                    @switch($transaction->status)
                                        @case('pending')
                                                @if (Auth::user()->role == 'admin')
                                                    <form class="hidden" action="{{ route('admin.transactions.update-status', $transaction->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <input type="hidden" name="status" value="paid">

                                                        <button class="btn btn-sm btn-success" type="submit">
                                                            Accept Payment
                                                        </button>
                                                    </form>
                                                @else
                                                    <form class="hidden d-flex" action="{{ route('admin.transactions.update-status', $transaction->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <input type="hidden" name="status" value="cancelled">

                                                        <a href="{{ $transaction->payment_url }}" class="btn btn-primary btn-sm mr-2" target="_blank">
                                                            Pay the bill
                                                        </a>

                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                @endif
                                            @break
                                        @case('paid')
                                            @break
                                        @case('cancelled')
                                            @break
                                        @default
                                    @endswitch
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Transaction ID</th>
                                <th>Project Title</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content -->
</div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush