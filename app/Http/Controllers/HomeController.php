<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Mail;
use Validator;

use App\Area;
use App\User;
use App\Answer;
use App\Choice;
use App\Country;
use App\Preference;
use App\Goal;
use App\Description;
use App\Experience;
use App\File;
use App\Question;
use App\Skill;
use App\Match;
use App\Verification;
use App\Bookmark;

class HomeController extends Controller
{

	public function doLogout(){

		Auth::logout();

		return redirect('login');

	}

	public function showDashboard(){

		$questions = Question::all();

		$users = User::where('type','VA')->get();

		return view('dashboard')->with('questions',$questions)
		->with('users',$users);

	}

	public function showBookmarkedProfiles(){

		$users = Bookmark::where('en_id',Auth::user()->id)->get();

		return view('bookmarked_profiles')->with('users',$users);

	}

	public function doBookmarkVA(Request $request,$id){

		$bookmark = new Bookmark;

		$bookmark->en_id = Auth::user()->id;
		$bookmark->va_id = $id;
		$bookmark->status = 1;
		$bookmark->save();

		$request->session()->flash('success','Great! VA saved to your bookmarks.');

		return back();

	}

	public function doUnbookmarkVA(Request $request,$id){

		DB::table('bookmarks')->where('en_id',Auth::user()->id)->where('va_id',$id)->delete();

		$request->session()->flash('success','Great! VA unbooked.');

		return back();

	}

	public function showTakeSurvey($id){

		$area = Area::find($id);

		$areas = Area::where('status',1)->get();

		$countries = Country::all();

		$questions = Question::where('area_id',$id)->where('scope',Auth::user()->type)->orderBy('order','asc')->where('status',1)->get();

		return view('take_survey')->with('questions',$questions)
		->with('countries',$countries)
		->with('area',$area)
		->with('areas',$areas);

	}

	public function doDebugRefresh(){

		DB::table('answers')->delete();
		DB::table('descriptions')->delete();
		DB::table('files')->delete();
		DB::table('verifications')->where('user_id','!=',1)->delete();
		DB::table('users')->where('id','!=',1)->delete();

		return redirect('login');

	}

	public function doSubmitAnswers(Request $request){

		if($request->input('strength')){

			$strengths = $request->input('strength');

			foreach($strengths as $strength){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Strength';
				$description->content = $strength;
				$description->save();

			}

		}

		if($request->input('essential')){

			$essentials = $request->input('essential');

			foreach($essentials as $essential){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Essential';
				$description->content = $essential;
				$description->save();

			}

		}

		$rules = [
			'avatar'=>'max:500000',
			'resume'=>'max:500000',
		];

		$validator = Validator::make($request->all(),$rules);

		if($validator->fails()){

			return back()->withErrors($validator);

		}else{

			if($request->file('avatar')){

				$image_name = time().Auth::user()->id.'.'.$request->file('avatar')->getClientOriginalExtension();

				$request->file('avatar')->move('assets/files/UploadedAvatars',$image_name);

				DB::table('users')->where('id',Auth::user()->id)->update([
					'avatar'=>'assets/files/UploadedAvatars/'.$image_name,
				]);

			}

			if($request->file('resume')){

				$image_name = time().Auth::user()->id.'.'.$request->file('resume')->getClientOriginalExtension();

				$request->file('resume')->move('assets/files/UploadedResumes',$image_name);

				$file = new File;

				$file->user_id = Auth::user()->id;
				$file->type = 'Resume';
				$file->description = Auth::user()->firstname.' '.Auth::user()->lastname.' Resume';
				$file->document = 'assets/files/UploadedResumes/'.$image_name;
				$file->save();

			}

			$questions = $request->input('question_id');
			$description = $request->input('description');

			foreach($request->input('question_id') as $id){
				$question_id[]   = $id;
			}
			foreach($request->input('description') as $value){
				$description[] = $value;
			}

			$last = sizeof($request->input('question_id'));
			$i = 0;

			while($i < $last) {

				$question = Question::find($question_id[$i]);

				$answer = new Answer;

				$answer->question_id = $question->id;
				$answer->area_id = $question->area_id;
				$answer->user_id = Auth::user()->id;

				if($description[$i]){
					$answer->description = $description[$i];
				}else{
					$answer->description = 'N/A';
				}

				$answer->save();

				$i++;
			}

			$request->session()->flash('success','Answers submitted.');

			$area_count = Area::count();

			$main_area_id = $request->input('main_area_id')+1;

			if($main_area_id <= $area_count){

				return redirect('take-survey/'.$main_area_id);

			}else{

				$verification = new Verification;
				$verification->user_id = Auth::user()->id;
				$verification->save();

			// return redirect('my-profile');

				return view('finish_survey');

			}


		// if($question->area == 'Preferences'){

		// 	return redirect('experience');

		// }else if($question->area == 'Experience'){

		// 	return redirect('skills');

		// }else if($question->area == 'Skills'){

		// 	return redirect('goals');

		// }else if($question->area == 'Goals'){

		// 	return redirect('feedbacks');

		// }else if($question->area == 'Feedbacks'){

		// 	return redirect('my-profile');

		// }


		}

	}

