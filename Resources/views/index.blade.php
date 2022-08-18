@extends('core::layouts.admin.app')

@section('title', __('Manage Banks'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Bank List') }}</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="{{ route('admin.banks.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{ __('Add Bank') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pageScripts')
    {{ $dataTable->scripts() }}
@endpush
