<?php

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::get('/', 'HomeController@home');
Route::get('/sign', 'HomeController@sign');
Route::get('/search-jobs', 'HomeController@search_jobs');
Route::get('/browse-employers', 'HomeController@browse_employers');
Route::get('/browse-candidates', 'HomeController@browse_candidates');
Route::get('/candidate/detail', 'HomeController@candidate_detail');

Route::post('/candidate/register', 'UserController@candidate_register');
Route::post('/employer/register', 'UserController@employer_register');
Route::post('/candidate/login', 'UserController@candidate_login');
Route::post('/employer/login', 'UserController@employer_login');

Route::get('/candidate/{username}/find-job', 'JobController@find_jobs');
Route::get('/candidate/{username}/job/show/{id}', 'JobController@show');
Route::post('/candidate/{username}/job/{id}/apply', 'JobController@apply');
Route::get('/candidate/{username}/dashboard', 'CandidateController@dashboard');
Route::get('/candidate/{username}/profile', 'CandidateController@profile');
Route::get('/candidate/{username}/resume', 'CandidateController@resume');
Route::get('/candidate/{username}/applied-jobs', 'CandidateController@applied_jobs');
Route::get('/candidate/{username}/completed-jobs', 'CandidateController@completed_jobs');
Route::get('/candidate/{username}/recent-jobs', 'CandidateController@recent_jobs');
Route::get('/candidate/{username}/applied-jobs/{page}', 'CandidateController@applied_jobs');
Route::get('/candidate/{username}/completed-jobs/{page}', 'CandidateController@completed_jobs');
Route::get('/candidate/{username}/recent-jobs/{page}', 'CandidateController@recent_jobs');
Route::get('/candidate/{username}/messages', 'CandidateController@messages');
Route::get('/candidate/{username}/message/get/{friend_id}', 'MessageController@get_message');
Route::post('/candidate/{username}/message/send', 'MessageController@send_message');
Route::get('/candidate/{username}/reviews', 'CandidateController@reviews');
Route::get('/candidate/{username}/change-password', 'CandidateController@change_password');
Route::get('/candidate/{username}/logout', 'CandidateController@logout');
Route::get('/candidate/{username}/delete_profile', 'CandidateController@delete_profile');
Route::post('/candidate/{username}/profile/post-profile', 'CandidateProfileController@post_profile');
Route::post('/candidate/{username}/profile/update-profile', 'CandidateProfileController@update_profile');
Route::post('/candidate/{username}/profile/update-profile', 'CandidateProfileController@update_profile');
Route::post('/candidate/{username}/resume/edu/create', 'CandidateResumeController@edu_create');
Route::post('/candidate/{username}/resume/edu/edit', 'CandidateResumeController@edu_edit');
Route::post('/candidate/{username}/resume/exp/create', 'CandidateResumeController@exp_create');
Route::post('/candidate/{username}/resume/exp/edit', 'CandidateResumeController@exp_edit');
Route::post('/candidate/{username}/resume/awd/create', 'CandidateResumeController@awd_create');
Route::post('/candidate/{username}/resume/awd/edit', 'CandidateResumeController@awd_edit');
Route::post('/candidate/{username}/resume/pof/pof-upload', 'CandidateResumeController@pof_upload');
Route::any('/candidate/{username}/resume/pof/remove/{id}', 'CandidateResumeController@pof_remove');
Route::get('/candidate/{username}/gallery', 'GalleryController@index');

Route::get('/employer/{username}/dashboard', 'EmployerController@dashboard');
Route::get('/employer/{username}/profile', 'EmployerController@profile');
Route::get('/employer/{username}/post-job', 'EmployerController@post_job');
Route::get('/employer/{username}/active-jobs', 'EmployerController@active_jobs');
Route::get('/employer/{username}/current-jobs', 'EmployerController@current_jobs');
Route::get('/employer/{username}/past-jobs', 'EmployerController@past_jobs');
Route::get('/employer/{username}/active-jobs/{page}', 'EmployerController@active_jobs');
Route::get('/employer/{username}/current-jobs/{page}', 'EmployerController@current_jobs');
Route::get('/employer/{username}/past-jobs/{page}', 'EmployerController@past_jobs');
Route::get('/employer/{username}/packages', 'EmployerController@packages');
Route::get('/employer/{username}/transactions', 'EmployerController@transactions');
Route::get('/employer/{username}/messages', 'EmployerController@messages');
Route::get('/employer/{username}/message/get/{friend_id}', 'MessageController@get_message');
Route::post('/employer/{username}/message/send', 'MessageController@send_message');
Route::get('/employer/{username}/change-password', 'EmployerController@change_password');
Route::get('/employer/{username}/logout', 'EmployerController@logout');
Route::get('/employer/{username}/delete-profile', 'EmployerController@delete_profile');
Route::post('/employer/{username}/profile/store', 'EmployerProfileController@store');
Route::post('/employer/{username}/profile/update', 'EmployerProfileController@update');
Route::post('/employer/{username}/job/create', 'JobController@job_create');
Route::get('/employer/{username}/job/{id}', 'JobController@job_applicants');
Route::get('/employer/{username}/job/{id}/{page}', 'JobController@job_applicants');
Route::get('/employer/{username}/job/{id}/complete', 'JobController@complete');
Route::get('/employer/{username}/job/{id}/{candidate_id}/award', 'JobController@award');