	public function showMyProfile(){

		$answers = Answer::where('user_id',Auth::user()->id)->get();

		return view('my_profile')->with('answers',$answers);

	}

	public function showViewProfile($id){

		$user = User::find($id);

		$answers = Answer::where('user_id',$id)->get();

		return view('view_profile')->with('answers',$answers)
		->with('user',$user);

	}

	public function doUpdateAnswers(Request $request){

		if($request->input('strength')){

			DB::table('descriptions')->where('type','Strength')->where('user_id',Auth::user()->id)->delete();

			$strengths = $request->input('strength');

			foreach($strengths as $strength){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Strength';
				$description->content = $strength;
				$description->save();

			}

		}

		if($request->input('essential')){

			DB::table('descriptions')->where('type','Essential')->where('user_id',Auth::user()->id)->delete();

			$essentials = $request->input('essential');

			foreach($essentials as $essential){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Essential';
				$description->content = $essential;
				$description->save();

			}

		}

		if($request->file('avatar')){

			$image_name = time().Auth::user()->id.'.'.$request->file('avatar')->getClientOriginalExtension();

			$request->file('avatar')->move('assets/files/UploadedAvatars',$image_name);

			DB::table('users')->where('id',Auth::user()->id)->update([
				'avatar'=>'assets/files/UploadedAvatars/'.$image_name,
			]);

		}

		if($request->file('resume')){

			$image_name = time().Auth::user()->id.'.'.$request->file('resume')->getClientOriginalExtension();

			$request->file('resume')->move('assets/files/UploadedResumes',$image_name);

			DB::table('files')->where('id',Auth::user()->id)->update([
				'document'=>'assets/files/UploadedResumes/'.$image_name,
			]);

		}

		$questions = $request->input('question_id');
		$description = $request->input('description');

		foreach($request->input('question_id') as $id){
			$question_id[]   = $id;
		}
		foreach($request->input('description') as $value){
			$description[] = $value;
		}

		$last = sizeof($request->input('question_id'));
		$i = 0;

		while($i < $last) {

			$question = Question::find($question_id[$i]);

			DB::table('answers')->where('user_id',Auth::user()->id)->where('question_id',$question->id)->update([
				'description'=>$description[$i],
			]);

			$i++;

		}

		$request->session()->flash('success','Answers submitted.');

		$area_count = Area::count();

		$main_area_id = $request->input('main_area_id')+1;

		if($main_area_id <= $area_count){

			return redirect('take-survey/'.$main_area_id);

		}else{

			$verification = new Verification;
			$verification->user_id = Auth::user()->id;
			$verification->save();

			// return redirect('my-profile');

			return view('finish_survey');

		}

		// return redirect('take-survey/'.$main_area_id);


	}

	public function showGoals(){

		$questions = Question::where('area','Goals')->where('scope',Auth::user()->type)->get();
		

		return view('goals')->with('questions',$questions);

	}

	public function showFeedbacks(){

		$questions = Question::where('area','Feedbacks')->where('scope',Auth::user()->type)->get();

		return view('feedbacks')->with('questions',$questions);

	}

	public function showExperience(){

		$questions = Question::where('area','Experience')->where('scope',Auth::user()->type)->get();

		return view('experience')->with('questions',$questions);

	}

