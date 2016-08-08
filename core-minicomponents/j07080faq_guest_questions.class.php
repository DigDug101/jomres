<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j07080faq_guest_questions
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$faq_questions = get_showtime("faq_questions");
		
		if (is_null($faq_questions))
			$faq_questions = array();
		
		$faq_questions ['_JOMRES_FAQ_GUEST_CATEGORY_SOMETHING'][] = array (
			"question" => jr_gettext("_JOMRES_FAQ_GUEST_QUESTION_SOMEQUESTION","_JOMRES_FAQ_GUEST_QUESTION_SOMEQUESTION",false),
			"answer" => jr_gettext("_JOMRES_FAQ_GUEST_ANSWER_SOMEANSWER","_JOMRES_FAQ_GUEST_ANSWER_SOMEANSWER",false),
			);
		
		
		set_showtime("faq_questions" , $faq_questions );
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}