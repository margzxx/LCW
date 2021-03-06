<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use Mail;
use DB;

use App\User;
use App\Answer;
use App\Choice;
use App\Description;
use App\Experience;
use App\File;
use App\Question;
use App\Country;
use App\Skill;
use App\Verification;
use App\Area;

class CoreController extends Controller
{

	public function showRegister(){

		$countries = Country::all();

		return view('register')->with('countries',$countries);

	}

	public function doRegister(Request $request){

		$rules = [
			'firstname'=>'required',
			'lastname'=>'required',
			'country'=>'required',
			'mobile_number'=>'required',
			'gender'=>'required',
			'type'=>'required',
			'country'=>'required',
			'email'=>'required|unique:users',
			'password'=>'required|same:confirm_password',
		];

		$validator = Validator::make($request->all(),$rules);

		if($validator->fails()){

			return back()->withErrors($validator);

		}else{

			$user = new User;

			$user->firstname = $request->input('firstname');
			$user->lastname = $request->input('lastname');
			$user->email = $request->input('email');
			$user->password = bcrypt($request->input('password'));
			$user->country = $request->input('country');
			$user->mobile_number = $request->input('mobile_number');
			$user->gender = $request->input('gender');
			$user->type = $request->input('type');
			$user->role = 'Client';
			$user->marital_status = 'N/A';
			$user->educational_attainment = 'N/A';
			$user->status = 0;
			$user->save();

			$email = $user->email;

			Mail::send('emails.success_register',['name'=>$user->firstname.' '.$user->lastname,'email'=>$email,'user_id'=>$user->id],function($message) use($email){

				$message->to($email,'Connected Women')->subject('Please activate your account');
				$message->from('team@connectedwomen.co');

			});

			$request->session()->flash('success','Great you are now registered to our system. Assuming na naverify na din sa email nila yung verification link');

			return view('success_register');

		}

	}

	public function doForgotPassword(Request $request){

		$rules = [
			'email'=>'required|exists:users',
		];

		$validator = Validator::make($request->all(),$rules);

		if($validator->fails()){

			return back()->withErrors($validator);

		}else{

			$user = User::where('email',$request->input('email'))->first();

			$email = $user->email;

			Mail::send('emails.forgot_password',['name'=>$user->firstname.' '.$user->lastname,'email'=>$email,'user_id'=>$user->id],function($message) use($email){

				$message->to($email,'Connected Women')->subject('Forgot password');
				$message->from('team@connectedwomen.co');

			});

			return view('success_forgot_password');

		}

	}

	public function showResetPassword($id){

		$user = User::find($id);

		return view('reset_password')->with('user',$user);

	}

	public function doResetPassword(Request $request){

		$user = User::find($request->input('user_id'));

		$rules = [
			'new_password'=>'required|same:confirm_new_password',
		];

		DB::table('users')->where('id',$user->id)->update([
			'password'=>bcrypt($request->input('new_password')),
		]);

		$request->session()->flash('success','Password updated.');

		return view('success_reset_password');

	}

	public function showLogin(){

		return view('login');

	}

	public function showForgotPassword(){

		return view('forgot_password');

	}

	public function doRegisterActivateUser($id){

		DB::table('users')->where('id',$id)->update([
			'status'=>1,
		]);

		Auth::loginUsingId($id);

		return redirect('take-survey/1');

	}

	public function doLogin(Request $request){

		$rules = [
			'email'=>'required',
			'password'=>'required',
		];

		$validator = Validator::make($request->all(),$rules);

		if($validator->fails()){

			return back()->withErrors($validator);

		}else{

			if(Auth::attempt([
				'email'=>$request->input('email'),
				'password'=>$request->input('password'),
			])){

				if(Auth::user()->status == 0){

					Auth::logout();

					$request->session()->flash('error','Account not yet activated.');

					return back();

				}else{

					if(Auth::user()->role == 'Admin'){

					return redirect('dashboard');

					}else{

						if(Verification::where('user_id',Auth::user()->id)->exists()){

							return redirect('my-profile');

						}else{

							return redirect('take-survey/1');

						}

					}

				}	

			}else{

				$request->session()->flash('invalid-error',"The password you entered is incorrect.");

				return back();

			}

		}

	}

	public function showHome(){

		return view('home');

	}

	public function doDebug(){

		return view('success_register');

	}

	public function doDebugEmail(){

		Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
		{
			$message->to('edeesonopinav4@gmail.com');
		});

	}

}
