<?php

namespace App\Http\Controllers;

use App\Models\CareerRole;
use App\Models\Individual;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndividualController extends Controller
{
    public function individual(){
        return view('admin.individual');
    }
    public function individuals_store(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'role_applied' => 'required',
            'experience_years' => 'required|integer|max:40',
            'age' => 'required|integer',
            'employment_status' => 'required|integer',
            'joining_period' => 'required|integer',
            'remarks' => 'required',
            'resume_file_id' => 'required|file|mimes:pdf,docx,doc|max:2048',
        ]);

        $roles = $request->get('role_applied');
        $roles_to_str = implode(',',$roles);


        $file = $request->file('resume_file_id');
        $extension = $file->getClientOriginalExtension();
        $fileName = hexdec(uniqid()).'.'.$extension;
        $file->move(public_path('admin/resume_files'),$fileName);



        Individual::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'role_applied' => $roles_to_str,
            'experience_years' => $request->input('experience_years'),
            'age' => $request->input('age'),
            'employment_status' => $request->input('employment_status'),
            'joining_period' => $request->input('joining_period'),
            'remarks' => $request->input('remarks'),
            'resume_file_id' => $fileName,
            'application_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect()->back()->with('success', 'Individual created successfully.');

    }
    public function application_review(Request $request){
        $roles = CareerRole::all();

        if ($request->isMethod('post')){

            $role_applied = $request->get('role_applied',[]);

//            $filteredUsers = Individual::where(function ($query) use ($role_applied) {
//                foreach ($role_applied as $roleId) {
//                    $query->orWhere('role_applied', 'like', '%'.$roleId.'%');
//                }
//            })->get();
//
//            return $filteredUsers;

            $experience_years_from = $request->get('experience_years_from');
            $experience_years_to = $request->get('experience_years_to');

            $age_from = $request->get('age_from');
            $age_to = $request->get('age_to');

            $employment_status = $request->get('employment_status');

            $time_to_required_join_from = $request->get('time_to_required_join_from');
            $time_to_required_join_to = $request->get('time_to_required_join_to');

            $date_of_applications_from = $request->get('date_of_applications_from');
            if ($date_of_applications_from){
                $date_of_applications_from_explode = explode('/',$date_of_applications_from);
                $date_of_applications_from_after_explode = $date_of_applications_from_explode[2].'-'.$date_of_applications_from_explode[1].'-'.$date_of_applications_from_explode[0];
                $date_of_applications_from = date('Y-m-d', strtotime($date_of_applications_from_after_explode));
            }


            $date_of_applications_to = $request->get('date_of_applications_to');
            if ($date_of_applications_to){
                $date_of_applications_to_explode = explode('/',$date_of_applications_to);
                $date_of_applications_to_after_explode = $date_of_applications_to_explode[2].'-'.$date_of_applications_to_explode[1].'-'.$date_of_applications_to_explode[0];
                $date_of_applications_to = date('Y-m-d', strtotime($date_of_applications_to_after_explode));
            }


            $applications = Individual::WhereBetween('experience_years', [$experience_years_from, $experience_years_to])
                ->orWhereBetween('age', [$age_from, $age_to])
                ->orWhere('employment_status', $employment_status)
                ->orWhereBetween('joining_period', [$time_to_required_join_from, $time_to_required_join_to])
                ->orWhereBetween('application_date', [$date_of_applications_from, $date_of_applications_to])
                ->orWhere(function ($query) use ($role_applied) {
                    foreach ($role_applied as $roleId) {
                        $query->orWhere('role_applied', 'like', '%'.$roleId.'%');
                    }
                })
                ->orderBy('id', 'DESC')->get();
        }else{
            $applications = Individual::where('dispose', 0)->orderBy('id', 'DESC')->get();
        }
        return view('admin.application_review', compact('applications', 'roles'));
    }

    public function application_remarks_store(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'required',
        ]);
        $application = Individual::find($id);
        $application->reviewer_remarks = $request->input('remarks');
        $application->save();
        return redirect()->back()->with('success', 'Application remarks updated successfully.');
    }

    public function application_dispose($id){
        $application = Individual::find($id);
        $application->update([
            'dispose' => 1,
        ]);
        return redirect()->back()->with('success', 'Application disposed successfully.');
    }


}
