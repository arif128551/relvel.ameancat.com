@extends('admin.layout')
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Submit </h1>
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
                                <form action="{{route('individuals.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="{{old('firstname')}}">
                                        @error('firstname')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="{{old('lastname')}}">
                                        @error('lastname')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
{{--                                        <label for="role_applied">Role Applied For</label>--}}
{{--                                        <select name="role_applied" class="form-control" id="role_applied">--}}
{{--                                            <option value="">Select Role </option>--}}
{{--                                            <option value=""></option>--}}
{{--                                        </select>--}}
                                        @foreach(\App\Models\CareerRole::where('role_type', 0)->get() as $role)
                                        <div class="form-check form-check-inline">
                                            <input name="role_applied[]" class="form-check-input" type="checkbox" value="{{$role->id}}" id="role_applied{{$role->id}}">
                                            <label class="form-check-label" for="role_applied{{$role->id}}">
                                                {{$role->role_name}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @error('role_applied')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="experience_years">Years Of Experience</label>
                                        <input type="number" name="experience_years" class="form-control" id="experience_years" value="{{old('experience_years')}}">
                                        @error('experience_years')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="age">Current Age</label>
                                        <input type="number" name="age" class="form-control" id="age" value="{{old('age')}}">
                                        @error('age')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="employment_status">Currently Employed Full Time</label>
                                        <select name="employment_status" class="form-control" id="employment_status">
                                            <option value="">Select Status </option>
                                            <option value="1">Yes </option>
                                            <option value="0">No </option>
                                        </select>
                                        @error('employment_status')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="joining_period">Time Required to Join (Months)</label>
                                        <input type="number" name="joining_period" class="form-control" id="joining_period" value="{{old('joining_period')}}">
                                        @error('joining_period')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="remarks">Remarks</label>
                                        <textarea name="remarks" id="remarks" class="form-control h_100" cols="30" rows="10">{{old('remarks')}}</textarea>
                                        @error('remarks')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="resume_file_id">Resume file</label>
                                        <div>
                                            <input name="resume_file_id" type="file" id="resume_file_id">
                                        </div>
                                        @error('resume_file_id')
                                        <span class="text-small text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
