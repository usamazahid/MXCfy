@extends('layouts.admin')
@section('page-title')
    {{__('Invoice')}}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 ">{{__('Invoice')}}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Invoice') }}</li>
@endsection
@push('script-page')
    <script type="text/javascript">
        @can('On-Off Email Template')
        $(document).on("click", ".email-template-checkbox", function () {
            var chbox = $(this);
            $.ajax({
                url: chbox.attr('data-url'),
                data: {_token: $('meta[name="csrf-token"]').attr('content'), status: chbox.val()},
                type: 'PUT',
                success: function (response) {
                    if (response.is_success) {
                        show_toastr('Success', response.success, 'success');
                        if (chbox.val() == 1) {
                            $('#' + chbox.attr('id')).val(0);
                        } else {
                            $('#' + chbox.attr('id')).val(1);
                        }
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (response) {
                    response = response.responseJSON;
                    if (response.is_success) {
                        show_toastr('Error', response.error, 'error');
                    } else {
                        show_toastr('Error', response, 'error');
                    }
                }
            })
        });
        @endcan
    </script>
@endpush
@section('action-btn')
    {{--    <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-ajax-popup="true" data-title="{{__('Create New Email Template')}}" data-url="{{route('email_template.create')}}"><i class="fas fa-plus"></i> {{__('Add')}} </a>--}}
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table mb-0 dataTable">
                        <thead>
                            <tr>
                                <th> {{__('Due Date')}}</th>
                                <th> {{__('Status')}}</th>
                                @if(\Auth::user()->type == 'super admin')
                                <th> {{__('Store')}}</th>
                                @endif
                                <th> {{__('Dated')}}</th>
                                <th> {{__('Invoice')}}</th>
                                @if(\Auth::user()->type == 'super admin')
                                <th> {{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Invoices as $Invoice)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($Invoice->due_date)) }}</td>
                                    <td>{{ ($Invoice->is_paid) ? 'Paid' : 'UnPaid' }}</td>
                                    @if(\Auth::user()->type == 'super admin')
                                    <td>{{ $Invoice->stores->name }}</td>
                                    @endif
                                    <td>{{ date('d-m-Y', strtotime($Invoice->created_at)) }}</td>
                                    <td><a href="{{ $Invoice->invoice_link }}" target="_blank">Link</a></td>
                                    @if(\Auth::user()->type == 'super admin')
                                    <td class="Action">
                                        <span>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="{{ route('invoice.change.status',[$Invoice->id]) }}"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                    data-toggle="tooltip" data-original-title="{{ __('Change Status') }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Change Status') }}"><i
                                                        class="ti ti-eye text-white"></i></a>
                                            </div>
                                        </span>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
