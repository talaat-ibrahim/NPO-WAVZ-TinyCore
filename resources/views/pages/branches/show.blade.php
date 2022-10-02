@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('PageContent')
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
@endpush
