@extends('admin.layout')
@section('main')
    <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Application Review</h1>
                </div>
                <div class="section-body">
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