	public function showSkills(){

		$questions = Question::where('area','Skills')->where('scope',Auth::user()->type)->get();

		return view('skills')->with('questions',$questions);

	}

	public function doEditProfile(Request $request){

		if($request->input('strength')){

			DB::table('descriptions')->where('type','Strength')->where('user_id',Auth::user()->id)->delete();

			$strengths = $request->input('strength');

			foreach($strengths as $strength){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Strength';
				$description->content = $strength;
				$description->save();

			}

		}

		if($request->input('essential')){

			DB::table('descriptions')->where('type','Essential')->where('user_id',Auth::user()->id)->delete();

			$essentials = $request->input('essential');

			foreach($essentials as $essential){

				$description = new Description;

				$description->user_id = Auth::user()->id;
				$description->type = 'Essential';
				$description->content = $essential;
				$description->save();

			}

		}

		if($request->file('avatar')){

			$image_name = time().Auth::user()->id.'.'.$request->file('avatar')->getClientOriginalExtension();

			$request->file('avatar')->move('assets/files/UploadedAvatars',$image_name);

			DB::table('users')->where('id',Auth::user()->id)->update([
				'avatar'=>'assets/files/UploadedAvatars/'.$image_name,
			]);

		}

		if($request->file('resume')){

			$image_name = time().Auth::user()->id.'.'.$request->file('resume')->getClientOriginalExtension();

			$request->file('resume')->move('assets/files/UploadedResumes',$image_name);

			DB::table('files')->where('id',Auth::user()->id)->update([
				'document'=>'assets/files/UploadedResumes/'.$image_name,
			]);

		}

		$questions = $request->input('question_id');
		$description = $request->input('description');

		foreach($request->input('question_id') as $id){
			$question_id[]   = $id;
		}
		foreach($request->input('description') as $value){
			$description[] = $value;
		}

		$last = sizeof($request->input('question_id'));
		$i = 0;

		while($i < $last) {

			$question = Question::find($question_id[$i]);

			DB::table('answers')->where('user_id',Auth::user()->id)->where('question_id',$question->id)->update([
				'description'=>$description[$i],
			]);

			$i++;

		}

		$request->session()->flash('success','Answers submitted.');

		$area_count = Area::count();

		$main_area_id = $request->input('main_area_id')+1;

		if($main_area_id <= $area_count){

			return redirect('edit-profile/'.$main_area_id);

		}else{

			$verification = new Verification;
			$verification->user_id = Auth::user()->id;
			$verification->save();

			// return redirect('my-profile');

			return view('finish_survey');

		}

	}

	public function doAddPersonal(Request $request){

		DB::table('users')->where('id',Auth::user()->id)->update([
			'firstname'=>$request->input('firstname'),
			'lastname'=>$request->input('lastname'),
			'email'=>$request->input('email'),
			'mobile_number'=>$request->input('mobile_number'),
			'gender'=>$request->input('gender'),
			'birth_date'=>$request->input('birth_date'),
			'educational_attainment'=>$request->input('educational_attainment'),
			'course'=>$request->input('course'),
			'marital_status'=>$request->input('marital_status'),
			'nationality'=>$request->input('nationality'),
			'residence'=>$request->input('residence'),
			'no_of_dependents'=>$request->input('no_of_dependents'),
		]);

		if(Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists()){

			if($request->input('short_summary')){

				DB::table('descriptions')->where('type','Short Summary')->where('user_id',Auth::user()->id)->update([
					'content'=>$request->input('short_summary'),
				]);

			}


		}else{

			if($request->input('short_summary')){

				$description = new Description;

				$description->type = 'Short Summary';
				$description->user_id = Auth::user()->id;
				$description->content = $request->input('short_summary');
				$description->save();

			}

		}

		if(Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists()){

			if($request->input('about_me')){

				DB::table('descriptions')->where('type','About Me')->where('user_id',Auth::user()->id)->update([
					'content'=>$request->input('about_me'),
				]);

			}


		}else{

			if($request->input('about_me')){

				$description = new Description;

				$description->type = 'About Me';
				$description->user_id = Auth::user()->id;
				$description->content = $request->input('about_me');
				$description->save();

			}

		}

		

		$request->session()->flash('success','Great! Personal information added.');

		return redirect('preferences');

	}

