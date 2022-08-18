@extends('core::layouts.admin.app')

@section('title', __('Create Bank'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __("Add Bank") }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.banks.index') }}" class="btn btn-primary">
                            <i class="fas fa-university"></i> {{ __('Bank List') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banks.store') }}" method="post" class="instant_reload_form">
                        <div class="form-group">
                            <label for="name" class="required">{{ __("Bank Name") }}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="{{ __("Enter bank name") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="account_name" class="required">{{ __("Account Name") }}</label>
                            <input type="text" name="account_name" id="account_name" class="form-control" placeholder="{{ __("Enter account name") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="account_number" class="required">{{ __("Account Number") }}</label>
                            <input type="text" name="account_number" id="account_number" class="form-control" placeholder="{{ __("Enter account number") }}" required>
                        </div>

                        <div class="form-group">
                            <label for="branch">{{ __("Branch Name") }}</label>
                            <input type="text" name="branch" id="branch" class="form-control" placeholder="{{ __("Enter branch name") }}">
                        </div>

                        <div class="form-group">
                            <label for="routing_number">{{ __("Routing Number") }}</label>
                            <input type="text" name="routing_number" id="routing_number" class="form-control" placeholder="{{ __("Enter routing number") }}">
                        </div>

                        <div class="form-group">
                            <label for="status" class="required">{{ __("Status") }}</label>
                            <select type="text" name="status" id="status" data-control="select2" required>
                                <option value="1">{{ __("Active") }}</option>
                                <option value="0">{{ __("Inactive") }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="signature">{{ __("Signature") }}</label>
                            <input type="file" name="signature" id="signature" class="form-control" >
                        </div>

                        <button class="btn btn-primary waves-effect waves-light float-right submit-button">
                            <i class="fas fa-save"></i>
                            {{ __("Save") }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
