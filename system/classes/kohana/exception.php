<?php defined('SYSPATH') or die('No direct access');
/**
 * Kohana exception class. Converts exceptions into HTML messages.
 * 
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Kohana_Exception_Core extends Exception {

	/**
	 * Creates a new translated exception.
	 * 
	 * @param   string   error message
	 * @param   array    translation variables
	 * @return  void
	 */
	public function __construct($message, array $variables = NULL)
	{
		// Set the message
		$message = __($message, $variables);

		// Pass the message to the parent
		parent::__construct($message);
	}

} // End Kohana_Exception