	public function showPreferences(){

		$questions = Question::where('area_id',2)->where('scope',Auth::user()->type)->get();

		return view('preferences')->with('questions',$questions);

	}

	public function doAddAvatar(Request $request){

		$image_name = time().Auth::user()->id.'.'.$request->file('image')->getClientOriginalExtension();

		$request->file('image')->move('assets/files/UploadedAvatars',$image_name);

		DB::table('users')->where('id',Auth::user()->id)->update([
			'avatar'=>'assets/files/UploadedAvatars/'.$image_name,
		]);

		$request->session()->flash('success','Great! Image added');

		return back();

	}

	public function showApplicants(){

		$users = User::where('type','VA')->paginate(50);

		$countries = Country::all();

		return view('applicants')->with('users',$users)
		->with('countries',$countries);

	}

	public function doFilterApplicants(Request $request){

		$users = User::where('type','VA')->where('country','like',$request->input('country'))->orWhere('educational_attainment','like',$request->input('educational_attainment'))->paginate(50);

		$countries = Country::all();

		return view('applicants')->with('users',$users)
		->with('countries',$countries);

	}

	public function showAdvancedFilterApplicants(){

		$countries = Country::all();

		$questions = Question::all();

		return view('advanced_filter_applicants')->with('countries',$countries)
		->with('questions',$questions);

	}

	public function doAdvancedFilterApplicants(Request $request){

		$users = User::where('type','VA')->where('country','like',$request->input('country'))->orWhere('educational_attainment','like',$request->input('educational_attainment'))->paginate(50);

		$countries = Country::all();

		return view('applicants')->with('users',$users)
		->with('countries',$countries);

	}

	public function showManageSurvey(){

		$questions = Question::where('status',1)->orderBy('created_at','desc')->paginate(50);

		return view('manage_survey')->with('questions',$questions);

	}

	public function doFilterManageSurvey(Request $request){

		if($request->input('description')){

			$questions = Question::where('status',1)->where('description','LIKE','%'.$request->input('description').'%')->paginate(50);

		}else{

			return redirect('manage-survey');

		}

		return view('manage_survey')->with('questions',$questions);

	}

	public function doDeleteQuestion(Request $request,$id){

		DB::table('questions')->where('id',$id)->update([
			'status'=>0,
		]);

		$request->session()->flash('success','Great! Question deleted.');

		return redirect('manage-survey');

	}

	public function showViewApplicant($id){

		$user = User::find($id);

		$answers = Answer::where('user_id',$user->id)->get();

		return view('view_applicant')->with('user',$user)
		->with('answers',$answers);

	}

	public function showAddQuestion(){

		$areas = Area::where('status',1)->get();

		return view('add_question')->with('areas',$areas);

	}

	public function doAddQuestion(Request $request){

		$question = new Question;

		$question->type = $request->input('type');
		$question->scope = $request->input('scope');
		$question->area_id = $request->input('area_id');
		$question->description = $request->input('description');
		$question->order = $request->input('order');
		$question->status = 1;
		$question->save();

		// if($question->type == 'Yes/No'){

		// 	$yes_choice = new Choice;

		// 	$yes_choice->question_id = $question->id;
		// 	$yes_choice->description = 'Yes';
		// 	$yes_choice->save();

		// 	$no_choice = new Choice;

		// 	$no_choice->question_id = $question->id;
		// 	$no_choice->description = 'No';
		// 	$no_choice->save();

		// }

		if($question->type == 'Ranking'){

			$no_1_choice = new Choice;

			$no_1_choice->question_id = $question->id;
			$no_1_choice->description = '1';
			$no_1_choice->save();

			$no_2_choice = new Choice;

			$no_2_choice->question_id = $question->id;
			$no_2_choice->description = '2';
			$no_2_choice->save();

			$no_3_choice = new Choice;

			$no_3_choice->question_id = $question->id;
			$no_3_choice->description = '3';
			$no_3_choice->save();

			$no_4_choice = new Choice;

			$no_4_choice->question_id = $question->id;
			$no_4_choice->description = '4';
			$no_4_choice->save();


		}

		$request->session()->flash('success','Great! Question added.');

		return redirect('manage-survey');

	}

