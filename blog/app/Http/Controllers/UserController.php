<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Users;

class UserController extends Controller
{
    public function store(request $request)
    {
        $validation = $request->validate([
        /*$this->validate($request, [*/
            'fname'       =>      'required',
            'lname'       =>       'required',
            'gender'      =>       'required',
            'status'      =>       'required',
            'email'       =>      'required   | email |unique:user',
            'phone'       =>       'required  | min:10',
            'password'    =>       'required  | min:8'
        ],
        [
            'fname.required'     =>     'First Name Required',
            'lname.required'     =>     'Last Name Required',
            'gender'             =>     'Gender Required',
            'status'             =>     'Gender Required',
            'email.required'     =>     'Email  Required',
            'phone.required'     =>     'Phone Number Required',
            'password.required'  =>     'Password Required'
       ]
    );
              /*print_r($validation);*/

         $user = new Users;
            $user->fname     = $request->fname;
            $user->lname     = $request->lname;
            $user->gender    = $request->gender;
            $user->status    = $request->status;
            $user->email     = $request->email;
            $user->phone     = $request->phone;
            $user->password  = $request->password;

            if($user->save()){

                return view('login')->with('message','Data added Successfully');
            }             

        else
        {
            echo "Wrong Register Details";
        }
    }
    public function logs(request $request)
    {
        $validation = $request->validate([


                'email'       =>      'required',
                'password'    =>       'required'
            ],
            [

                'email.required'     =>     'Email  Required',
                'password.required'  =>     'Password Required'
           ]
        );

        $email=$request->input('email');
        $password=$request->input('password');
        $data=DB::select('select id from user where email=? and password=?',[$email,$password]);
        if(count($data))
        {
            return view('success');
        }
        else
        {
            return redirect('login')->with('success','Wrong Username or Password');
            /*echo "Wrong Username or Password";*/
        }
    }

    public function logout()
    {

     Auth::logout();
     return redirect('login');
    }



    public function getData(){

       $datas ['datas'] = Users::get();

        return view('success',$datas);


    }





    public function edit($id){
        $data ['data'] = Users::find($id);
        return view('edit',$data);
        }


    public function update(Request $request){
            $this->validate($request, [

            'fname'         =>       'required',
            'lname'         =>       'required',
            'gender'        =>       'required',
            'status'        =>       'required',
            'email'         =>       'required',
            'phone'         =>       'required',
            'password'      =>       'required'
            ]);

            $data = Users::find($request->id);
            $data->fname = $request->fname;
            $data->lname = $request->lname;
            $data->gender = $request->gender;
            $data->status = $request->status;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->password = $request->password;
            if($data->save()){

                return redirect('success')->with('message','Data added Successfully');
            }             

        else
        {
            echo "Wrong Register Details";
        }
        }



    public function destroy(Request $request, $id){
            $data = Users::find($id);
            $data->delete();
            return redirect('success')->with('success', 'Data deleted');

    }
}
