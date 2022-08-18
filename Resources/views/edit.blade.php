@extends('core::layouts.admin.app')

@section('title', __('Edit Bank'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __("Edit Bank") }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.banks.index') }}" class="btn btn-primary">
                            <i class="fas fa-university"></i> {{ __('Bank List') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banks.update', $bank->id) }}" method="post" class="instant_reload_form">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="required">{{ __("Bank Name") }}</label>
                            <input type="text" name="name" id="name" value="{{ $bank->name }}" class="form-control" placeholder="{{ __("Enter bank name") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="account_name" class="required">{{ __("Account Name") }}</label>
                            <input type="text" name="account_name" value="{{ $bank->account_name }}" id="account_name" class="form-control" placeholder="{{ __("Enter account name") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="account_number" class="required">{{ __("Account Number") }}</label>
                            <input type="text" name="account_number" value="{{ $bank->account_number }}" id="account_number" class="form-control" placeholder="{{ __("Enter account name") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="branch">{{ __("Branch Name") }}</label>
                            <input type="text" name="branch" id="branch" value="{{ $bank->branch }}" class="form-control" placeholder="{{ __("Enter branch name") }}">
                        </div>

                        <div class="form-group">
                            <label for="routing_number">{{ __("Routing Number") }}</label>
                            <input type="text" name="routing_number" id="routing_number" value="{{ $bank->routing_number }}" class="form-control" placeholder="{{ __("Enter routing number") }}">
                        </div>

                        <div class="form-group">
                            <label for="status" class="required">{{ __("Status") }}</label>
                            <select type="text" name="status" id="status" data-control="select2" required>
                                <option value="1" @selected($bank->status)>{{ __("Active") }}</option>
                                <option value="0" @selected(!$bank->statis)>{{ __("Inactive") }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="signature">{{ __("Signature") }}</label>
                            <input type="file" name="signature" id="signature" class="form-control" >
                        </div>

                        @if($bank->signature)
                            <img src="{{ asset($bank->signature) }}" alt="" height="100">
                        @endif

                        <button class="btn btn-primary waves-effect waves-light float-right submit-button">
                            <i class="fas fa-save"></i>
                            {{ __("Update") }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
