<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get auth user details here..
        $authUser = Auth::user();
        
        $preferenceOccupationArr = explode(",", $authUser->preference_occupation);

        $preferenceFamilyTypeArr = explode(",", $authUser->preference_family_type);

        $minIncome = (int) $authUser->preference_expected_income_min;
        $maxIncome = (int) $authUser->preference_expected_income_max;

        $users = User::select('*')->whereNull('is_admin');
        $users->where('id', '!=', $authUser->id);
        
        $users->whereBetween('annual_income', [$minIncome, $maxIncome]);

        $users->whereIn('occupation', $preferenceOccupationArr);
        $users->whereIn('family_type', $preferenceFamilyTypeArr);

        $users->orderBy('id','desc');

        if($authUser->preference_manglik =='Yes') {
            $users->where(['Manglik' => 'Yes']);
        } else if($authUser->preference_manglik =='No') {
            $users->where(['Manglik' => 'No']);
        }

        // get paginate data.
        $data['users'] = $users->paginate(10);

        return view('home', $data);
    }

    public function allUsers(Request $request)
    {
        $users = User::select('*')->whereNull('is_admin');
        $users->orderBy('id','desc');

        // filter conditions.
        if(isset($request->age)) {
            $users->where('age','=',$request->age);
        }

        if(isset($request->gender)) {
            $users->where('gender','=',$request->gender);
        }

        if(isset($request->Manglik)) {   
            $users->where('Manglik','=',$request->Manglik);
        }

        if(isset($request->family_type)) {   
            $users->where('family_type','=',$request->family_type);
        }

        if(isset($request->min_amount) && isset($request->max_amount)) {
            $min_amount = (int) $request->min_amount;
            $max_amount = (int) $request->max_amount;

            $users->whereBetween('annual_income', [$min_amount, $max_amount]);

        } else if (isset($request->min_amount) ) {
          
            $min_amount = (int) $request->min_amount;
            $max_amount = (int) 0;

            $users->whereBetween('annual_income', [$min_amount, $max_amount]);

        } else if (isset($request->max_amount) ) {
            $min_amount = (int) 0;
            $max_amount = (int) $request->max_amount;
        
            $users->whereBetween('annual_income', [$min_amount, $max_amount]);
        }        
        // get paginate data.
        $data['users'] = $users->paginate(10);

        // load view here..
        return view('admin-home', $data);
    }
}
