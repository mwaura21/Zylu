@extends('layouts.app')

@section('content')
    <!-- get navbar from include folder -->
    @include('include.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Employees</h2>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Department</th>
                        <th scope="col">Status</th>
                        <th scope="col">Active Since</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- loop through all supplier details -->
                    @foreach($employees as $employee)
                    <tr>
                        @php
                            $active = new Carbon($employee->active_since);
                            $now = Carbon::now();
                            $diff_in_years = $now->diffInYears($active);
                        @endphp
                        <!-- compare the time now and active since column and get difference in years -->

                        @if($employee->active == 'Yes' && $diff_in_years >= 5)
                            <td class="text-success">{{ $employee->name }}</td>
                            <td class="text-success">{{ $employee->email }}</td>
                            <td class="text-success">{{ $employee->department }}</td>
                            <td>
                                <a class="btn btn-success">Active</a>
                            </td>
                            <td class="text-success">{{ $employee->active_since->format("l jS F Y"); }}</td>
                        @else
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>
                                @if($employee->active == 'Yes')
                                    <a class="btn btn-success">Active</a>
                                @else
                                    <a class="btn btn-danger">Inactive</a>
                                @endif
                            </td>
                            <td>
                                @if($employee->active == 'Yes')
                                    {{ $employee->active_since->format("l jS F Y"); }}
                                @else
                                    N/A
                                @endif
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav>
            Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of total {{$employees->total()}} entries
        </nav>

        <ul class="pagination justify-content-center">
            {!! $employees->links() !!}
        </ul>
    </div>
@endsection