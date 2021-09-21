<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $opras = $user->oprases->last();

        if (isset($opras->personalInformation)) {
            $personalInformation = $opras->personalInformation;
        }
        elseif(isset($opras)) {
            $personalInformation = $opras->previous()->personalInformation;
        }
        else {
            $personalInformation = [];
        }

        return view('pages.profile', [
            'profile' => $user->profile,
            'user' => $user,
            'personalInformation' => $personalInformation
        ]);
    }

    /*
    *Format date.
    * @param \date string
    * @return \date
    */
    public function dateFormat($value = null)
    {
        if ($value) {
            return \Carbon\Carbon::createFromFormat('d/m/Y',$value);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_appointment' => ['nullable', 'string'],
            'date_of_birth' => ['nullable', 'string'],
            'bio' => ['nullable', 'string', 'max:5000'],
            'gender_id' => ['nullable', 'integer', 'max:5000'],
        ]);

        $profile = $user->profile;

        $user->update([
            'gender_id' => $request->gender_id,
        ]);

        $profile->update([
            'first_appointment' => $this->dateFormat($request->first_appointment),
            'bio' => $request->bio,
            'date_of_birth' => $this->dateFormat($request->date_of_birth),
        ]);

        if($this->fieldsNotEmpty($profile)) {
            $profile->status = 1;
            $profile->update();
        } else {
            $profile->status = 0;
            $profile->update();
        }

        toastr('Profile updated successfully', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'mimes:jpg,jpeg', 'max:5000']
        ]);

        $user = User::find(auth()->id());

        if ($request->has('photo')) {
            $ext = $request->photo->getClientOriginalExtension();
            $name = $user->email.'.'.$ext;

            $path = $request->photo->storeAs('public/profiles', $name);

            $user->update([
                'image_path' => str_replace('public', 'storage', $path)
            ]);

            toastr('Image uploaded successfully', 'success');
        }
        else {
            toastr('Image not uploaded', 'error');
        }

        return back();
    }

    public function fieldsNotEmpty($data)
    {
        if (isset($data->user->gender_id) && isset($data->first_appointment) && isset($data->date_of_birth)) {
            return true;
        } else {
            return false;
        }
    }

    public function removeImage(User $user)
    {
        $path = str_replace('storage', 'public', $user->image_path);

        Storage::delete(storage_path('app/'.$path));

        $user->update([
            'image_path' => null
        ]);

        toastr('Image removed successfully');
        return back();
    }
}
