@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Overseas Company
                        </h5>

                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('overseas_agent.create') }}"
                                class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <span style="margin: 2px; font-weight: bold;">
                        Total: {{ count($overseas_agencies) }}
                    </span>

                    <table class="table table-bordered table-sm" id="export_excel">
                        <thead class="tbbg">
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 5%; text-align: center;">Company Name</th>
                                <th style="width: 5%; text-align: center;">Contact</th>
                                <th style="width: 5%; text-align: center;">Type</th>
                                <th style="width: 5%; text-align: center;">Phone</th>
                                <th style="width: 5%; text-align: center;">Email</th>
                                <th style="width: 5%; text-align: center;">Address</th>
                                <th style="width: 5%; text-align: center;">Country</th>
                                <th style="width: 1%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($overseas_agencies as $key => $overseas_agency)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->company_name }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->contact }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->type_of_company }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->company_phone }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->company_email }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->company_address }}
                                    </td>

                                    <td>
                                        {{ $overseas_agency->countries_table->country }}
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('overseas_agent.edit', $overseas_agency->id) }}">Edit</a>

                                                <form action="{{ route('overseas_agent.destroy', $overseas_agency->id) }}"
                                                    method="POST">
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
