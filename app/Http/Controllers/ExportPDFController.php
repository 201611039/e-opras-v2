<?php

namespace App\Http\Controllers;

use App\Models\Opras;
use Barryvdh\DomPDF\Facade as PDF;


class ExportPDFController extends Controller
{
    public function oprasForm(Opras $opras)
    {
        if (($opras->personalInformation->status) && ($opras->user->profile->status)) {
            $pdf = PDF::loadView('pages.export.print-opras-form', [
                'opras' => $opras
            ]);

            $pdf->setOptions(['dpi' => 250, 'defaultFont' => 'sans-serif', 'isPhpEnabled' => true, 'isHtml5ParserEnabled' => true]);
            $pdf->setPaper('a4','potrait');

            // Output the generated PDF to Browser
            return $pdf->stream();
        }

        else {
            if ($opras->user->id !== auth()->id()) {
                toastr('Some data in Personal Information are missing contact a responsible person', 'error');
                return back();
            }
            else {
                toastr('Some data in Personal Information are missing fill them first', 'error');
                return redirect()->route('profile.show', $opras->user->slug);
            }
        }


    }
}