	public function showAddChoice($id){

		$question = Question::find($id);

		$choices = Choice::where('question_id',$id)->get();

		return view('add_choice')->with('question',$question)
		->with('choices',$choices);

	}

	public function doAddChoice(Request $request){

		$choice = new Choice;

		$choice->question_id = $request->input('question_id');
		$choice->description = $request->input('description');
		$choice->save();

		$request->session()->flash('success','Great! Choice added.');

		return back();

	}

	public function doRemoveChoice(Request $request,$id){

		$choice = Choice::find($id);

		$choice->delete();

		$request->session()->flash('success','Great! Choice removed.');

		return back();

	}

	public function showEditQuestion($id){

		$question = Question::find($id);

		$areas = Area::where('status',1)->get();

		return view('edit_question')->with('question',$question)
		->with('areas',$areas);

	}

	public function doEditQuestion(Request $request){

		DB::table('questions')->where('id',$request->input('question_id'))->update([
			'scope'=>$request->input('scope'),
			'type'=>$request->input('type'),
			'area_id'=>$request->input('area_id'),
			'description'=>$request->input('description'),
			'order'=>$request->input('order'),
		]);

		$request->session()->flash('success','Great! Question updated.');

		return redirect('manage-survey');

	}

	public function showManageUsers(){

		$countries = Country::all();

		$users = User::paginate(50);

		return view('manage_users')->with('users',$users)
		->with('countries',$countries);

	}

	public function doFilterManageUsers(Request $request){

		$countries = Country::all();

		$users = User::where('type',$request->input('type'))->where('status',$request->input('status'))->where('country',$request->input('country'))->paginate(50);

		return view('manage_users')->with('users',$users)
		->with('countries',$countries);

	}

	public function doRegisterActivateUser($id){

		DB::table('users')->where('id',$id)->update([
			'status'=>1,
		]);

		Auth::loginUsingId($id);

		return redirect('take-survey/1');

	}

	public function doActivateUser(Request $request, $id){

		DB::table('users')->where('id',$id)->update([
			'status'=>1,
		]);

		$request->session()->flash('success','Great! User activated.');

		return redirect('manage-users');

	}

	public function doDeactivateUser(Request $request, $id){

		DB::table('users')->where('id',$id)->update([
			'status'=>0,
		]);

		$request->session()->flash('success','Great! User deactivated.');

		return redirect('manage-users');

	}

	public function showProfileSettings(){

		return view('profile_settings');

	}

	public function showAccountSettings(){

		return view('account_settings');

	}

	public function showImportSurveyReport(){

		return view('import_survey_report');

	}

