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
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('email')}}" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{old('password')}}" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{old('password_confirmation')}}" class="form-control" name="password_confirmation" placeholder="Password confirmation">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('surname')}}" class="form-control" name="surname" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('patronymic')}}" class="form-control" name="patronymic" placeholder="Patronymic">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{old('age')}}" class="form-control" name="age" placeholder="Age">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('address')}}" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="cutom-select form-control" id="exampleSelectBorder">
                            <option disabled selected>Gender</option>
                            <option {{ old('gender') == 1 ? ' selected' : '' }} value="1">Male</option>
                            <option {{ old('gender') == 2 ? ' selected' : '' }} value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
