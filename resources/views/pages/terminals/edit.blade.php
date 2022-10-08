@extends('layouts.master')
@section('PageTitle',$breadcrumb['title'])
@section('PageContent')
@includeIf('layouts.inc.breadcrumb')



<div class="row">
    <div class="col-8 mx-auto mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('terminals.update',$terminal->id) }}" method="post" enctype="multipart/form-data">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingNameInput" name="commands" value="{{ old('commands',$terminal->commands) }}" placeholder="@lang('Commands')" />
                        <label for="floatingNameInput">@lang('Commands')</label>
                        @error('commands')
                            <span style="color:red;">
                                {{ $errors->first('commands') }}
                            </span>
                        @enderror
                    </div>

                    <div class="row" style=" margin-top: 20px; ">
                        <div style="text-align: right">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary w-md">@lang('Submit')</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection
