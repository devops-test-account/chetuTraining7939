@extends('user.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tasks</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create <small>Task</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('tasks.store')}}" method="post" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <textarea name="description" class="form-control" id="exampleInputDescription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="assigned_to">Assigned To</label>
                                    <select name="assigned_to" id="assigned_to" class="form-control select2bs4">
                                        @if(isset($users) &&!empty($users))
                                        @foreach($users as $userID => $user)

                                        <option value="{{$userID}}">{{$user[0]['name']}}</option>

                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/vendor/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push('scripts')
<!-- jquery-validation -->
<script src="{{asset('assets/vendor/plugins/jquery-validation/jquery.validate.min.js')}}">
</script>
<script src="{{asset('assets/vendor/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/vendor/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                $('#quickForm').submit();
            }
        });
        $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                description: {
                    required: true,
                },
                assigned_to: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter a name.",
                    minlength: "Task Name must be at least 4 characters long"
                },
                description: {
                    required: "Please enter a email address",
                },
                assigned_to: {
                    required: "Please assign to a user",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endpush