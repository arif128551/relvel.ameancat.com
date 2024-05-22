@extends('admin.layout')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add career roles</h1>
                <div class="ml-auto">
                    <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}}</div>
                                @endif
                                <form action="{{route('career.roles.store')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="role_type">Role type</label>
                                        <select name="role_type" class="form-control" id="role_type">
                                            <option value="">Role Type</option>
                                            <option value="0">Applicant</option>
                                            <option value="1">Employee</option>
                                            <option value="2">User</option>
                                            <option value="3">Admin</option>
                                            <option value="4">SuperUser</option>
                                        </select>
                                        @error('role_type')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="role_name">Role Name</label>
                                        <input type="text" name="role_name" class="form-control" id="role_name">
                                        @error('role_name')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Career Roles</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
