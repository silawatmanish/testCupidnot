@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Register</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h6>Basic Information</h6>
                        <hr />

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="@isset($first_name){{$first_name}}@endisset {{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">Last name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="@isset($last_name){{$last_name}}@endisset {{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@isset($email){{$email}}@endisset{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">Date of birth</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" required autocomplete="date_of_birth">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <input type="hidden" name="age" id="age" value="">
                        
                        
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>

                            <div class="col-md-2 form-check mt-2">
                                <input id="gender-male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" value="Male"> Male

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2 form-check mt-2">
                                <input id="gender-female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" value="Female"> Female

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        
                        <div class="row mb-3">
                            <label for="annual_income" class="col-md-4 col-form-label text-md-end">Annual income</label>

                            <div class="col-md-6">
                                <input id="annual_income" type="number" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" required autocomplete="annual_income">

                                @error('annual_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">Occupation</label>

                            <div class="col-md-6">
                                <select name="occupation" class="form-select  @error('occupation') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Private job">Private job</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Business">Business</option>
                                </select>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="family_type" class="col-md-4 col-form-label text-md-end">Family type</label>

                            <div class="col-md-6">
                                <select name="family_type" class="form-select  @error('family_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Joint family">Joint family</option>
                                    <option value="Nuclear family">Nuclear family</option>
                                </select>

                                @error('family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="Manglik" class="col-md-4 col-form-label text-md-end">Manglik </label>

                            <div class="col-md-6">
                                <select name="Manglik" class="form-select  @error('Manglik') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                                @error('Manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <hr />
                        <h6>Partner Preference Information</h6>
                        <hr />
                        



                        <div class="row mb-3">
                            <label for="preference_occupation" class="col-md-4 col-form-label text-md-end">Occupation</label>

                            <div class="col-md-6">
                                <select multiple name="preference_occupation[]" class="form-select  @error('preference_occupation') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Private job">Private job</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Business">Business</option>
                                </select>

                                @error('preference_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="preference_family_type" class="col-md-4 col-form-label text-md-end">Family type</label>

                            <div class="col-md-6">
                                <select multiple name="preference_family_type[]" class="form-select  @error('preference_family_type') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Joint family">Joint family</option>
                                    <option value="Nuclear family">Nuclear family</option>
                                </select>

                                @error('preference_family_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="preference_manglik" class="col-md-4 col-form-label text-md-end">Manglik </label>

                            <div class="col-md-6">
                                <select name="preference_manglik" class="form-select  @error('preference_manglik') is-invalid @enderror" >
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Both">Both</option>
                                </select>

                                @error('preference_manglik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">Expected income </label>

                            <div class="col-md-6">
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">

                                <div id="slider-range"></div>
                            </div>
                            
                            <input type="hidden" id="min_amount" name="preference_expected_income_min" value="5000">
                            <input type="hidden" id="max_amount" name="preference_expected_income_max" value="25000">
                           
                          
                        </div>

                        <input type="hidden" value="@isset($google_id)
                           {{$google_id}} 
                        @endisset" name="google_id">

                        <hr/>


                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12 row" style="margin-left:-2px; " >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                        <div class="col-md-6">
                            <span style="color: green;
                            font-size: 18px;" class="float-end mt-2">Social Registration</span>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-0 ">
                           
                                <a class="btn btn-danger" href="{{ route('auth.google') }}">
                                    Register with Google
                                </a>
                            
                        </div>
                    </div>
                        </div>
                        
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $( function() {
        $( "#date_of_birth" ).datepicker({ 
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            showAnim: 'slideDown',
            dateFormat: 'dd-mm-yy'
        }).on('change', function () {
            var age = getAge(this);
            $("#age").val(age);
            console.log(age);
        });


        function getAge(dateVal) {
            var
                birthday = new Date(dateVal.value),
                today = new Date(),
                ageInMilliseconds = new Date(today - birthday),
                years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
                months = 12 * (years % 1),
                days = Math.floor(30 * (months % 1));

            return Math.floor(years);

                
        }
        


        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 60000,
            values: [ 5000, 25000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "₹ " + ui.values[ 0 ] + " - ₹ " + ui.values[ 1 ] );

                var value1 = ui.values[0];
                var value2 = ui.values[1];

                $("#min_amount").val(value1);
                $("#max_amount").val(value2);
            }
        });

        $( "#amount" ).val( "₹ " + $( "#slider-range" ).slider( "values", 0 ) +
        " - ₹ " + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>

@endsection
