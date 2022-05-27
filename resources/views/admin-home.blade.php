@extends('layouts.app')

@section('title', 'User List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card" width="100%">
                <div class="card-header">User List</div>

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

                    <div class="card">
                        <div class="card-body">
                            <form method="get" id="search-form">

                                <input type="hidden" value="1" name="page">
                                <div class="row">
                                     <div class="col-md-1">
         
                                         <div class="form-group">
                                             <label ><strong>Age:</strong></label>
                                             <input type="number" class="form-control" name="age" placeholder="Enter age" value="@if(isset($_GET['age']) && !empty($_GET['age'])){{$_GET['age']}}@else{{ ''}}@endif">
                                         </div>
                                     
                                     </div>
         
                                     <div class="col-md-2">
         
                                         <div class="form-group">
                                             <label ><strong>Gender:</strong></label>
                                             <select name="gender" class="form-select " >
                                                <option value="">Select</option>
                                                 <option @if(isset($_GET['gender']) && $_GET['gender'] =='Male')
                                                    selected
                                                    @endif value="Male">Male</option>
                                                 <option @if(isset($_GET['gender']) && $_GET['gender'] =='Female')
                                                 selected
                                                 @endif value="Female">Female</option>
                                             </select>
                                         </div>
                                     
                                     </div>

                                     <div class="col-md-2">
         
                                        <div class="form-group">
                                            <label ><strong>Family type:</strong></label>
                                            <select name="family_type" class="form-select " >
                                                <option value=""
                                                >Select</option>
                                                <option @if(isset($_GET['family_type']) && $_GET['family_type'] =='Joint family')
                                                selected
                                                @endif value="Joint family"
                                                >Joint family</option>
                                                <option @if( isset($_GET['family_type']) && $_GET['family_type'] =='Nuclear family')
                                                selected
                                                @endif value="Nuclear family">Nuclear family</option>
                                            </select>
                                        </div>
                                    
                                    </div>


                                    <div class="col-md-1">
                                  
                                        <div class="form-group">
                                            <label><strong>Manglik:</strong></label>
                                            <select name="Manglik" class="form-select " >
                                                <option value="">Select</option>
                                                <option @if(isset($_GET['Manglik']) && $_GET['Manglik'] =='Yes')
                                                selected
                                                @endif value="Yes">Yes</option>
                                                <option @if( isset($_GET['Manglik']) && $_GET['Manglik'] =='No')
                                                selected
                                                @endif value="No">No</option>
                                            </select>
                                        </div>
                                    
                                    </div>                                    

                                     
                                     <div class="col-md-3 text-center">
                                        <label ><strong >Income range:</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
         
                                                <div class="form-group">
                                                             
                                                    <input type="number" class="form-control" name="min_amount" value="@if(isset($_GET['min_amount']) && !empty($_GET['min_amount'])){{$_GET['min_amount']}}@else{{ ''}}@endif" placeholder="Enter min" >
                                                </div>
                                             </div>


                                             <div class="col-md-6">
         
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" name="max_amount" value="@if(isset($_GET['max_amount']) && !empty($_GET['max_amount'])){{$_GET['max_amount']}}@else{{ ''}}@endif" placeholder="Enter max">
                                                </div>
                                             </div>

                                         </div>
                                     
                                     </div>
         
                                     <div class="col-md-1">
                                         
                                         <input type="submit" class="btn btn-success mx-3 mt-4" name="search" value="Filter" >          
                                     </div>

                                     <div class="col-md-1">
                                         
                                        <button type="button" class="btn btn-warning mx-3 mt-4" onclick="clearForm()" >Reset</button>          
                                    </div>
                             
                                 </div>
                                
                            </form>

                        </div>
                    </div>


                    <table id="example" class="table table-striped table-responsive" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Annual Income</th>
                                <th>Family Type</th>
                                <th>Manglik</th>
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

                
                   @if (isset($_GET['search']) && !empty($_GET['search']))

                   <small class="float-end"> {{ $users->appends(['age' => $_GET['age'], 'gender' => $_GET['gender'],'family_type' => $_GET['family_type'],'Manglik' => $_GET['Manglik'],'min_amount' => $_GET['min_amount'],'max_amount' => $_GET['max_amount'],'search' => 'Filter'])->links('pagination::bootstrap-4') }} </small>
                   @else
                   
                    <small class="float-end"> {{ $users->onEachSide(5)->links('pagination::bootstrap-4') }} </small>

                   @endif


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function clearForm() {
        $("input[type=text], textarea, select").val("");
        window.location.href = '{{URL::to("/admin/home")}}';
    }
</script>

@endsection