	public function doImportSurveyReport(Request $request){

		echo "<table>";
		echo "<tbody>";
		
		$row = 1;
		$is_same = 1;

		if (($handle = fopen($request->file('document'), "r")) !== FALSE) {
			
			while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {

				$num = count($data);

				if($row == 1){

					$row++;

				}else{

					$row++;
					echo "<tr td style='border:1px solid #333'>";
					for ($c=0; $c < $num; $c++) {
						if($data[$c]==''){
							echo '<td></td>';
						}else{

							if($is_same == 0){

								if($user->email == $data[9]){

									$is_same = 0;

								}else{

									$is_same = 1;

								}

							}else{

								$user = new User;



								$user->email = $data[9];
								$user->password = bcrypt('connectedwomen2018');
								$user->firstname = $data[10];
								$user->lastname = $data[11];
								$user->mobile_number = $data[12];
								$user->gender = $data[14];
								$user->birth_date = $data[15];
								$user->country = 'Philippines';
								$user->nationality = $data[16];
								$user->residence = $data[18];
								$user->marital_status = $data[20];
								$user->role = 'Client';
								$user->type = 'VA';
								$user->status = 1;
								$user->save();

								$description = new Description;
								$description->type = 'About Me';
								$description->user_id = $user->id;
								$description->content = $data[27];
								$description->save();

								$answer1 = new Answer;

								$answer1->area = 'Imported';
								$answer1->question_id = 2;
								$answer1->user_id = $user->id;
								$answer1->description = $data[28];
								$answer1->save();

								$answer2 = new Answer;

								$answer2->area = 'Imported';
								$answer2->question_id = 3;
								$answer2->user_id = $user->id;
								$answer2->description = $data[30];
								$answer2->save();

								$answer3 = new Answer;

								$answer3->area = 'Imported';
								$answer3->question_id = 4;
								$answer3->user_id = $user->id;
								$answer3->description = $data[32];
								$answer3->save();

								$answer4 = new Answer;

								$answer4->area = 'Imported';
								$answer4->question_id = 5;
								$answer4->user_id = $user->id;
								$answer4->description = $data[34];
								$answer4->save();

								$answer5 = new Answer;

								$answer5->area = 'Imported';
								$answer5->question_id = 6;
								$answer5->user_id = $user->id;
								$answer5->description = $data[36];
								$answer5->save();

								$answer6 = new Answer;

								$answer6->area = 'Imported';
								$answer6->question_id = 7;
								$answer6->user_id = $user->id;
								$answer6->description = $data[38];
								$answer6->save();

								$answer7 = new Answer;

								$answer7->area = 'Imported';
								$answer7->question_id = 8;
								$answer7->user_id = $user->id;
								$answer7->description = $data[40];
								$answer7->save();

								$answer8 = new Answer;

								$answer8->area = 'Imported';
								$answer8->question_id = 9;
								$answer8->user_id = $user->id;
								$answer8->description = $data[41];
								$answer8->save();

								$answer9 = new Answer;

								$answer9->area = 'Imported';
								$answer9->question_id = 10;
								$answer9->user_id = $user->id;
								$answer9->description = $data[42];
								$answer9->save();

								$answer10 = new Answer;

								$answer10->area = 'Imported';
								$answer10->question_id = 12;
								$answer10->user_id = $user->id;
								$answer10->description = $data[44];
								$answer10->save();

								$answer11 = new Answer;

								$answer11->area = 'Imported';
								$answer11->question_id = 13;
								$answer11->user_id = $user->id;
								$answer11->description = $data[46];
								$answer11->save();

								$answer12 = new Answer;

								$answer12->area = 'Imported';
								$answer12->question_id = 14;
								$answer12->user_id = $user->id;
								$answer12->description = $data[47];
								$answer12->save();

								$answer13 = new Answer;

								$answer13->area = 'Imported';
								$answer13->question_id = 15;
								$answer13->user_id = $user->id;
								$answer13->description = $data[49];
								$answer13->save();

								$answer14 = new Answer;

								$answer14->area = 'Imported';
								$answer14->question_id = 16;
								$answer14->user_id = $user->id;
								$answer14->description = $data[50];
								$answer14->save();

								$answer15 = new Answer;

								$answer15->area = 'Imported';
								$answer15->question_id = 17;
								$answer15->user_id = $user->id;
								$answer15->description = $data[51];
								$answer15->save();

								$answer16 = new Answer;

								$answer16->area = 'Imported';
								$answer16->question_id = 18;
								$answer16->user_id = $user->id;
								$answer16->description = $data[52];
								$answer16->save();

								$answer17 = new Answer;

								$answer17->area = 'Imported';
								$answer17->question_id = 19;
								$answer17->user_id = $user->id;
								$answer17->description = $data[53];
								$answer17->save();

								$answer18 = new Answer;

								$answer18->area = 'Imported';
								$answer18->question_id = 20;
								$answer18->user_id = $user->id;
								$answer18->description = $data[54];
								$answer18->save();

								$answer19 = new Answer;

								$answer19->area = 'Imported';
								$answer19->question_id = 21;
								$answer19->user_id = $user->id;
								$answer19->description = $data[55];
								$answer19->save();

								$answer20 = new Answer;

								$answer20->area = 'Imported';
								$answer20->question_id = 22;
								$answer20->user_id = $user->id;
								$answer20->description = $data[56];
								$answer20->save();

								$answer21 = new Answer;

								$answer21->area = 'Imported';
								$answer21->question_id = 23;
								$answer21->user_id = $user->id;
								$answer21->description = $data[57];
								$answer21->save();

								$answer22 = new Answer;

								$answer22->area = 'Imported';
								$answer22->question_id = 24;
								$answer22->user_id = $user->id;
								$answer22->description = $data[58];
								$answer22->save();

								$answer23 = new Answer;

								$answer23->area = 'Imported';
								$answer23->question_id = 25;
								$answer23->user_id = $user->id;
								$answer23->description = $data[59];
								$answer23->save();

								$answer24 = new Answer;

								$answer24->area = 'Imported';
								$answer24->question_id = 26;
								$answer24->user_id = $user->id;
								$answer24->description = $data[60];
								$answer24->save();

		    				//BREAK

								$answer25 = new Answer;

								$answer25->area = 'Imported';
								$answer25->question_id = 27;
								$answer25->user_id = $user->id;
								$answer25->description = $data[61];
								$answer25->save();

								$answer26 = new Answer;

								$answer26->area = 'Imported';
								$answer26->question_id = 28;
								$answer26->user_id = $user->id;
								$answer26->description = $data[72];
								$answer26->save();

								$answer27 = new Answer;

								$answer27->area = 'Imported';
								$answer27->question_id = 29;
								$answer27->user_id = $user->id;
								$answer27->description = $data[73];
								$answer27->save();

								$answer28 = new Answer;

								$answer28->area = 'Imported';
								$answer28->question_id = 30;
								$answer28->user_id = $user->id;
								$answer28->description = $data[74];
								$answer28->save();

								$answer29 = new Answer;

								$answer29->area = 'Imported';
								$answer29->question_id = 31;
								$answer29->user_id = $user->id;
								$answer29->description = $data[75];
								$answer29->save();

								$answer30 = new Answer;

								$answer30->area = 'Imported';
								$answer30->question_id = 32;
								$answer30->user_id = $user->id;
								$answer30->description = $data[76];
								$answer30->save();

								$answer31 = new Answer;

								$answer31->area = 'Imported';
								$answer31->question_id = 33;
								$answer31->user_id = $user->id;
								$answer31->description = $data[77];
								$answer31->save();

								$answer32 = new Answer;

								$answer32->area = 'Imported';
								$answer32->question_id = 34;
								$answer32->user_id = $user->id;
								$answer32->description = $data[78];
								$answer32->save();

								$answer33 = new Answer;

								$answer33->area = 'Imported';
								$answer33->question_id = 35;
								$answer33->user_id = $user->id;
								$answer33->description = $data[79];
								$answer33->save();

								$answer34 = new Answer;

								$answer34->area = 'Imported';
								$answer34->question_id = 36;
								$answer34->user_id = $user->id;
								$answer34->description = $data[80];
								$answer34->save();

								$answer35 = new Answer;

								$answer35->area = 'Imported';
								$answer35->question_id = 37;
								$answer35->user_id = $user->id;
								$answer35->description = $data[81];
								$answer35->save();

								$answer36 = new Answer;

								$answer36->area = 'Imported';
								$answer36->question_id = 38;
								$answer36->user_id = $user->id;
								$answer36->description = $data[86];
								$answer36->save();

								$answer37 = new Answer;

								$answer37->area = 'Imported';
								$answer37->question_id = 39;
								$answer37->user_id = $user->id;
								$answer37->description = $data[87];
								$answer37->save();

								$answer38 = new Answer;

								$answer38->area = 'Imported';
								$answer38->question_id = 40;
								$answer38->user_id = $user->id;
								$answer38->description = $data[92];
								$answer38->save();

								$answer39 = new Answer;

								$answer39->area = 'Imported';
								$answer39->question_id = 41;
								$answer39->user_id = $user->id;
								$answer39->description = $data[94];
								$answer39->save();

								$answer40 = new Answer;

								$answer40->area = 'Imported';
								$answer40->question_id = 42;
								$answer40->user_id = $user->id;
								$answer40->description = $data[104];
								$answer40->save();

								$answer41 = new Answer;

								$answer41->area = 'Imported';
								$answer41->question_id = 43;
								$answer41->user_id = $user->id;
								$answer41->description = $data[106];
								$answer41->save();


								echo "<td td style='border:1px solid #333'>".$data[9]. "</td>";

								if($user->email == $data[9]){

									$is_same = 0;

								}


							}		



						}


					}
					echo "</tr>";

				}

			}

			fclose($handle);
		}

		echo "</tbody>";
		echo "</table>";
		// return 'The EO is still developing this one';

		return redirect('survey-report');

	}

