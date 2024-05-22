<?php

namespace App\Http\Controllers;

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
    public function application_review(){
        $applications = Individual::where('dispose', 0)->orderBy('id', 'DESC')->get();
        return view('admin.application_review', compact('applications'));
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
