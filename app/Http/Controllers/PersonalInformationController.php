<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        $this->authorize('personal-information-edit');

        $personalInformation->update([
            'directorate_id' => $request->directorate_id,
            'station_id' => $request->station_id,
            'supervisor_id' => $request->supervisor_id,
            'academic_qualification' => $request->academic_qualification,
            'post_id' => $request->post_id,
            'substantive_post' => $request->substantive_post,
            'first_appointment_present_post' => $this->dateFormat($request->first_appointment_present_post),
            'salary_scale' => $request->salary_scale,
            'period' => $request->period??$this->dateFormat($request->first_appointment_present_post)->diffInMonths(\Carbon\Carbon::now()),
            'term_of_service' => $request->term_of_service
        ]);

        if($this->fieldsNotEmpty($personalInformation)) {
            $personalInformation->status = 1;
            $personalInformation->update();
        } else {
            $personalInformation->status = 0;
            $personalInformation->update();
        }

        toastr('Information saved successfuly', 'success');
        return back();
    }


     // Complete section 1
     public function complete()
     {
        $this->authorize('personal-information-complete');

         $opras = request()->user()->myOpras();

         if($this->fieldsNotEmpty($opras->personalInformation)) {
            $opras->sectionOne()->update([
                'status' => 1
            ]);

            $opras->sections()->firstOrCreate([
                'section' => 'performance_agreement'
            ]);

             toastr('Section 1 compeleted successfully', 'success');
             return redirect()->route('performance-agreement.index');
         } else {
             toastr('All field must be filled', 'error');
             return back();
         }

     }


    // Check field
    public function fieldsNotEmpty($data)
    {
        if (isset($data->directorate_id) && isset($data->station_id) && isset($data->academic_qualification) && isset($data->post_id) && isset($data->first_appointment_present_post) && isset($data->salary_scale) && isset($data->period) && isset($data->term_of_service) && isset($data->supervisor_id)) {
            return true;
        } else {
            return false;
        }
    }
}
