<?php

namespace App\Http\Controllers;

use App\Models\Opras;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $this->authorize('archive-view');
        $forms = Opras::where([['user_id', auth()->id()], ['status', 1]])->get();
        return view('pages.archive.index', ['forms' => $forms]);
    }

    public function show(Opras $opras)
    {
        $this->authorize('archive-show');

        return view('pages.archive.show', [
            'opras' => $opras
        ]);
    }
}
