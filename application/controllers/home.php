<?php

class Home_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();

		$this->filter('before', 'sow_exists')->only(array('step2', 'step2_post', 'step3', 'step3_post',
																										  'step4', 'step4_post', 'step5', 'step5_post',
																										  'step6', 'step6_post', 'step7',

																										  'doc', 'print'));

		$this->filter('after', 'doc')->only(array('doc'));
	}

	public function action_step1() {
		$view = View::make('home.step1');
		$view->templates = Template::where('visible', '=', true)->get();

		$this->layout->content = $view;
	}

	public function action_step1_post() {
		$validation = Validator::make(Input::all(), array('author_email' => 'required|email'));

    if ($validation->fails()) {
    	Session::flash('alert-error', 'Please enter a valid email address to continue.');
    	return $this->action_step1();
    }

    if (!preg_match('/.gov$/', Input::get('author_email'))) {
	    Session::flash('alert-error', 'This system is designed for Federal Employee use only. By submitting a non-governmental address, you agree to use this system at your own risk.');
    }

		$sow = Sow::create(array('author_email' => Input::get('author_email'),
														 'based_on_template_id' => Input::get('template_id')));

		return Redirect::to(route('step2', array($sow->uuid)));
	}

	public function action_step2() {
		$view = View::make('home.step2');
		$view->sow = Config::get('sow');
		$this->layout->content = $view;
	}

	public function action_step2_post() {
		$sow = Config::get('sow');
		$background_section = $sow->sow_sections()->where('section_type', '=', 'Background & Scope')
																							->first();

		if ($background_section) {
			$background_section->body = Input::get('body');
			$background_section->save();
		} else {
			SowSection::create(array('sow_id' => $sow->id,
															 'section_type' => 'Background & Scope',
															 'body' => Input::get('body')));
		}

		return Redirect::to(route('step3', array($sow->uuid)));
	}

	public function action_step3() {
		$view = View::make('home.step3');
		$view->sow = Config::get('sow');
		$view->deliverables = TemplateSection::where('template_id', '=', $view->sow->based_on_template_id)
																				 ->where('section_type', '=', 'Deliverable')
																				 ->get();

		$view->custom_deliverables = $view->sow->sow_sections()->where('section_type', '=', 'Deliverable')
																												   ->where_null('based_on_template_section_id')
																												   ->get();
		$this->layout->content = $view;
	}

	public function action_step3_post() {
		$sow = Config::get('sow');
		foreach ($sow->deliverables() as $deliverable) { $deliverable->delete(); }

		if (Input::get('deliverables')) {
			$i = 0;
			$deliverable_dates = Input::get('deliverable_dates');
			foreach(Input::get('deliverables') as $deliverable_id) {
				$deliverable = TemplateSection::find($deliverable_id);
				SowSection::create(array('sow_id' => $sow->id,
																 'section_type' => 'Deliverable',
																 'based_on_template_section_id' => $deliverable->id,
																 'display_order' => $i));

				$sow->add_variable("DELIVERABLE_" . Sow::variablize($deliverable->title) . "_DUE", $deliverable_dates[$i]);
				++$i;
			}
		}

		if (Input::get('custom_deliverables')) {
			$i = 0;
			$custom_deliverable_dates = Input::get('custom_deliverable_dates');
			foreach(Input::get('custom_deliverables') as $custom_deliverable_name) {
				$custom_bodies = Input::get("custom_deliverable_bodies");
				$body = $custom_bodies[$i];
				if (!$body) $body = "";
				SowSection::create(array('sow_id' => $sow->id,
																 'section_type' => 'Deliverable',
																 'title' => $custom_deliverable_name,
																 'display_order' => $i,
																 'body' => $body));

				$sow->add_variable("DELIVERABLE_" . Sow::variablize($custom_deliverable_name) . "_DUE", $custom_deliverable_dates[$i]);
				++$i;
			}
		}

		$sow->save();
		return Redirect::to(route('step4', array($sow->uuid)));
	}

	public function action_step4() {
		$view = View::make('home.step4');
		$view->sow = Config::get('sow');
		$view->requirements = TemplateSection::where('template_id', '=', $view->sow->based_on_template_id)
																				 ->where('section_type', '=', 'Requirement')
																				 ->get();

		$view->custom_requirements = $view->sow->sow_sections()->where('section_type', '=', 'Requirement')
																												   ->where_null('based_on_template_section_id')
																												   ->get();

		$this->layout->content = $view;
	}

	public function action_step4_post() {
		$sow = Config::get('sow');
		foreach ($sow->requirements() as $requirement) { $requirement->delete(); }

		if (Input::get('requirements')) {
			$i = 0;
			foreach(Input::get('requirements') as $requirement_id) {
				SowSection::create(array('sow_id' => $sow->id,
																 'section_type' => 'Requirement',
																 'based_on_template_section_id' => $requirement_id,
																 'display_order' => $i));
				++$i;
			}
		}

		if (Input::get('custom_requirements')) {
			$i = 0;
			foreach(Input::get('custom_requirements') as $custom_requirement_name) {
				$custom_bodies = Input::get("custom_requirement_bodies");
				$body = $custom_bodies[$i];
				if (!$body) $body = "";
				SowSection::create(array('sow_id' => $sow->id,
																 'section_type' => 'Requirement',
																 'title' => $custom_requirement_name,
																 'display_order' => $i,
																 'body' => $body));
				++$i;
			}
		}

		return Redirect::to(route('step5', array($sow->uuid)));
	}

	public function action_step5() {
		$view = View::make('home.step5');
		$view->sow = Config::get('sow');
		$this->layout->content = $view;
	}

	public function action_step5_post() {
		$sow = Config::get('sow');
		$sow->title = Input::get('title');
		$sow->body = false;

		if (Input::get('custom_sections')) {
			foreach(Input::get('custom_sections') as $key => $val) {
				$section = SowSection::find($key);
				$section->body = $val;
				$section->save();
			}
		}

		if (Input::get('variables')) {
			foreach(Input::get('variables') as $key => $val) {
				$sow->add_variable($key, $val);
			}
		}

		$sow->save();
		return Redirect::to(route('step6', array($sow->uuid)));
	}


	public function action_step6() {
		$view = View::make('home.step6');
		$view->sow = Config::get('sow');
		$this->layout->content = $view;
	}

	public function action_step6_post() {
		$sow = Config::get('sow');
		$sow->body = Input::get('body');
		$sow->save();

		Session::flash('alert-success', "<strong>Congrats, you're all done!</strong> We're emailing your SOW to the address you provided.");

    SowMailer::send('SOW_COMPLETED', array('sow_id' => $sow->id));

		return Redirect::to(route('step7', array($sow->uuid)));
	}

	public function action_step7() {
		$view = View::make('home.step7');
		$view->sow = Config::get('sow');
		$this->layout->content = $view;
	}

	public function action_doc() {
		$sow = Config::get('sow');
		return View::make('partials.doc')->with('sow', $sow);
	}

	public function action_print() {
		$view = View::make('home.print');
		$view->sow = Config::get('sow');
		return $view;
	}

	public function action_view($read_only_uuid) {
		$view = View::make('home.view');
		$view->sow = Sow::where('read_only_uuid', '=', $read_only_uuid)->first();
		$this->layout->content = $view;
	}

}

Route::filter('sow_exists', function()
{
	// Request::$route->parameters[0] is a shitty hack to get the $id passed in the route.
	$uuid = Request::$route->parameters[0];
	$sow = Sow::where('uuid', '=', $uuid)->first();
	if (!$sow) return Redirect::to('/');

	// Pass the checkin to our action
	Config::set('sow', $sow);
});

Route::filter('doc', function($response) {
	$response->header('Content-type', 'application/vnd.ms-word');
	$response->header('Content-Disposition', 'attachment;Filename='.Config::get('sow')->title.'.doc');
});