<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\LineType;
use App\Models\Project;
use App\Models\UpsInstallation;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BranchsExport implements FromView, ShouldAutoSize, WithEvents
{
    use Exportable;
    private $branches;

    public function __construct($branches)
    {
        $this->branches = $branches;
    }
    

    /**
     * @return View
     */
    public function view() :View
    {
        
        $breadcrumb = [
            'title' =>  __("Branches lists"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        return view('pages.branches.index',
         [
            'lists' => $this->branches,
            'breadcrumb' => $breadcrumb,
            'projects'     => Project::all(),
            'upsInstallations' => UpsInstallation::all(),
            'lineTypes' => LineType::all(),
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
