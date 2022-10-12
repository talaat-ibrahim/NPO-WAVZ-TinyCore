@extends('layouts.master')

@section('PageTitle', $breadcrumb['title'])

@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Branch Info'):</b></h5>

                </div>
                <hr style="margin: 0">
                <div class="card-body bg-white">
                    <div class="  p-3" style="border-bottom: 2px dashed lightblue">
                            <b>@lang('Name ') :</b>
                            <span class="me-3 ms-3"> {{ $branch->name}}</span>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Main Order Id') :</b>
                                <span class="me-3 ms-3"> {{ $branch->main_order_id }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Buckup Order Id') :</b>
                                <span class="me-3 ms-3"> {{ $branch->backup_order_id }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Area') :</b>
                                <span class="me-3 ms-3"> {{ $branch->area }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Address') :</b>
                                <span class="me-3 ms-3"> {{ $branch->address }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Phone') :</b>
                                <span class="me-3 ms-3"> {{ $branch->telephone }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Sector') :</b>
                                <span class="me-3 ms-3"> {{ $branch->sector }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Financial code') :</b>
                                <span class="me-3 ms-3"> {{ $branch->financial_code }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('ISP Id') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->network)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Project') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->project)->name }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Line Capacity') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->lineCapacity)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Post Number') :</b>
                                <span class="me-3 ms-3"> {{ $branch->post_number }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Level') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->branchLevel)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-12">
                                <b>@lang('Nots') :</b>
                                <span class="me-3 ms-3"> {{ $branch->notes }}</span>
                            </div>

                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('VIOP No ') :</b>
                                <span class="me-3 ms-3"> {{ $branch->viop_no }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Line Type') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->lineType)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Router ') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->routerName)->name }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Ups Installiation') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->upsInstallation)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-6">
                                <b>@lang('Model ') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->model)->name }}</span>
                            </div>
                            <div class="col-md-6">
                                <b>@lang('Entuty status') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->entutiyStatus)->name }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="row">
                            <div class="col-md-12">
                                <b>@lang('Government ') :</b>
                                <span class="me-3 ms-3"> {{ optional($branch->government)->name }}</span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Branch Ips'):</b></h5>
                </div>
                <hr style="margin: 0">
                <div class="card-body bg-white">
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Wan Ip') :</b>
                        <span class="me-3 ms-3"> {{ $branch->wan_ip }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Lan Ip') :</b>
                        <span class="me-3 ms-3"> {{ $branch->lan_ip }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Tunnel Ip') :</b>
                        <span class="me-3 ms-3"> {{ $branch->tunnel_ip }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Additional Ips') :</b>
                        <span class="me-3 ms-3"> {{ $branch->additional_ips }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Ip nots ') :</b>
                        <span class="me-3 ms-3"> {{ $branch->ip_notes }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue">
                        <b>@lang('Atm Ip') :</b>
                        <span class="me-3 ms-3"> {{ $branch->atm_ip }}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Technical Info'):</b></h5>
                </div> <hr style="margin: 0">
                <div class="card-body bg-white">
                    <div class="p-3" style="border-bottom: 2px dashed lightblue" >
                        <b>@lang('Technical support name') :</b>
                        <span class="me-3 ms-3"> {{ $branch->technical_support_name }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue" >
                        <b>@lang('Technical support phone') :</b>
                        <span class="me-3 ms-3"> {{ $branch->technical_support_phone }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Manager  Info'):</b></h5>
                </div> <hr style="margin: 0">
                <div class="card-body bg-white">
                    <div class="p-3" style="border-bottom: 2px dashed lightblue" >
                        <b>@lang('Branch Manager name') :</b>
                        <span class="me-3 ms-3"> {{ $branch->branch_manager_name }}</span>
                    </div>
                    <div class="p-3" style="border-bottom: 2px dashed lightblue" >
                        <b>@lang('Branch Manager phone') :</b>
                        <span class="me-3 ms-3"> {{ $branch->branch_manager_phone }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Branch Schedular:'):</b></h5>
                </div> <hr style="margin: 0">
                <div class="card-body bg-white">
                    <table class="mx-2">
                        <thead>
                            <tr>
                               @foreach ($days as $k => $v)
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input disabled onclick="showInput(this)" data-day="{{ $k }}" {{in_array($k , $work_day) ? 'checked':'' }} class="form-check-input" type="checkbox"
                                                name="" value="Sat">
                                           {{  $v }}
                                        </label>
                                    </div>
                                </td>
                               @endforeach


                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input disabled  id="start-time" type="time" class="form-control"
                                    name="start_time" value="{{ $branch->start_time }}"
                                    placeholder="@lang('Start time') }}" />
                                <label>@lang('Start time')</label>
                                @error('start_time')
                                    <span style="color:red;">
                                        {{ $errors->first('start_time') }}
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input disabled id="end-time" type="time" class="form-control"
                                    name="end_time" value="{{ $branch->end_time }}"
                                    placeholder="@lang('End time') }}" />
                                <label>@lang('End time')</label>
                                @error('end_time')
                                    <span style="color:red;">
                                        {{ $errors->first('end_time') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



{{-- @section('PageContent')
    @includeIf('layouts.inc.breadcrumb')



    <div class="row">
        <div class="col-8 mx-auto mt-3">
            <div class="card">
                <div class="card-body">

                    <div class="form-floating mb-3">
                        <select name="commends" id="floatingNameInput" class="form-select">
                            @foreach ($lists as $list)
                                @php
                                    $op = str_replace('{IP}', $branch->ips, $list->commands);
                                @endphp
                                <option value="{{ $op }}">{{ $op }}</option>
                            @endforeach
                        </select>
                        <label for="floatingNameInput">@lang('Commands')</label>
                    </div>

                    <hr />

                    <div class="row" style=" margin-top: 20px; ">
                        <div style="text-align: right">
                            <form id="ping-form">
                                <button id="run" type="submit"
                                    class="btn btn-primary w-md run">@lang('RUN')</button>
                            </form>
                        </div>
                    </div>

                    <hr />

                    <div id="runCode"
                        style=" width: 100%; height: 300px; background: black; color: white; overflow-y: scroll">

                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection

@push('scripts')
    <script>
        // $(".run").click(function() {
        //     $("#runCode").html("Please Wait");
        //     $.get("{{ url('/branches/run') }}/" + $("#floatingNameInput").val(), function(data, status) {
        //         $("#runCode").html(" ").html(data);
        //     });
        // });

        let pid = null;

        (function() {
            class App {
                constructor(selector = "app") {
                    // this.element = document.getElementById(selector);
                    // if (this.element !== null) {
                    this.init();
                    // }
                }

                init() {
                    this.ping();
                    this.close();
                }

                close() {
                    const wsURL = "ws://127.0.0.1:3000/api/kill";
                    const wS = new WebSocket(wsURL);

                    wS.onmessage = (evt) => {
                        console.log(evt.data);
                        let line = document.createElement("div");
                        line.innerText = evt.data;
                        document.getElementById("runCode").appendChild(line);
                    }
                    $(document).keydown(function(event) {
                        // Ctrl+C or Cmd+C pressed?
                        if ((event.ctrlKey || event.metaKey) && event.keyCode == 67) {
                            wS.send(pid);
                        }
                    });
                }

                ping() {
                    const form = document.getElementById("ping-form");
                    if (form !== null) {
                        const response = document.getElementById("runCode");
                        const hostInput = "8.8.8.8";
                        const submit = document.getElementById('run');

                        const wsURL = "ws://127.0.0.1:3000/api/ping";
                        const wS = new WebSocket(wsURL);

                        const handleWSMsg = (data, target) => {
                            if (data.includes("Error") || data.includes("error:")) {
                                target.innerHTML = data;
                                return false;
                            }
                            if (!data.includes("process")) {
                                let line = document.createElement("div");
                                line.innerText = data;
                                target.appendChild(line);
                            } else {
                                let close = document.createElement("div");
                                close.innerText = data;
                                target.appendChild(close);
                                submit.removeAttribute("disabled", "disabled");
                            }
                        };

                        wS.onmessage = (evt) => {
                            const matches = evt.data.match(/\[(.*?)\]/);

                            if (matches) {
                                pid = matches[1];
                                handleWSMsg(evt.data.replace(matches[0], ''), response);
                            }
                        };

                        form.addEventListener(
                            "submit",
                            (e) => {
                                e.preventDefault();
                                response.innerHTML = "";
                                submit.setAttribute("disabled", "disabled");
                                const host = "8.8.8.8";
                                const times = 3;

                                const data = {
                                    host,
                                    times,
                                };
                                wS.send(JSON.stringify(data));
                            },
                            false
                        );
                    }
                }
            }

            const app = new App("app");
        })();
    </script>
@endpush --}}
