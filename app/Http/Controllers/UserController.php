<?php

namespace App\Http\Controllers;

use App\User;
use App\Privacy;
use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    
    /**
     * User profile
     *
     * @return void
     */
    public function index()
    {
      $user = auth()->user(); 
        
        $response=[
            'user' => $user,
        ];

        return view('www.content.user.index',$response);
    }
    
    /**
     * Edit user Form
     *
     * @return void
     */
    public function showEditForm()
    {
        $user = auth()->user();
        $privacies = Privacy::all();
        
        $response = [
           'user'=> $user,
           'privacies' => $privacies
        ];
       
        return view('www.content.user.edit',$response);
    }
    
    /**
     * Edit user info
     *
     * @return void
     */
    public function editProfile(Request $request){
        $params = $request->all();
        
        $before_18years = date('Y-m-d', strtotime('-18 years'));
        
        $validator = Validator::make($params,
            [ 
                'alias'     =>  'required|string|max:255',
                'age'       =>  "required|date_format:Y-m-d|before_or_equal:$before_18years",
                'gender'    =>  'in:F,M,PND',
                'weight'    =>  'numeric|nullable',
                'height'    =>  'numeric|nullable',
                'privacy_id'=>  'required|numeric',
            ]
         );

        if ($validator->fails()) {
            return redirect(nt_route('edit_user-'.user_lang()))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $user = auth()->user();
        
        $user->fill($params);
        
        $user->save(); 
        
        return redirect(nt_route('profile-'.user_lang()))->with('action_status', 'Tu perfil se ha actualizado correctamente');
    }
    
    /**
     * Edit user info
     *
     * @return void
     */
    public function showCredentialsForm(){
        $user = auth()->user();
        
        $response = [
           'user'=> $user
        ];
        
       return view('www.content.user.credentials',$response);
    }
    
    public function editCredentials(Request $request ){
        $user = auth()->user();
        $params = $request->all();
       
        $validator = Validator::make($params,
            [ 
                'email' => 'required|email|max:255|unique:users,email,'.auth()->id(),
                'password'  =>  'required|string|min:6|confirmed',
            ]
         );

        if ($validator->fails()) {
            return redirect(nt_route('user_credentials-'.user_lang()))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store
        $params['password'] = Hash::make($params['password']);
        
        $user->fill($params);
        $user->save();
        
        return redirect(nt_route('home-'.user_lang()));
    }
    
}
