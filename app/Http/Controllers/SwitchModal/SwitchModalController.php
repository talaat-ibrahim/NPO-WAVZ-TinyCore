<?php

namespace App\Http\Controllers\SwitchModal;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelSwith\CreateSwitchModalRequest;
use App\Http\Requests\ModelSwith\UpdateSwitchModalRequest;
use App\Models\SwitchModal;
use Illuminate\Http\Request;

class SwitchModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            'title' =>  __("Switch modals lists"),
            'items' =>  [
                [
                    'title' =>  __("Switch modals Lists"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        $lists = SwitchModal::orderBy('id', 'desc')->paginate();
        return view('pages.switch-modal.index', [
            'breadcrumb' => $breadcrumb,
            'lists'     => $lists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            'title' =>  __("Create New Switch Modal"),
            'items' =>  [
                [
                    'title' =>  __(" Switch Modal Lists"),
                    'url'   => route('switch-modal.index'),
                ],
                [
                    'title' =>  __("Create New  Switch Modal"),
                    'url'   =>  '#!',
                ],
            ],
        ];

        return view('pages.switch-modal.create', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSwitchModalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSwitchModalRequest $request)
    {
        SwitchModal::create($request->all());
        return redirect()->route('switch-modal.index')->with('success', __("This row has been created."));
    }

    /**
     * Display the specified resource.
     *
     * @param  SwitchModal $modal
     * @return \Illuminate\Http\Response
     */
    public function show(SwitchModal $modal)
    {
        $breadcrumb = [
            'title' =>  __("Show Modal"),
            'items' =>  [
                [
                    'title' =>  __(" Switch Modal Lists"),
                    'url'   => route('switch-modal.index'),
                ],
                [
                    'title' =>  __("Show Modal"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.routers.show', [
            'breadcrumb'    =>  $breadcrumb,
            'Router'         =>  $modal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SwitchModal $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(SwitchModal $SwitchModal)
    {
       
        $breadcrumb = [
            'title' =>  __("Edit Modal"),
            'items' =>  [
                [
                    'title' =>  __(" Switch Modal Lists"),
                    'url'   => route('switch-modal.index'),
                ],
                [
                    'title' =>  __("Edit Modal"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.switch-modal.edit', [
            'breadcrumb'    =>  $breadcrumb,
            'data'         =>  $SwitchModal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSwitchModalRequest  $request
     * @param  SwitchModal $modal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSwitchModalRequest $request, SwitchModal $SwitchModal)
    {
        $SwitchModal->update($request->all());
        return redirect()->route('switch-modal.index')->with('success', __("This row has been updated."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SwitchModal $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(SwitchModal $SwitchModal)
    {
        $SwitchModal->delete();
        return redirect()->route('switch-modal.index')->with('success', __("This row has been deleted."));
    }
}