	public function showSurveyReport(){

		$questions = Question::where('status',1)->get();

		$users = User::get();

		return view('survey_report')->with('questions',$questions)
		->with('users',$users);

	}

	public function doMatchVA(Request $request,$id){

		$match = new Match;

		$match->entrepreneur_id = Auth::user()->id;
		$match->va_id = $id;
		$match->status = 1;
		$match->save();

		$request->session()->flash('success','Great you are now matched with this applicant.');

		return back();

	}

	public function showMatchesEntrepreneur(){

		$matches = Match::where('entrepreneur_id',Auth::user()->id)->paginate(50);

		return view('entrepreneur_matches')->with('matches',$matches);

	}

	public function showMatchesVA(){

		$matches = Match::where('va_id',Auth::user()->id)->paginate(50);

		return view('va_matches')->with('matches',$matches);

	}

	public function doApproveUserSurvey(Request $request,$id){

		$verification = new Verification;

		$verification->user_id = $id;
		$verification->status = 1;
		$verification->save();

		$request->session()->flash('success','Great! User survey approved.');

		return back();

	}

	public function doDisapproveUserSurvey(Request $request,$id){

		$verification = new Verification;

		$verification->user_id = $id;
		$verification->status = 0;
		$verification->save();

		$request->session()->flash('success','Great! User survey disapproved.');

		return back();

	}

