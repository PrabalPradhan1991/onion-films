<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function getRegistration() {
		return view('user.register');
	}

	public function postRegistration() {
		$input = request()->all();
		
		$validator = \Validator::make($input, (new \App\UserDetailsModel)->setRule());

		if($validator->fails()) {
			session()->flash('friendly-error-msg', 'There are some validation errors');
			return redirect()->back()
							->withInput()
							->withErrors($validator);
		}

		$details = [];

		\DB::beginTransaction();

			$details['user'] = \App\User::create([
				'email'	=>	$input['email'],
				'password'	=>	bcrypt($input['password']),
				'name'	=>	$input['name'],
				'is_active'	=>	'no'
			]);

			$input['details']['user_id'] = $details['user']->id;
			$input['details']['group_id'] = 3;
			$details['details'] = \App\UserDetailsModel::create($input['details']);

		\DB::commit();

		session()->flash('success-msg', 'You have successfully registered');
		if($input['payment_type'] == 'pay_by_bank') {
			
			(new \App\Http\Controllers\CoreModules\Subscription\SubscriptionModel)->createSubscription($details['user']->id, 30, 'new_subscription', 'New subscription request');

			\Mail::to($details['user']->email)
			    ->send(new \App\Mail\WelcomeMail($details['user']->id));

			return redirect()->route('confirmation-page-get', $details['user']->id);
		}
		else {
			
			//go to paypal
		}

		return redirect()->back();
	}

	public function getConfirmationPage($user_id) {
		$details = HelperController::getUserDetails($user_id);

		return view('user.confirmation')
				->with('details', $details);
	}
}