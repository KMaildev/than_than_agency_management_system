@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Users</h5>
                        <div class="card-title-elements ms-auto">
                            <div class="card-header-elements ms-auto">
                                <form action="{{ route('users.index') }}" method="GET" autocomplete="off">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search"
                                        name="search">
                                </form>
                            </div>

                            <a href="{{ route('users.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="tbbg">
                                <th style="color: white; width: 1%;">#</th>
                                <th class="text-center cw">Photo</th>
                                <th class="text-center cw">User Id</th>
                                <th class="text-center cw">Name</th>
                                <th class="text-center cw">Email</th>
                                <th class="text-center cw">Phone</th>
                                <th class="text-center cw">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        @if ($value->passport_photo)
                                            <img src="{{ Storage::url($value->passport_photo) }}" alt=""
                                                style="width: 30px; height: 30px; background-position: center; background-size: contain, cover;">
                                        @endif
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->employee_id }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->name }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->email }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $value->phone ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        <a class="btn btn-info btn-xs" href="{{ route('users.edit', $value->id) }}">
                                            Edit
                                        </a>
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
