<?php

Route::get('/','CoreController@showHome');

Route::get('register','CoreController@showRegister');
Route::post('register','CoreController@doRegister');

Route::get('login','CoreController@showLogin');
Route::post('login','CoreController@doLogin');

Route::get('logout','HomeController@doLogout');

Route::get('profile-settings','HomeController@showProfileSettings');
Route::get('account-settings','HomeController@showAccountSettings');

Route::get('my-profile','HomeController@showMyProfile');
Route::get('edit-profile/{id}','HomeController@showEditProfile');
Route::post('edit-profile','HomeController@doEditProfile');
Route::get('change-avatar','HomeController@showChangeAvatar');

Route::get('view-profile/{id}','HomeController@showViewProfile');

Route::get('change-password','HomeController@showChangePassword');
Route::post('change-password','HomeController@doChangePassword');
Route::get('forgot-password','CoreController@showForgotPassword');
Route::post('forgot-password','CoreController@doForgotPassword');
Route::get('reset-password/{id}','CoreController@showResetPassword');
Route::post('reset-password','CoreController@doResetPassword');

Route::get('applicants','HomeController@showApplicants');
Route::post('filter-applicants','HomeController@doFilterApplicants');
Route::get('advanced-filter-applicants','HomeController@showAdvancedFilterApplicants');
Route::post('advanced-filter-applicants','HomeController@doAdvancedFilterApplicants');

Route::get('take-survey/{id}','HomeController@showTakeSurvey');

Route::get('dashboard','HomeController@showDashboard');
Route::get('preferences','HomeController@showPreferences');
Route::get('experience','HomeController@showExperience');
Route::get('skills','HomeController@showSkills');
Route::get('goals','HomeController@showGoals');
Route::get('feedbacks','HomeController@showFeedbacks');

Route::post('submit-answers','HomeController@doSubmitAnswers');
Route::post('update-answers','HomeController@doUpdateAnswers');

Route::post('add-avatar','HomeController@doAddAvatar');
Route::post('add-personal','HomeController@doAddPersonal');
Route::post('add-preferences','HomeController@doAddPreferences');

Route::post('filter-manage-survey','HomeController@doFilterManageSurvey');
Route::get('manage-survey','HomeController@showManageSurvey');
Route::get('add-question','HomeController@showAddQuestion');
Route::post('add-question','HomeController@doAddQuestion');
Route::get('edit-question/{id}','HomeController@showEditQuestion');
Route::post('edit-question','HomeController@doEditQuestion');
Route::get('delete-question/{id}','HomeController@doDeleteQuestion');

Route::get('manage-areas','HomeController@showManageAreas');
Route::get('add-area','HomeController@showAddArea');
Route::post('add-area','HomeController@doAddArea');
Route::get('edit-area/{id}','HomeController@showEditArea');
Route::post('edit-area','HomeController@doEditArea');
Route::get('delete-area/{id}','HomeController@doDeleteArea');

Route::get('add-choice/{id}','HomeController@showAddChoice');
Route::post('add-choice','HomeController@doAddChoice');
Route::get('remove-choice/{id}','HomeController@doRemoveChoice');

Route::get('view-applicant/{id}','HomeController@showViewApplicant');

Route::post('filter-manage-users','HomeController@doFilterManageUsers');
Route::get('manage-users','HomeController@showManageUsers');
Route::get('activate-user/{id}','HomeController@doActivateUser');
Route::get('deactivate-user/{id}','HomeController@doDeactivateUser');
Route::get('register-activate-user/{id}','HomeController@doRegisterActivateUser');

Route::get('survey-report','HomeController@showSurveyReport');

Route::get('import-survey-report','HomeController@showImportSurveyReport');
Route::post('import-survey-report','HomeController@doImportSurveyReport');

Route::get('match-va/{id}','HomeController@doMatchVA');

Route::get('matches-entrepreneur','HomeController@showMatchesEntrepreneur');
Route::get('matches-va','HomeController@showMatchesVA');

Route::get('approve-user-survey/{id}','HomeController@doApproveUserSurvey');
Route::get('disapprove-user-survey/{id}','HomeController@doDisapproveUserSurvey');

Route::get('bookmark-va/{id}','HomeController@doBookmarkVA');
Route::get('unbookmark-va/{id}','HomeController@doUnbookmarkVA');
Route::get('bookmarked-profiles','HomeController@showBookmarkedProfiles');

Route::get('debug','CoreController@doDebug');
Route::get('debug-email','CoreController@doDebugEmail');