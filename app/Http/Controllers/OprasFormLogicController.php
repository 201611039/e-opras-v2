<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Opras;
use Illuminate\Http\Request;

class OprasFormLogicController extends Controller
{
    public function index()
    {
        $this->authorize('opras-view');

        return view('pages.form.index', [
            'opras' => request()->user()->myOpras()
        ]);
    }

    public function createForm()
    {
        $this->authorize('opras-create');

        if (request()->user()->myOpras()) {
            toastr()->error('Opras form already created');
        } else {
            request()->user()->oprases()->updateOrCreate([
                'year_id' => Year::active()->id,
                'slug' => request()->user()->username.'-'.Year::active()->created_at->format('Y')
            ]);
            toastr('Opras form created successfully');
        }

        return redirect()->route('opras.index');

    }

    public function submitForm(Opras $opras)
    {
        $this->authorize('opras-submit');

        $opras->status = 1;
        $opras->update();

        toastr()->success('You have submited your form successfully', 'Completed');
        return back();
    }
}
