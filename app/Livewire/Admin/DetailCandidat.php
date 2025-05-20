<?php

namespace App\Livewire\Admin;

use App\Models\Candidat;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class DetailCandidat extends Component
{
      public $candidat;

    public function mount($id)
    {
        $this->candidat = Candidat::with(['formations', 'competences', 'langues', 'experiences'])->findOrFail($id);
    }
     public function exportPdf()
    {
        $pdf = Pdf::loadView('pdf.candidat_detail', ['candidat' => $this->candidat]);
        return response()->streamDownload(fn () => print($pdf->output()), 'cv-'.$this->candidat->nom.'.pdf');
    }
    public function render()
    {
        return view('livewire.admin.detail-candidat')->layout('layouts.admin');
    }
}
