@extends('layouts.master')

@section('PageTitle', $breadcrumb['title'])

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
        .ternimal {
            width: 100%;
            border-radius: 16px;
            background-color: black;
            color: white;
            font-family: consolas;
            font-size: 12px;
            min-height: 300px;
            padding: 20px;
        }
    </style>
@endsection

@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card  ">
                <div class="card-header bg-white ">
                    <h5><b>@lang('Shell Commander'):</b></h5>
                </div>
                <hr style="margin: 0">
                <div class="card-body bg-white">
                    <div class="row  p-3" style="border-bottom: 2px dashed lightblue">
                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label for="command">{{ __('command') }}</label>
                                <select name="command" class="form-select" id="command">
                                    @foreach ($commands as $cmd)
                                        <option value="{{ $cmd->id }}">{{ $cmd->commands }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="command">{{ __('ip') }}</label>
                                <select name="ip" class="form-select" id="ip">
                                    @foreach ($ips as $key => $ip)
                                        <option value="{{ $ip }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" onclick="Commander.send()"
                                    id="sendBtn">{{ __('Send') }}</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="share mb-2">
                                <button onclick="Commander.clearConsole()" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <button onclick="Commander.copy()" class="btn bg-light">
                                    <i class="fa fa-clipboard"></i>
                                </button>
                                <button onclick="Commander.shareWhatsapp()" class="btn btn-success">
                                    <i class="fa fa-whatsapp"></i>
                                </button>
                                <button onclick="Commander.shareEmail()" class="btn btn-primary">
                                    <i class="fa fa-envelope"></i>
                                </button>
                            </div>
                            <div class="ternimal" id="ternimal">
                                C:\
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('scripts')
    <script>
        var Commander = {

            terminal: $('#ternimal'),
            sendBtn: $('#sendBtn'),
            terminalUrl: "{{ route('branches.cmd') }}",
            whatsappLink: "https://wa.me/?text={text}",
            emailLink: "mailto:?subject={subject}&body={body}",
            processing: false,

            validate: function() {
                if (this.processing) {
                    alert('process already running');
                    return false;
                }
                if (!$('#ip').val() || !$('#command').val()) {
                    alert('choose ip and command');
                    return false;
                }
                return true;
            },

            disableOrEnableSending: function(disable = true) {
                if (disable) {
                    this.sendBtn.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner" ></i>');
                } else {
                    this.sendBtn.removeAttr('disabled').html('Send');
                }
            },

            send: function() {
                if (!this.validate()) {
                    return false;
                }
                var data = {
                    ip: $('#ip').val(),
                    cmd_id: $('#command').val(),
                    _token: "{{ csrf_token() }}",
                };

                this.disableOrEnableSending(true);
                this.processing = true;
                var _this = this;
                $.post(this.terminalUrl, $.param(data), function(res) {
                    if (res.status) {
                        _this.console(res.data);
                    } else {
                        alert(res.msg);
                    }
                    _this.disableOrEnableSending(false);
                    _this.processing = false;
                });
            },

            console: function(msg) {
                var output = "<br>:> " + msg + "<br>----------------------<br>";
                this.terminal.html(this.terminal.html() + output);
            },

            clearConsole: function() {
                this.terminal.html('C:\\');
            },

            shareWhatsapp() {
                var consoleText = this.terminal.text();
                var url = this.whatsappLink.replace("{text}", encodeURI(consoleText));
                window.open(url, "_blank");
            },

            shareEmail() {
                var consoleText = this.terminal.text();
                var url = this.emailLink
                    .replace("{subject}", "Shell Commander:")
                    .replace("{body}", encodeURI(consoleText));
                window.open(url, "_blank");
            },

            copy: function() {
                var text = this.terminal.text();
                navigator.clipboard.writeText(text).then(function() {
                    console.log('Async: Copying to clipboard was successful!');
                }, function(err) {
                    console.error('Async: Could not copy text: ', err);
                });
            }

        };
    </script>
@endpush
