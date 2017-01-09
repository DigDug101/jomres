<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.25
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j07070faq_admin_questions
{
    public function __construct()
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

        $kb = jomres_singleton_abstract::getInstance('jomres_knowledgebase');

        //intro
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_INTRODUCTION'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_WHATISJOMRES', '_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_WHATISJOMRES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_WHATISJOMRES', '_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_WHATISJOMRES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_INTRODUCTION'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_FIRSTTHINGSFIRST', '_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_FIRSTTHINGSFIRST', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_FIRSTTHINGSFIRST', '_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_FIRSTTHINGSFIRST', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_INTRODUCTION'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_USERSADD', '_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_USERSADD', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_USERSADD', '_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_USERSADD', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_INTRODUCTION'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_PROFILES', '_JOMRES_FAQ_ADMIN_QUESTION_INTRODUCTION_PROFILES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_PROFILES', '_JOMRES_FAQ_ADMIN_ANSWER_INTRODUCTION_PROFILES', false),
            );

        // Plugins
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PLUGINS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS', '_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS', '_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PLUGINS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS_IONCUBE', '_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS_IONCUBE', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS_IONCUBE', '_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS_IONCUBE', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PLUGINS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS_INSTALLATION', '_JOMRES_FAQ_ADMIN_QUESTION_GENERAL_PLUGINS_INSTALLATION', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS_INSTALLATION', '_JOMRES_FAQ_ADMIN_ANSWER_GENERAL_PLUGINS_INSTALLATION', false),
            );

        // Localisation
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_LOCALISATION'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_LOCALISATION_INTRO', '_JOMRES_FAQ_ADMIN_QUESTION_LOCALISATION_INTRO', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_LOCALISATION_INTRO', '_JOMRES_FAQ_ADMIN_ANSWER_LOCALISATION_INTRO', false),
            );

        //properties
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_ADDPROPERTIES', '_JOMRES_FAQ_ADMIN_QUESTION_ADDPROPERTIES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_ADDPROPERTIES', '_JOMRES_FAQ_ADMIN_ANSWER_ADDPROPERTIES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_PROPERTIES_NUMBER', '_JOMRES_FAQ_ADMIN_QUESTION_PROPERTIES_NUMBER', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_PROPERTIES_NUMBER', '_JOMRES_FAQ_ADMIN_ANSWER_PROPERTIES_NUMBER', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_IMPORTPROPERTIES', '_JOMRES_FAQ_ADMIN_QUESTION_IMPORTPROPERTIES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_IMPORTPROPERTIES', '_JOMRES_FAQ_ADMIN_ANSWER_IMPORTPROPERTIES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_IMPORTBOOKINGS', '_JOMRES_FAQ_ADMIN_QUESTION_IMPORTBOOKINGS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_IMPORTBOOKINGS', '_JOMRES_FAQ_ADMIN_ANSWER_IMPORTBOOKINGS', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_EMAILTEMPLATES', '_JOMRES_FAQ_ADMIN_QUESTION_EMAILTEMPLATES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_EMAILTEMPLATES', '_JOMRES_FAQ_ADMIN_ANSWER_EMAILTEMPLATES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_CURRENCIES_SETUP', '_JOMRES_FAQ_ADMIN_QUESTION_CURRENCIES_SETUP', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_CURRENCIES_SETUP', '_JOMRES_FAQ_ADMIN_ANSWER_CURRENCIES_SETUP', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PROPERTIES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_CURRENCIES', '_JOMRES_FAQ_ADMIN_QUESTION_CURRENCIES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_CURRENCIES', '_JOMRES_FAQ_ADMIN_ANSWER_CURRENCIES', false),
            );

        //payments
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PAYMENTS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TAKEPAYMENTS', '_JOMRES_FAQ_ADMIN_QUESTION_TAKEPAYMENTS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TAKEPAYMENTS', '_JOMRES_FAQ_ADMIN_ANSWER_TAKEPAYMENTS', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PAYMENTS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_WHICHGATEWAY', '_JOMRES_FAQ_ADMIN_QUESTION_WHICHGATEWAY', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_WHICHGATEWAY', '_JOMRES_FAQ_ADMIN_ANSWER_WHICHGATEWAY', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PAYMENTS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_PAYMENTACCOUNTS', '_JOMRES_FAQ_ADMIN_QUESTION_PAYMENTACCOUNTS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_PAYMENTACCOUNTS', '_JOMRES_FAQ_ADMIN_ANSWER_PAYMENTACCOUNTS', false),
            );

        // Site Structure
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_INTRO', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_INTRO', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_INTRO', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_INTRO', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYTYPES', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYTYPES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYTYPES', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYTYPES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYFEATURES', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYFEATURES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYFEATURES', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYFEATURES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYFEATURECATEGORIES', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_PROPERTYFEATURECATEGORIES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYFEATURECATEGORIES', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_PROPERTYFEATURECATEGORIES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_ROOMFEATURES', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_ROOMFEATURES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_ROOMFEATURES', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_ROOMFEATURES', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_SITESTRUCTURE'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_COUNTRIES', '_JOMRES_FAQ_ADMIN_QUESTION_SITESTRUCTURE_COUNTRIES', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_COUNTRIES', '_JOMRES_FAQ_ADMIN_ANSWER_SITESTRUCTURE_COUNTRIES', false),
            );

        // Tours
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_INTRO', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_INTRO', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_INTRO', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_INTRO', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_HOWTOSELL', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_HOWTOSELL', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_HOWTOSELL', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_HOWTOSELL', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_WHATISJINTOUR', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_WHATISJINTOUR', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_WHATISJINTOUR', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_WHATISJINTOUR', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_SAMEBOOKING', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_SAMEBOOKING', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_SAMEBOOKING', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_SAMEBOOKING', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_STANDALONETOURS', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_STANDALONETOURS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_STANDALONETOURS', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_STANDALONETOURS', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TOURS'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TOURS_GLOBALTOURS', '_JOMRES_FAQ_ADMIN_QUESTION_TOURS_GLOBALTOURS', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TOURS_GLOBALTOURS', '_JOMRES_FAQ_ADMIN_ANSWER_TOURS_GLOBALTOURS', false),
            );

        //troubleshooting
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TROUBLESHOOTING'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TROUBLESHOOTING_EMAIL', '_JOMRES_FAQ_ADMIN_QUESTION_TROUBLESHOOTING_EMAIL', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TROUBLESHOOTING_EMAIL', '_JOMRES_FAQ_ADMIN_ANSWER_TROUBLESHOOTING_EMAIL', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_TROUBLESHOOTING'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_TROUBLESHOOTING_NOGATEWAY', '_JOMRES_FAQ_ADMIN_QUESTION_TROUBLESHOOTING_NOGATEWAY', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_TROUBLESHOOTING_NOGATEWAY', '_JOMRES_FAQ_ADMIN_ANSWER_TROUBLESHOOTING_NOGATEWAY', false),
            );

        //purchasing jomres
        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PURCHASINGJOMRES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_FORCEDTOSUBSCRIBE', '_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_FORCEDTOSUBSCRIBE', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_FORCEDTOSUBSCRIBE', '_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_FORCEDTOSUBSCRIBE', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PURCHASINGJOMRES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_EXPIRED', '_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_EXPIRED', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_EXPIRED', '_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_EXPIRED', false),
            );

        $kb->admin_faq['_JOMRES_FAQ_ADMIN_CATEGORY_PURCHASINGJOMRES'][] = array(
            'question' => jr_gettext('_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_SOFTWARELICENSE', '_JOMRES_FAQ_ADMIN_QUESTION_PURCHASINGJOMRES_SOFTWARELICENSE', false),
            'answer' => jr_gettext('_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_SOFTWARELICENSE', '_JOMRES_FAQ_ADMIN_ANSWER_PURCHASINGJOMRES_SOFTWARELICENSE', false),
            );
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
