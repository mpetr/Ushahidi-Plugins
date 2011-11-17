<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Sets up the hooks
 *
 * @author	   Petr Bartos
 * @author	   John Etherton
 * @package	   LocationHighlightLite
 */

class locationhighlightlite {

	/**
	 * Registers the main event add method
	 */
	public function __construct()
	{
		// Hook into routing
		Event::add('system.pre_controller', array($this, 'add'));
		$this->post_data = null; //initialize this for later use

	}

	/**
	 * Adds all the events to the main Ushahidi application
	 */
	public function add()
	{

	// Only add the events if we are on that controller
		if (Router::$controller == 'reports')
		{
			switch (Router::$method)
			{
				// Hook into the Report Add/Edit Form in Admin
				case 'edit':
					plugin::add_stylesheet('locationhighlightlite/media/css/locationhighlightlite');
					plugin::add_javascript('locationhighlightlite/media/js/locationhighlightlite');
					break;

				//Hook into frontend Submit View
				case 'submit':
					plugin::add_stylesheet('locationhighlightlite/media/css/locationhighlightlite');
					plugin::add_javascript('locationhighlightlite/media/js/locationhighlightlite');
					break;

				default:
					break;
			}//end of switch
		}//end of if reports
	}

}

new locationhighlightlite;
