@extends('admin.layout')
@section('main')
    <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Application Review</h1>
                </div>
                <div class="section-body">

                        <form action="{{route('application.review')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Role Applied For</h5>
                                        </div>
                                        <div class="card-body">
                                            @foreach($roles as $role)
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" {{ in_array($role->id, (array) request('role_applied')) ? 'checked' : '' }}  name="role_applied[]" type="checkbox" value="{{$role->id}}" id="role_applied{{$role->id}}">
                                                    <label class="form-check-label" for="role_applied{{$role->id}}">
                                                        {{$role->role_name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Years Of Experience</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="experience_years_from">From</label>
                                                        <input type="text" name="experience_years_from" class="form-control" id="experience_years_from" value="{{request('experience_years_from')}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="experience_years_to">To</label>
                                                        <input type="text" name="experience_years_to" class="form-control" id="experience_years_to" value="{{request('experience_years_to')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Age</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="age_from">From</label>
                                                <input name="age_from" type="text" class="form-control" id="age_from" value="{{request('age_from')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="age_to">To</label>
                                                <input name="age_to" type="text" class="form-control" id="age_to" value="{{request('age_to')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Currently Employed Full Time</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="employment_status" {{request()->get('employment_status') == 1 ? 'checked' : ''}} id="employment_status1" value="1">
                                                    <label class="form-check-label" for="employment_status1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="employment_status" {{request('employment_status') == '0' ? 'checked' : ''}} id="employment_status2" value="0">
                                                    <label class="form-check-label" for="employment_status2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Time Required to Join</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_to_required_join_from">From (In Months)</label>
                                                        <input type="text" name="time_to_required_join_from" class="form-control" value="{{request('time_to_required_join_from')}}" id="time_to_required_join_from">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_to_required_join_to">To (In Months)</label>
                                                        <input type="text" name="time_to_required_join_to" class="form-control" value="{{request('time_to_required_join_to')}}" id="time_to_required_join_to">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="mb-0">Date Of Application</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="date_of_applications_from">From</label>
                                                        <input type="text" name="date_of_applications_from" class="form-control datepicker" value="{{request('date_of_applications_from')}}" id="date_of_applications_from">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="date_of_applications_to">To</label>
                                                        <input type="text" name="date_of_applications_to" class="form-control datepicker" value="{{request('date_of_applications_to')}}" id="date_of_applications_to">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <button style="font-size: 24px; padding: 14px 40px" type="submit" class="btn btn-primary btn-lg text-uppercase">Filter</button>
                                </div>
                            </div>
                        </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Role Sought</th>
                                                <th>Experience Years</th>
                                                <th>Age</th>
                                                <th>Application Date</th>
                                                <th>Employed</th>
                                                <th>Time To Join Months</th>
                                                <th>Remarks</th>
                                                <th>Reviewer Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($applications as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->firstname}} {{$row->lastname}}
                                                    <div class="mt-2">
                                                        <a href="{{asset('admin/resume_files')}}/{{$row->resume_file_id}}" download><i style="font-size: 25px" class="fas fa-link"></i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $roles_array = explode(",",$row->role_applied);
                                                    @endphp
                                                    @foreach(\App\Models\CareerRole::whereIn('id',$roles_array)->get() as $role)
                                                        @if($loop->last)
                                                            {{$role->role_name}}
                                                        @else
                                                            {{$role->role_name.", "}}
                                                        @endif

                                                    @endforeach
                                                </td>
                                                <td>{{$row->experience_years}}</td>
                                                <td>{{$row->age}}</td>
                                                <td>{{$row->application_date}}</td>
                                                <td>{{$row->employment_status == 1?'Yes':'No'}}</td>
                                                <td>{{$row->joining_period}}</td>
                                                <td>{{$row->remarks}}</td>
                                                <td>{{$row->reviewer_remarks}}</td>
                                                <td class="pt_10 pb_10">
                                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#add_remark{{$row->id}}">Add Remarks</button>
                                                    <a href="{{route('application.dispose', $row->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Dispose</a>
                                                </td>
                                                <div class="modal fade" id="add_remark{{$row->id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Add Remark</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('application.remarks.store', $row->id)}}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="remarks">Remarks</label>
                                                                        <textarea name="remarks" id="remarks" class="form-control h_100" cols="30" rows="10"></textarea>
                                                                        @error('remarks')
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
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
@section('footer_scripts_for_pages')

@endsection
