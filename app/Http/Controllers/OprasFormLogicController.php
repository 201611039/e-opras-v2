<?php

namespace App\Http\Controllers;

use App\Models\Year;
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

        request()->user()->oprases()->updateOrCreate([
            'year_id' => Year::active()->id,
            'slug' => request()->user()->username.'-'.Year::active()->created_at->format('Y')
        ]);

        toastr('Opras form created successfully');
        return redirect()->route('opras.index');
    }
}
