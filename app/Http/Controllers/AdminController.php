<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;
use DB;
use Hash;
use Auth;
use File;
use Image;
use Mail;
use Lang;
use Session;
use DateTime;

class AdminController extends Controller
 {
   

   public function __construct() {} 
   
    public function sign_up()
    {   
       return view('sign-up');
    }

    public function sign_in()
    {   
       return view('login');
    }

    public function loginPage(Request $request)
    {
        $login = Session::get('admin_info') ['name'] ;
        if (!empty($login))
        {
            return redirect('dashboard');
        }
        else
        {
            return view('login');
        }
    }
 
    public function signUpNewUser(Request $request){

      try {

       $post = $request->all();
           
        if(!empty($post)) {
           
          // check Email & Phone

           $email = $post['email'] ; $phone = $post['phone'] ;
 
           $checkEmail = User::where('email',$post['email'])->first();
     
           $checkPhone = User::where('phone',$post['phone'])->first();

           if($checkEmail) { 
              Session::flash('error_msg', 'Email ID Already exist, please try again !!');
              return redirect()->back();
          }
           if($checkPhone) { 
                Session::flash('error_msg', 'Phone Number Already exist, please try again !!');
                return redirect()->back();   
             
           }

            $userCreate = User::insertGetId(['full_name'=>$post['full_name'],'email'=>$post['email'],
           'phone'=>$post['phone'], 'password'=>Hash::make($request->password) ,'show_password'=>$post['password'],'phone'=>$post['phone'],'user_type'=>1 ,'status'=>0 ]);

           // print_r($userCreate); exit;

             if(!empty($userCreate)) {
                DB::commit();
  
                Session::flash('success_msg', 'Profile created Successfully!!');
                
                $user = User::where('id',$userCreate)->first() ; 
                $session = array(
                  'id' => $user->id ,
                  'full_name' => $user->full_name ,    
                  'email' => $user->email ,            
               );
               $request->session()->put('admin_info', $session);
                             
               Session::flash('success_msg', 'Login Successfull, !!');
               return view('dashboard',compact('user' ));

            }else{

                DB::rollback();
                Session::flash('error_msg', 'User Not Created, please try again !!');
                return redirect()->back();
            }
          } else {
                DB::rollback();
                Session::flash('error_msg', 'Something went wrong, please contact Admin !!');
                return redirect()->back();
        }
      } catch (\Exception $e) {
      
        return $e->getMessage();
     }  

    }

    public function login(Request $request)
    {
      if($request != "")
      {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
             
            Session::flash('error_msg', 'Login Fail, please check email id!!');
            return redirect()->back();
        }
        if (!Hash::check($password, $user->password)) {
            Session::flash('error_msg', 'Login Fail, please check password!!');
        }

        $session = array(
           'id' => $user->id ,
           'full_name' => $user->full_name ,    
           'email' => $user->email ,            
        );
        $request->session()->put('admin_info', $session);
        $users = User::get() ;
        
        Session::flash('success_msg', 'Login Successfull, !!');
        return view('dashboard',compact('users' ));
       } else {
         return view('login');
      }
    }
 
    public function logout()
    {
        Auth::logout();
        Session::flush();
        session()->forget('admin_info');
        return redirect('/');
    }

    public function dashboard(){

      $userId = Session::get('admin_info')['id'] ;

        $users = User::get() ;
        $products = Product::get() ;
        $cart = DB::table('user_cart')->where('user_id',$userId)->get() ;
        $purchase = DB::table('purchase_history')->selectRaw( 'sum(amount)  as sum')-> where('user_id',$userId)->groupBy('user_id')->pluck('sum' ) ;
 
        return view('dashboard',compact('users','products', 'cart', 'purchase'));
    }

    // User Related Functions

    public function getAllUsers(){

        $allUsers =  User::orderBy('id', 'DESC')->get() ;

        return view('users',compact('allUsers'));
    }

    public function removeUser($id){

      $delete =  User::where('id',decrypt($id))->delete() ;
 
       if($delete){
         
             return redirect()->back()
                ->with('success_msg', 'User Deleted Succesfully!');
         } else {
            
             return redirect()->back()
                ->with('error_msg', 'User Not Deleted!');
         }
    }

    //============ User
 
 
}