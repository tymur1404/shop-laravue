@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary">Update</a>
                            </div>
                            <form action="{{ route('user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit"  class="btn btn-danger" value="Delete">
                            </form>
                        </div>

                        <div class="card-body col-4 table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td><b>ID:</b></td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td><b>Name:</b></td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Surname:</b></td>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Patronymic:</b></td>
                                    <td>{{ $user->patronymic }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email:</b></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Age:</b></td>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr>
                                    <td><b>Gender:</b></td>
                                    <td>{{ $user->genderTitle }}</td>
                                </tr>
                                <tr>
                                    <td><b>Address:</b></td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
