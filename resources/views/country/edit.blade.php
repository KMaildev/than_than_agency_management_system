@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Country</h5>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off" action="{{ route('country.update', $country->id) }}" method="POST"
                            id="create-form">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">
                                    Country
                                </label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('country_name') form-control-danger @enderror"
                                        name="country_name" value="{{ $country->country }}">
                                    @error('country_name')
                                        <div class="form-control-feedback" style="color: red;">
                                            {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('country.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateCountry', '#create-form') !!}
@endsection
