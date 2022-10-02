@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div
        style="margin-bottom: 14px; position: relative; display: flex; justify-content: space-between; align-items: center;">
        <form method="GET" style="display: flex; justify-content: space-between; gap: 10px">
            <div class="form-floating" style="height: 40px;">
                <input type="text" class="form-control" style="height: 40px;" name="keyword" value="{{ request('keyword') }}"
                    placeholder="@lang('Search...') }}" />
                <label style="margin-top: -10px;">@lang('Search...')</label>
            </div>
            <button type="submit" class="btn btn-success">@lang('Search')</button>
        </form>

        <form method="POST" enctype="multipart/form-data" action="{{ route('branches.import') }}"
            style="display: flex; justify-content: space-between; gap: 10px">
            @csrf
            <div style="height: 40px;">
                <input type="file" class="form-control" name="file" />
            </div>
            <button type="submit" class="btn btn-success">@lang('Import')</button>
        </form>

        <a type="button" class="btn btn-primary" href="{{ route('branches.create') }}">@lang('Create new branche')</a>
    </div>

    @if ($lists->count() > 0)

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('English Name')</th>
                                    <th scope="col">@lang('Arabic Name')</th>
                                    <th scope="col">@lang('Created At')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>
                                            <a href="{{ route('branches.edit', $list->id) }}">
                                                {{ $list->name['en'] ?? '' }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $list->name['ar'] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $list->created_at }}
                                        </td>
                                        <td style="display: inline-flex;">
                                            {{-- <a style="margin-right: 5px;" class="btn btn-outline-secondary btn-sm edit"
                                                href="{{ route('branches.show', $list->id) }}">
                                                <i class="bx bx-zoom-in"></i>
                                            </a> --}}
                                            <a style="margin-right: 5px;" class="btn btn-outline-secondary btn-sm edit"
                                                href="{{ route('branches.edit', $list->id) }}">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                            {!! action_table_delete(route('branches.destroy', $list->id), $list->id) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $lists->links('layouts.inc.paginator') }}
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
