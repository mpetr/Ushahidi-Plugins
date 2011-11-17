<?php defined('SYSPATH') or die('No direct script access.');
/**
 * This controller is used to add/ remove admin areas for the Location Hightlight plugin
 *
 */


class LocationHighlightLite_settings_Controller extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->template->this_page = 'manage';

		// If user doesn't have access, redirect to dashboard
		if ( ! admin::permissions($this->user, "manage"))
		{
			url::redirect(url::site().'admin/dashboard');
		}
	}

	/*
	Add Edit Layers (KML, KMZ, GeoRSS)
	*/
	function index()
	{
		$this->template->content = new View('locationhighlightlite/settings');

		// setup and initialize form field names
		$form = array
		(
			'file'  => '',
		);

		// copy the form as errors, so the errors will be stored with keys corresponding to the form field names
		$errors = $form;
		$form_error = FALSE;
		$form_saved = FALSE;

		// check, has the form been submitted, if so, setup validation
		if ($_POST)
		{

			//echo Kohana::debug($_POST);die();
			// Instantiate Validation, use $post, so we don't overwrite $_POST fields with our own things
			$post = Validation::factory(array_merge($_POST,$_FILES));
			 //	 Add some filters
			$post->pre_filter('trim', TRUE);
			// Add some rules, the input field, followed by a list of checks, carried out in order
			$post->add_rules('file', 'upload::valid','upload::type[kml]', 'upload::required');

			// Test to see if things passed the rule checks
			if ($post->validate())
			{
				// Upload KML
				$path_info = upload::save("file", "LocationHighlightLite.kml");

				$form_saved = TRUE;
				$form_action = strtoupper(Kohana::lang('ui_admin.added_edited'));
			}
			// No! We have validation errors, we need to show the form again, with the errors
			else
			{
				// repopulate the form fields
				$form = arr::overwrite($form, $post->as_array());

			   // populate the error fields, if any
				$errors = arr::overwrite($errors, $post->errors('layer'));
				$form_error = TRUE;
			}
		}// $_POST



		$this->template->content->errors = $errors;
		$this->template->content->form_error = $form_error;
		$this->template->content->form_saved = $form_saved;

	}





}//end class
