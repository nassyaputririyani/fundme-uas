@extends('admin.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add Projects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active">Add</li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (Auth::user()->role == 'admin')
                            <div class="form-group">
                                <label for="users_id">Owner</label>
                                <select name="users_id" id="users_id" class="form-control">
                                    <option value="">Choose Owner</option>
                                    @foreach ($users as $user)
                                        <option {{ old('users_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <p class="text-danger">
                                        {{ $errors->first('type') }}
                                    </p>
                                @enderror
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">
                                        {{ $errors->first('title') }}
                                    </p>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" class="form-control" id="short_description" rows="4" placeholder="Type short description here...">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <p class="text-danger">
                                        {{ $errors->first('short_description') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="12" placeholder="Type description here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger">
                                        {{ $errors->first('description') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="goals">Goals</label>
                                <select name="goals[]" id="goals" class="form-control" multiple>
                                    <option value="">Type a Goals and enter</option>
                                </select>
                                @error('goals')
                                    <p class="text-danger">
                                        {{ $errors->first('goals') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="goal_amount">Goals Amount</label>
                                <input type="number" class="form-control" name="goal_amount" id="goal_amount" placeholder="Enter goals amount (Rp)" value="{{ old('goal_amount') }}">
                                @error('goal_amount')
                                    <p class="text-danger">
                                        {{ $errors->first('goal_amount') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="deadline" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('deadline') }}"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('deadline')
                                    <p class="text-danger">
                                        {{ $errors->first('deadline') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="business_proposal">Business Proposal</label>
                                <div class="custom-file">
                                    <input type="file" name="business_proposal" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="custom-file-input" id="business_proposal" value="{{ old('business_proposal') }}">
                                    <label class="custom-file-label" for="business_proposal">Choose business proposal file</label>
                                </div>
                                @error('business_proposal')
                                    <p class="text-danger">
                                        {{ $errors->first('business_proposal') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/*"  class="custom-file-input" id="image" value="{{ old('image') }}">
                                    <label class="custom-file-label" for="image">Choose image</label>
                                </div>
                                @error('image')
                                    <p class="text-danger">
                                        {{ $errors->first('image') }}
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>
                            </div>
                        </form>
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
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $("#goals").select2({
            tags: true,
            theme: 'bootstrap4'
        });

        $("#users_id").select2({
            theme: 'bootstrap4'
        });

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'yyyy-M-D'
        });

        bsCustomFileInput.init();
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush