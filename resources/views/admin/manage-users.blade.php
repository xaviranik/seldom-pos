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
                    <a class="nav-link active" id="custom-content-below-all-users-tab" data-toggle="pill"
                        href="#custom-content-below-all-users" role="tab" aria-controls="custom-content-below-all-users"
                        aria-selected="true">
                        <h5>All Users</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-incoming-users-tab" data-toggle="pill"
                        href="#custom-content-below-incoming-users" role="tab" aria-controls="custom-content-below-incoming-users"
                        aria-selected="false">
                        <h5>Incoming Users</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-accepted-users-tab" data-toggle="pill"
                        href="#custom-content-below-activated-users" role="tab" aria-controls="custom-content-below-activated-users"
                        aria-selected="false">
                        <h5>Accepted Users</h5>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-all-users" role="tabpanel"
                    aria-labelledby="custom-content-below-all-users-tab">
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
                                        <th>#</th>
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
                                        <td>{{ $user->id }}</td>
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
                                                action="{{ route('admin.user.destroy', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.view_user', ['id' => $user->id]) }}"
                                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>

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
                                        <th>ID</th>
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
                <div class="tab-pane fade" id="custom-content-below-incoming-users" role="tabpanel"
                    aria-labelledby="custom-content-below-incoming-users-tab">
                    <div class="card mb-0">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5>Incoming Users</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="w-25">Shop</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($new_users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
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
                                                action="{{ route('admin.user.destroy', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.view_user', ['id' => $user->id]) }}"
                                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>

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
                                        <th>ID</th>
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
                <div class="tab-pane fade" id="custom-content-below-activated-users" role="tabpanel"
                    aria-labelledby="custom-content-below-activated-users-tab">
                    <div class="card mb-0">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h5>Incoming Users</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable3" class="table table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="w-25">Shop</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($activated_users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
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
                                                action="{{ route('admin.user.destroy', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.view_user', ['id' => $user->id]) }}"
                                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>

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
                                        <th>ID</th>
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
        $("#datatable3").DataTable();
    });

</script>
@endsection
