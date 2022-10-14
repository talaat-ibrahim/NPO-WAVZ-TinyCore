@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('css')
{{--
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    --}}
    <link href="{{ url('/assets/css/datatable/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <style>
        .select2-selection--multiple {
            padding-top: 20px!important;
        }
    </style>
@endsection
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div
        style="margin-bottom: 14px; position: relative; display: flex; justify-content: space-between; align-items: center;">
        @if (auth()->user()->can('Branche_import-branches'))
            <form method="POST" enctype="multipart/form-data" action="{{ route('branches.import') }}"
                style="display: flex; justify-content: space-between; gap: 10px">
                @csrf
                <div style="height: 40px;">
                    <input required type="file" class="form-control" name="file" />
                </div>
                <button type="submit" class="btn btn-success">@lang('Import')</button>
                <a role="button" href="{{ route('branches.downloadTemplate') }}" class="btn btn-primary">@lang('Download Template File')</a>
            </form>
        @endif

        @if (auth()->user()->can('Branche_create-branches'))
            <a type="button" class="btn btn-primary float-start"
                href="{{ route('branches.create') }}">@lang('Create new branche')</a>
        @endif
    </div>
    @if (auth()->user()->can('Branche_search-filter-branches'))
        <div class="filter p-3 ">
                <div class="card">

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 pt-2">
                                <div class="form-floating">
                                    <input onkeyup="reloadData()" id="keyword" type="text" class="form-control" style="height: 58px;" name="keyword"
                                        value="{{ request('keyword') }}" placeholder="@lang('Search...') }}" />
                                    <label style="margin-top: -10px;">@lang('Search...')</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    @endif
    @if (auth()->user()->can('Branche_filter-branches'))
        <div class="filter p-2 ">
            <form method="GET" action="{{ route('branches.index') }}" __onsubmit="$('#exportInput').val('0')">
                <div class="card">
                    <div class="card-header">
                        <button type="button" id="filter" class="btn btn-default"> <i class="fa fa-filter"></i>
                            <b class="h4" >@lang('Filter')</b>
                        </button>
                    </div>
                    <div class="card-body " id="filter-body">
                        <div class="row">

                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <select id="project_id" multiple class="form-control select2" name="project_id"placeholder="@lang('Project')">
                                        @foreach ($projects as $project)
                                            <option
                                                {{ !empty(request('project_id')) ? (in_array($project->id, request('project_id')) ? 'selected' : '') : '' }}
                                                value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Project')</label>

                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <select id="ups_installation_id" multiple class="form-control select2"name="ups_installation_id"placeholder="@lang('UPS installation') ">
                                        @foreach ($upsInstallations as $ups)
                                            <option
                                                {{ !empty(request('ups_installation_id')) ? (in_array($ups->id, request('ups_installation_id')) ? 'selected' : '') : '' }}
                                                value="{{ $ups->id }}">{{ $ups->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Ups Installation')</label>

                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <select id="line_type_id" multiple class="form-control select2"
                                        name="line_type_id"placeholder="@lang('Line Type') " >
                                        @foreach ($lineTypes as $line)
                                            <option
                                                {{ !empty(request('line_type_id')) ? (in_array($line->id, request('line_type_id')) ? 'selected' : '') : '' }}
                                                value="{{ $line->id }}">{{ $line->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Line Type')</label>

                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <select id="sector" multiple class="form-control select2" name="sector" placeholder="@lang('Sector')"
                                        >
                                        @foreach ($sectors as $key => $sector)
                                            <option
                                                {{ !empty(request('sector')) ? (in_array($sector, request('sector')) ? 'selected' : '') : '' }}
                                                value="{{ $sector }}">{{ $sector }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Sector')</label>

                                </div>
                            </div>



                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <select id="area" multiple class="form-control select2" name="area" placeholder="@lang('Area')"
                                        >
                                        @foreach ($areas as $key => $area)
                                            <option
                                                {{ !empty(request('area')) ? (in_array($area, request('area')) ? 'selected' : '') : '' }}
                                                value="{{ $area }}">{{ $area }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Area')</label>
                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-floating">
                                    <style>
                                        .select2-selection__rendered {
                                            text-align: center !important
                                        }
                                    </style>
                                    <select multiple id="work_day" class="form-control select2" name="work_day"placeholder="@lang('Working Days') "
                                    >
                                        @foreach ($days as $key => $val)
                                            <option
                                            {{ !empty(request('work_day')) ? (in_array($key, request('work_day')) ? 'selected' : '') : '' }}
                                                value="{{ $key }}">{{ $val }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Working Days')</label>

                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input id="start_time" type="time" class="form-control" name="start_time"
                                                value="{{ request()->start_time }}">
                                            <label>@lang('Start Time')</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input id="end_time" type="time" class="form-control" name="end_time"
                                                value="{{ request()->end_time }}">
                                            <label>@lang('End Time')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" id="exportInput" name="export">
                        <button onclick="reloadData()" type="button"  class="btn btn-success">@lang('Search')</button>
                        <a href="{{ route('branches.index') }}"  class="btn bg-light btn-default">@lang('Clear')</a>
                        @if (auth()->user()->can('Branche_export-branches'))
                        <button type="submit" onclick="exportFile()" class="btn btn-primary">@lang('Export')</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    @endif
    @if ($lists->count() > 0)

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless" id="branchesTable">
                            <thead>
                                <tr>
                                    <th scope="col">@lang(' Name')</th>
                                    <th scope="col">@lang('Project')</th>
                                    <th scope="col">@lang('Sector')</th>
                                    <th scope="col">@lang('Area')</th>
                                    <th scope="col">@lang('Ups Installations')</th>
                                    <th scope="col">@lang('Line Type')</th>
                                    <th scope="col">@lang('Wan IP')</th>
                                    <th scope="col">@lang('Lan IP')</th>
                                    <th scope="col">@lang('Telephone')</th>
                                    <th scope="col">@lang('address')</th>
                                    <th scope="col">@lang('Main Order ID')</th>
                                    <th scope="col">@lang('Backup Order ID')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $lists->links('layouts.inc.paginator') }} --}}
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4">
                            <div class="maintenance-img">
                                <img src="{{ url('assets/images/123.svg') }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-5">@lang("Let's get started")</h4>
                    <p class="text-muted">@lang("Oops, We don't have data").</p>
                </div>
            </div>
        </div>


    @endif

@endsection
@push('scripts')
<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
{{--
<script type="text/javascript" src="{{ url('/') }}/assets/js/datatable/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/assets/js/datatable/buttons.bootstrap.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/js/datatable/buttons.html5.min.js"></script>
<script src="{{ asset('assets/js/datatable/jszip.min.js') }}"></script>
<script src="{{ url('/') }}/assets/js/datatable/buttons.print.js"></script>
<script src="{{ asset('assets/js/datatable/dataTables.buttons.min.js') }}"></script>
 --}}

    <script>
        $('#filter').on('click', function() {
            $('#filter-body').slideToggle('slow');
        });

        $('.select2').select2({});



        function exportFile() {
            $('#exportInput').val('1');
            setTimeout(() => {
                $('#exportInput').val('0');
            }, 1000);
        }

        function clearFilter() {
            $("#project_id").val('');
            $("#ups_installation_id").val('');
            $("#line_type_id").val('');
            $("#sector").val('');
            $("#area").val('');
            $("#work_day").val('');
            $("#start_time").val('');
            $("#end_time").val('');
            $("#keyword").val('');
            $(".select2").select2();
            var url = "{{ route('branches.getData') }}";
            BranchesDatatable.ajax.url(url).load();
        }


        function reloadData() {
            var url = "{{ route('branches.getData') }}";
            var data = {
                project_id: $("#project_id").val(),
                ups_installation_id: $("#ups_installation_id").val(),
                line_type_id: $("#line_type_id").val(),
                sector: $("#sector").val(),
                area: $("#area").val(),
                work_day: $("#work_day").val(),
                start_time: $("#start_time").val(),
                end_time: $("#end_time").val(),
                keyword: $("#keyword").val(),
            };
            console.log(data);
            //var url = "{{ route('branches.getData') }}?project_id=" + project_id+"&ups_installation_id="+ ups_installation_id+"&line_type_id="+line_type_id+"&sector="+sector+"&work_days="+work_days+"&start_time="+start_time+"&end_time="+end_time;
            BranchesDatatable.ajax.url(url + "?" + $.param(data)).load();
        }

        var BranchesDatatable = null;
        function setBranchesDataTable() {
            var url = "{{ route('branches.getData') }}";
            BranchesDatatable = $('#branchesTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    //"pageLength": 5,
                    "bFilter": false,
                    "lengthMenu": [[10, 25, 50, 100,200,300 , 500 , 1000 , 2000 , 5000 , 10000], [10, 25, 50, 100,200,300 , 500 , 1000 , 2000 , 5000 , 10000]],
                   // dom: 'lBfrtip',
                    // buttons: [
                    //         'copyHtml5',
                    //         'excelHtml5',
                    //         'csvHtml5',
                    //         'pdfHtml5'
                    // ],
                    "sorting": [0, 'DESC'],
                    "ajax": url,
                    "columns":[
                    { "data": "name" },
                    { "data": "project_id" },
                    { "data": "sector" },
                    { "data": "area" },
                    { "data": "ups_installation_id" },
                    { "data": "line_type_id" },
                    { "data": "wan_ip" },
                    { "data": "lan_ip" },
                    { "data": "telephone" },
                    { "data": "address" },
                    { "data": "main_order_id" },
                    { "data": "backup_order_id" },
                    { "data": "action" }
                    ]
            });
        }

        $(function() {
            setBranchesDataTable();
        });
    </script>
@endpush
