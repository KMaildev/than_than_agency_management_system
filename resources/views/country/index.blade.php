@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Country</h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('country.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-sm" id="export_excel">
                        <thead class="tbbg">
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 80%;">Country</th>
                                <th style="width: 1%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($countryies as $key => $country)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $country->country }}
                                    </td>

                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('country.edit', $country->id) }}">Edit</a>

                                                <form action="{{ route('country.destroy', $country->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="dropdown-item del_confirm"
                                                        id="confirm-text" data-toggle="tooltip">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
