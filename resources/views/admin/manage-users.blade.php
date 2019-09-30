@extends('admin.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">

    <div class="card card-primary card-outline">
        <div class="card-body p-0">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                        href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                        aria-selected="true">
                        <h5>All Users</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                        href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                        aria-selected="false">
                        <h5>Incoming Users</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                        href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                        aria-selected="false">
                        <h5>Accepted Users</h5>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                    aria-labelledby="custom-content-below-home-tab">
                    <div class="card mb-0">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5>Manage All Users</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="w-25">Shop</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->shop->name }}</td>
                                        <td>{{ $user->shop->phone }}</td>
                                        <td>
                                            @if ($user->activation)
                                                <span class="badge badge-success">Activated</span>
                                            @else
                                                <span class="badge badge-danger">Deactivated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form class="form-inline"
                                                action="#"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a href="#"
                                                        class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a>
                                                    <a href="#"
                                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>

                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Shop</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                    aria-labelledby="custom-content-below-profile-tab">
                    <div class="card mb-0">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5>Manage All Categories</h5>
                                <a href="#" class="btn btn-primary">Add Category</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-75">Title</th>
                                        <th class="w-25">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Grocery</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Dry Fruits</td>
                                        <td>X</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->
@endsection

@section('datatable')
<script>
    $(function () {
        $("#datatable").DataTable();
        $("#datatable2").DataTable();
    });

</script>
@endsection
