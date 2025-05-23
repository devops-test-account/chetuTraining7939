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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h3 class="card-title">Tasks Information</h3>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('tasks.create')}}" class="btn btn-primary">Create Task</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Assigned To</th>
                                        <th>Assigned By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if(isset($data) && !empty($data))
                                <tbody>
                                    @foreach($data as $task)
                                    <tr>
                                        <td>{{$task['name']}}</td>
                                        <td>{{$task['description']}}</td>
                                        <td>{{$users[$task['assigned_to']][0]['name']}}</td>
                                        <td>{{$users[$task['assigned_by']][0]['name']}}</td>
                                        <td>
                                            <a href="{{route('tasks.getById',$task['id'])}}" class="btn btn-info"><i class="fas fa-pencil-to-square"></i></a>
                                            <form action="{{route('tasks.destroy' , $task['id'])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> <i class="fas fa-bin"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Assigned To</th>
                                        <th>Assigned By</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/vendor/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendor/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush