<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Admin;
use App\Category;
use App\Workout;
use App\Routine;
use App\DelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use DateTime;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
     public function profile() {
         
         $admin = Auth::guard('admin')->user();
         
         $response = [
            'admin' => $admin,
         ];
         
         return view('www.content.admin.profile', $response);
     }
     
     public function profileEdit() {
        $admin = auth()->user();
        
        $response = [
           'admin'=> $admin,
        ];
       
        return view('www.content.admin.profile_edit',$response);
     }
     
     public function profileEditPost(Request $request) {
        $params = $request->all();
        
        $before_18years = date('Y-m-d', strtotime('-18 years'));
        
        $validator = Validator::make($params,
            [ 
                'alias'     =>  'required|string|max:255',
                'age'       =>  "required|date_format:Y-m-d|before_or_equal:$before_18years",
                'gender'    =>  'in:F,M,PND'
            ]
         );

        if ($validator->fails()) {
            return redirect(route('adminProfileEdit'))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $admin = auth()->user();
        
        $admin->fill($params);
        
        $admin->save();
        
        return redirect()->route('adminProfile')->with('action_status', 'Your profile has been updated correctly');
     }
     
     public function credentialsEdit() {
         $admin = auth()->user();

         $response = [
            'admin'=> $admin
         ];

         return view('www.content.admin.credentials_edit',$response);
     }
     
     public function credentialsEditPost(Request $request) {
        $admin = auth()->user();
        $params = $request->all();
        
        $validator = Validator::make($params, [ 
            'email'     => 'required|email|max:255|unique:admins,email,'.auth()->id(),
            'password'  =>  'required|string|min:6|confirmed',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('credentials_edit')
                             ->withErrors($validator)
                             ->withInput();
        }

        $params['password'] = Hash::make($params['password']);
        
        $admin->fill($params);
        $admin->save();
        
        return redirect()->route('adminProfile');
     }
    
    // ADMINS RELATED METHODS
    
    public function adminsList() {
        $admins = Admin::paginate(10);
        
        $response = [
            'admins' => $admins
        ];
        
        return view('www.content.admin.admins_list', $response);
    }
    
    public function adminsListOne(Request $request) {
        $admin = Admin::find($request->id);
        
        $response = [
            'admin' => $admin
        ];
        
        return view('www.content.admin.admins_list_one', $response);
    }
    
    public function createAdmin() {
        return view('www.content.admin.create_admin');
    }
    
    public function createAdminPost(Request $request) {
        $params = $request->all();
        
        $validator = Validator::make($params, [ 
            'alias'         =>  'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|min:6|confirmed',
            'age'           => 'required|date|before_or_equal:-18 year',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        
        Admin::insert([
            'alias'     => $params['alias'],
            'email'     => $params['email'],
            'password'  => Hash::make($params['password']),
            'age'       => $params['age'],
            'gender'    => $params['gender'],
        ]);
        
        return redirect()->route('adminsList');
    }
    
    // USERS RELATED METHODS
    
    public function usersList() {
        $users = User::paginate(10);
    
        $response = [
            'users' => $users
        ];
    
        return view('www.content.admin.users_list', $response);
    }
    
    public function usersListOne(Request $request) {
        $user = User::find($request->id);
        
        $response = [
            'user' => $user
        ];
        
        return view('www.content.admin.users_list_one', $response);
    }
    
    public function statusUser(Request $request) {
        $user = User::find($request->id);
        
        $data = '';
        
        if($user->status_id == 1) {
            $user->status_id = 2;
            $user->save();
            $data = 'blocked';
        }
        else if ($user->status_id == 2) {
            $user->status_id = 1;
            $user->save();
            $data = 'unblocked';
        }
        
        return $data;
    }
    
    public function deleteUser(Request $request) {
        $user = User::find($request->id);
        $user->status_id = 3;
        $user->save();
        
        $data = '';
        
        $routines = Routine::where('user_id', $user->id)->get();
        $routines = json_encode($routines);
        
        DelUser::insert(
            [
                'userID' => $user->id,
                'alias' => $user->alias,
                'email' => $user->email,
                'password' => $user->password,
                'age' => $user->age,
                'gender' => $user->gender,
                'weight' => $user->weight,
                'height' => $user->height,
                'privacy_id' => $user->privacy_id,
                'status_id' => $user->status_id,
                'stored_routines' => $routines
            ]
        );
        
        $user->delete();
        
        if ($request->redirect == true) {
            return redirect()->route('usersList');
        }
        else {
            $data = 'true';
            return $data;
        }
    }
    
    // CATEGORY RELATED METHODS
    
    public function categoryList() {
        $categories = Category::paginate(10);
        
        $response = [
            'categories' => $categories
        ];
        
        return view('www.content.admin.category_list', $response);
    }
    
    public function createCategory (){
        return view('www.content.admin.create_category');
    }
    
    public function createCategoryPost (Request $request){
        $params = $request->all();
        
        $validator = Validator::make($params, [ 
            'catES'     =>  'required|string|max:255',
            'catEN'     =>  'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('createCategory')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $names = [
            'es' => $params['catES'], 
            'en' => $params['catEN']
        ];
        
        $category = json_encode($names);
        
        Category::insert(['name' => $category]);
               
        return redirect()->route('categoryList');
    }
    
    public function editCategory(Request $request) {
        $category = Category::find($request->id);
        
        $response = [
            'category' => $category
        ];
        
        return view('www.content.admin.edit_category', $response);
    }
    
    public function editCategoryPost(Request $request) {
        $params = [
            'catES' => $request->catES,
            'catEN' => $request->catEN
        ];
        
        $validator = Validator::make($params, [ 
            'catES'     =>  'required|string|max:255',
            'catEN'     =>  'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $names = [
            'es' => $params['catES'], 
            'en' => $params['catEN']
        ];
        
        $names = json_encode($names);
        
        Category::find($request->id_category)->delete();
        
        Category::insert([
            'name' => $names
        ]);
               
        return redirect()->route('categoryList');
    }
    
    public function deleteCategory(Request $request) {
        $category = Category::find($request->id);
        
        $category->delete();
        
        return 'true';
    }
    
    // WORKOUT RELATED METHODS
    
    public function workoutList(Request $request) {
        if(isset($request->id_category)) {
            $workouts = Workout::where('category_id', $request->id_category)->paginate(10);
            
            $category = Category::find($request->id_category);
            
            $response = [
                'workouts' => $workouts,
                'category' => $category,
                'id_category' => $request->id_category
            ];
        }
        else {
            $workouts = Workout::paginate(10);
            
            $response = [
                'workouts' => $workouts
            ];
        }

        return view('www.content.admin.workout_list', $response);
    }
    
    public function workoutListOne(Request $request) {
        $workout = Workout::find($request->id);
        
        if (isset($request->id_category)) {
            $response = [
                'workout'       => $workout,
                'id_category'   => $request->id_category
            ];
        }
        else {
            $response = [
                'workout'       => $workout
            ];
        }
        
        return view('www.content.admin.workout_list_one', $response);
    }
    
    public function createWorkout (Request $request) {
        if(isset($request->id_category)) {
            $category = Category::find($request->id_category);
            $categories = new Collection();
            $categories->push($category);
            
            $response = [
                'categories'    => $categories,
                'id_category'   => $request->id_category
            ];
        }
        else {
            $categories = Category::all();
            
            $response = [
                'categories'    => $categories
            ];
        }
        
        return view('www.content.admin.create_workout', $response);
    }
    
    public function createWorkoutPost (Request $request){
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'worES'     =>  'required|string|max:255',
            'worEN'     =>  'required|string|max:255',
            'desES'     =>  'required|string|max:255',
            'desEN'     =>  'required|string|max:255',
            'worlink'   =>  'required|string|max:255',
            'category'  =>  'required|numeric|max:255'
        ]);
        
        if (isset($request->id_category)) {
            if ($validator->fails()) {
                return redirect()->route('createWorkout')
                                 ->withErrors($validator)
                                 ->withInput();
            }
        }
        else {
            if ($validator->fails()) {
                return redirect()->route('createWorkout', ['id_category' => $request->id_category])
                                 ->withErrors($validator)
                                 ->withInput();
            }
        }
        
        $names = [
            'es' => $request-> worES,
            'en' => $request-> worEN
        ];

        $names = json_encode($names); 
        
        $descriptions = [
            'es' => $request-> desES,
            'en' => $request-> desEN
        ];

        $descriptions = json_encode($descriptions);
        
        Workout::insert([
            'name' => $names ,
            'description' => $descriptions,
            'link' => $params['worlink'],
            'category_id' => $params['category']
        ]);
        
        if (isset($request->id_category))
            return redirect()->route('workoutList', ['id_category' => $request->id_category]);
        else
            return redirect()->route('workoutList');
    }
    
    public function editWorkout(Request $request) {
        $workout = Workout::find($request->id);
        $categories = Category::all();
        
        if (isset($request->id_category)) {
            $response = [
                'workout'       => $workout,
                'categories'    => $categories,
                'id_category'   => $request->id_category
            ];
        }
        else {
            $response = [
                'workout'       => $workout,
                'categories'    => $categories,
            ];
        }
        
        return view('www.content.admin.edit_workout', $response);
    }
    
    public function editWorkoutPost(Request $request) {
        $params = [
            'worES'     => $request->worES,
            'worEN'     => $request->worEN,
            'desES'     => $request->desES,
            'desEN'     => $request->desEN,
            'worlink'   => $request->worlink,
            'category'  => $request->category
        ];
        
        $validator = Validator::make($params, [
            'worES'     =>  'required|string|max:255',
            'worEN'     =>  'required|string|max:255',
            'desES'     =>  'required|string|max:255',
            'desEN'     =>  'required|string|max:255',
            'worlink'   =>  'required|string|max:225',
            'category'  =>  'required|numeric|max:255'
        ]);
        
        if (isset($request->id_category)) {
            if ($validator->fails()) {
                return redirect()->route('editWorkout', ['id' => $request->id_workout, 'id_category' => $request->id_category])
                                 ->withErrors($validator)
                                 ->withInput();
            }
        }
        else {
            if ($validator->fails()) {
                return redirect()->route('editWorkout', ['id' => $request->id_workout])
                                 ->withErrors($validator)
                                 ->withInput();
            }
        }
        
        $names = [
            'es' => $request-> worES,
            'en' => $request-> worEN
        ];

        $names = json_encode($names); 
        
        $descriptions = [
            'es' => $request-> desES,
            'en' => $request-> desEN
        ];

        $descriptions = json_encode($descriptions);
        
        Workout::find($request->id_workout)->delete();
        
        Workout::insert([
            'name' => $names,
            'description' => $descriptions,
            'link' => $params['worlink'],
            'category_id' => $params['category']
        ]);
        
        if (isset($request->id_category))
            return redirect()->route('workoutList', ['id_category' => $request->id_category]);
        else
            return redirect()->route('workoutList');
    }
    
    public function deleteWorkout(Request $request) {
        $workout = Workout::find($request->id);
        
        $data = '';
        
        $workout->delete();
        
        if ($request->redirect == true) {
            if (isset($request->id_category))
                return redirect()->route('workoutList', ['id_category' => $request->id_category]);
            else
                return redirect()->route('workoutList');
        }
        else {
            $data = 'true';
            return $data;
        }
    }
    
}