	public function showChangePassword(){

		return view('change_password');

	}

	public function showEditProfile($id){

		$area = Area::find($id);

		$areas = Area::where('status',1)->get();

		$countries = Country::all();

		$questions = Question::where('area_id',$id)->where('scope',Auth::user()->type)->orderBy('order','asc')->where('status',1)->get();

		return view('edit_profile')->with('questions',$questions)
		->with('countries',$countries)
		->with('area',$area)
		->with('areas',$areas);

	}

	public function showChangeAvatar(){

		return view('change_avatar');

	}

	public function doChangePassword(Request $request){

		if(password_verify($request->input('old_password'),Auth::user()->password)){

			$rules = [
				'new_password'=>'required|same:confirm_new_password',
			];



			DB::table('users')->where('id',Auth::user()->id)->update([
				'password'=>bcrypt($request->input('new_password')),
			]);

			$request->session()->flash('success','Password updated.');

			return back();

		}else{

			$request->session()->flash('error','Old password incorrect.');

			return back();

		}

	}

	public function showManageAreas(){

		$areas = Area::where('status',1)->paginate(50);

		return view('manage_areas')->with('areas',$areas);

	}

	public function showAddArea(){

		return view('add_area');

	}

	public function doAddArea(Request $request){

		$area = new Area;

		$area->description = $request->input('description');
		$area->status = 1;
		$area->save();

		$request->session()->flash('success','Great! Area added.');

		return redirect('manage-areas');

	}

	public function showEditArea($id){

		$area = Area::find($id);

		return view('edit_area')->with('area',$area);

	}

	public function doEditArea(Request $request){

		DB::table('areas')->where('id',$request->input('area_id'))->update([
			'description'=>$request->input('description'),
		]);

		$request->session()->flash('success','Great! Area updated.');

		return redirect('manage-areas');

	}

	public function doDeleteArea(Request $request,$id){

		DB::table('areas')->where('id',$id)->update([
			'status'=>0,
		]);

		$request->session()->flash('success','Great! Area deleted.');

		return back();

	}

	public function doSendEmailToVA(Request $request){

		$user = User::find($request->input('user_id'));

		$email = $user->email;
		$subject = $request->input('subject');

		Mail::send('emails.contact_user',['name'=>$user->firstname.' '.$user->lastname,'email'=>$email,'user_id'=>$user->id,'description'=>$request->input('description')],function($message) use($email,$subject){

                        $message->to($email,'Connected Women')->subject($subject);
                        $message->from('team@connectedwomen.co');

                    });

		$request->session()->flash('success','Great! Your message has been sent to her email.');

		return back();

	}

}
