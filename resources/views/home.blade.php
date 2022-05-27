@extends('layouts.app')

@section('title', 'User List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Suggested Users</div>

                <div class="card-body">
                    @if(session('login-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('login-success') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   


                    <table id="example" class="table table-striped table-responsive" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Annual Income</th>
                                <th>Family Type</th>
                                <th>Manglik</th>
                                {{-- <th>Match Percentage</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)

                            <tr>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->age}}</td> 
                                <td>{{$user->gender}}</td>
                                <td>{{$user->annual_income}}</td>
                                <td>{{$user->family_type}}</td>
                                <td>{{$user->Manglik}}</td>
                            </tr>
                            
                        @empty
                            <tr><td colspan="6">No record found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>

                    <small class="float-end"> {{ $users->onEachSide(5)->links('pagination::bootstrap-4') }} </small>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection