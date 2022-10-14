<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\LineType;
use App\Models\Project;
use App\Models\UpsInstallation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BranchsExport implements FromView
{
    public function view(): View
    {
        $lists = $this->getData();
        return view('pages.branches.export', compact("lists"));
    }

    public function getData() {

        $lists = Branch::orderBy('id', 'asc')->paginate();
        if(request('keyword')){
            $lists = Branch::when(request('keyword'), function ($query) {
                $keyword = request('keyword');
                $query->Where('lan_ip', 'like', '%' . $keyword . '%')
                    ->orWhere('wan_ip', 'like', '%' . $keyword . '%')
                    ->orWhere('project_id', 'like', '%' . $keyword . '%')
                    ->orWhere('tunnel_ip', 'like', '%' . $keyword . '%')
                    ->orWhere('main_order_id', 'like', '%' . $keyword . '%')
                    ->orWhere('backup_order_id', 'like', '%' . $keyword . '%')
                    ->orWhere('area', 'like', '%' . $keyword . '%')
                    ->orWhere('sector', 'like', '%' . $keyword . '%')
                    ->orWhere('address', 'like', '%' . $keyword . '%')
                    ->orWhere('telephone', 'like', '%' . $keyword . '%');
            })->orderBy('id', 'asc')->paginate();

        }
        //filter by project_id
       if(request()->project_id){
            $lists = Branch::when(request('project_id'), function ($query) {
                $project_id = request('project_id');
                $query->whereIn('project_id',   $project_id );
            })->orderBy('id', 'asc')->paginate();


       }
        //filter by upsInstallations
        if(request('ups_installation_id')){
            $lists = Branch::when(request('ups_installation_id'), function ($query) {
                $ups_installation_id = request('ups_installation_id');
                $query->whereIn('ups_installation_id',  $ups_installation_id );
            })->orderBy('id', 'asc')->paginate();

        }
        //filter by line type id
       if(request('line_type_id')){
        $lists = Branch::when(request('line_type_id'), function ($query) {
            $line_type_id = request('line_type_id');
            $query->whereIn('line_type_id',   $line_type_id );
        })->orderBy('id', 'asc')->paginate(20);

       }
        //filter by  sector
       if(request('sector')){
        $lists = Branch::when(request('sector'), function ($query) {
            $sector = request('sector');
            $query->whereIn('sector',   $sector );
        })->orderBy('id', 'asc')->paginate(20);

       }
       if(request('area')){
            $lists = Branch::when(request('area'), function ($query) {
                $area = request('area');
                $query->whereIn('area',   $area);
            })->orderBy('id', 'asc')->paginate(20);
       }
        //filter by  time
        if(request('start_time') != null ){
            $lists = Branch::when(request('start_time'), function ($query) {
                $start_time = request('start_time');
                $query->where('start_time', '<=',  $start_time );
            })->orderBy('id', 'asc')->paginate(20);
           }
        //filter by  time
        if( request('end_time') != null){

            $lists = Branch::when(request('end_time'), function ($query) {
                $end_time = request('end_time');
                $query->where('end_time', '>=',  $end_time );
            })->orderBy('id', 'asc')->paginate(20);
           }
        //filter by  working days
       if(request('work_day')){
        $lists = Branch::when(request('work_day'), function ($query) {
            $work_day = request('work_day');
            $branch=[] ;
            foreach($work_day as $key=>$val){
              $branch[] =  $query->whereIn('working_days->'.$val,   $work_day )->get();
            }
            $query = $branch;

        })->orderBy('id', 'asc')->paginate(20);
       }

       return $lists;
    }
}
