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

class j06002edit_resource
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true;

			return;
			}

		$mrConfig        = getPropertySpecificSettings();
		$siteConfig      = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig        = $siteConfig->get();
		$defaultProperty = getDefaultProperty();
		$output          = array ();
		$max_max_people	 = 100;
		
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->gather_data( $defaultProperty );
		
		if ( $mrConfig[ 'singleRoomProperty' ] == "0" )
			{
			$roomUid = intval( jomresGetParam( $_REQUEST, 'roomUid', 0 ) );
			$clone   = intval( jomresGetParam( $_REQUEST, 'clone', 0 ) );

			if ( $jrConfig[ 'useGlobalRoomTypes' ] == "1" ) $roomTypeSearchParameter = "0";
			else
			$roomTypeSearchParameter = $defaultProperty;
			$room_features_uid    = "";
			$room_name            = "";
			$room_number          = "";
			$room_floor           = "";
			$room_classes_uid     = false;
			$max_people           = "10";
			if ( $roomUid )
				{

				$query    = "SELECT room_classes_uid,room_features_uid,room_name,room_number,room_floor,max_people,singleperson_suppliment FROM #__jomres_rooms WHERE  room_uid  = '" . (int) $roomUid . "' AND propertys_uid = '" . (int) $defaultProperty . "'";
				$roomList = doSelectSql( $query );
				foreach ( $roomList as $room )
					{
					$room_classes_uid        = $room->room_classes_uid;
					$room_features_uid       = $room->room_features_uid;
					$room_name               = stripslashes( $room->room_name );
					$room_number             = stripslashes( $room->room_number );
					$room_floor              = stripslashes( $room->room_floor );
					$max_people              = $room->max_people;
					$singleperson_suppliment = $room->singleperson_suppliment;

					}
				}
			if ( $clone ) $roomUid = 0;

			$classOptions[ ] = jomresHTML::makeOption( '', "" );
			foreach ( $basic_property_details->this_property_room_classes as $key => $roomClass )
				{
				if (!is_null($roomClass))
					$classOptions[ ] = jomresHTML::makeOption( $key, $roomClass[ 'abbv' ] );
				}
			$classDropDownList      = jomresHTML::selectList( $classOptions, 'roomClasses', 'class="inputbox" size="1"', 'value', 'text', $room_classes_uid );
			
			$ptype_id = $basic_property_details->ptype_id;

			if ( $roomUid ) 
				$roomFeaturesArray = explode( ",", $room_features_uid );
			else
				$roomFeaturesArray = array ();
			$featureListTxt   = "";
			$query            = "SELECT room_features_uid,feature_description,ptype_xref FROM #__jomres_room_features WHERE property_uid = '" . (int) $defaultProperty . "' OR property_uid = '0' ORDER BY feature_description ";
			$roomFeaturesList = doSelectSql( $query );
			foreach ( $roomFeaturesList as $roomFeature )
				{
				$checked = "";
				if ($roomFeature->ptype_xref)
					{
					$ptype_xref=unserialize($roomFeature->ptype_xref);
					if (in_array($ptype_id, $ptype_xref))
						{
						if ( in_array( ( $roomFeature->room_features_uid ), $roomFeaturesArray ) ) 	
							$checked = "checked";
						$featureListTxt .= "<input type=\"checkbox\" name=\"features_list[]\" value=\"" . ( $roomFeature->room_features_uid ) . "\" " . $checked . " >" . jr_gettext( '_JOMRES_CUSTOMTEXT_ROOMFEATURE_DESCRIPTION' . (int) $roomFeature->room_features_uid, stripslashes( $roomFeature->feature_description ) ,false , false ) . "<br>";
						}
					}
				else
					{
					if ( in_array( ( $roomFeature->room_features_uid ), $roomFeaturesArray ) ) 	
							$checked = "checked";
						$featureListTxt .= "<input type=\"checkbox\" name=\"features_list[]\" value=\"" . ( $roomFeature->room_features_uid ) . "\" " . $checked . " >" . jr_gettext( '_JOMRES_CUSTOMTEXT_ROOMFEATURE_DESCRIPTION' . (int) $roomFeature->room_features_uid, stripslashes( $roomFeature->feature_description ) ,false , false ) . "<br>";
					}
				}

			$roomImageLocation = '<img src="' . getImageForProperty( "room", $defaultProperty, (int) $roomUid ) . '" />';
			
			$max_people_dropdown = jomresHTML::integerSelectList( 1,$max_max_people,1, 'max_people','', $max_people );

			$output[ 'ROOMUID' ]      		= $roomUid;
			$output[ 'TYPEDROPDOWN' ] 		= $classDropDownList;
			$output[ 'ROOMNAME' ]     		= $room_name;
			$output[ 'ROOMNUMBER' ]   		= $room_number;
			$output[ 'ROOMFLOOR' ]    		= $room_floor;
			$output[ 'MAXPEOPLE_DROPDOWN' ] = $max_people_dropdown;
			$output[ 'FEATURES' ]     		= $featureListTxt;
			$output[ 'SUPPLIMENT' ]   		= $singleperson_suppliment;

			$output[ 'HTYPE' ]           = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE' , false , false );
			$output[ 'HNAME' ]           = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME' , false , false);
			$output[ 'HNUMBER' ]         = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER' , false , false);
			$output[ 'HFLOOR' ]          = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR' , false , false);
			$output[ 'HMAXPEOPLE' ]      = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE' , false , false);
			$output[ 'HFEATURES' ]       = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES' , false , false);
			$output[ 'HSUPPLIMENT' ]     = jr_gettext( '_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON', '_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON' , false , false);
			$output[ 'SUPPLIMENT_DESC' ] = jr_gettext( '_JOMRES_COM_SPS_EDITROOM_DESC', '_JOMRES_COM_SPS_EDITROOM_DESC' , false , false);

			$output[ 'MOSCONFIGLIVESITE' ] = get_showtime( 'live_site' );

			$output[ 'IMAGE' ] = $roomImageLocation;

			$delimg_rows = array ();
			if ( file_exists( JOMRES_IMAGELOCATION_ABSPATH . $defaultProperty . "_room_" . $roomUid . ".jpg" ) )
				{
				$output[ 'DELETEIMAGE' ] = '<a href="' . jomresURL( JOMRES_SITEPAGE_URL . "&task=dropImage&imageType=room&itemUid=$output[ROOMUID]" ) . '">' . jr_gettext( '_JOMRES_FILE_DELETE', '_JOMRES_FILE_DELETE' ) . '</a>';

				$delimg                       = array ();
				$delimg[ 'DELETEIMAGE_LINK' ] = jomresURL( JOMRES_SITEPAGE_URL . "&task=dropImage&imageType=room&itemUid=$output[ROOMUID]" );
				$delimg[ 'DELETEIMAGE_TEXT' ] = jr_gettext( '_JOMRES_FILE_DELETE', '_JOMRES_FILE_DELETE' );
				$delimg[ 'IMAGE' ]            = $output[ 'IMAGE' ];
				$delimg_rows[ ]               = $delimg;
				}

			$output[ 'UPLOADIMAGE' ] = jr_gettext( '_JOMRES_UPLOAD_IMAGE', '_JOMRES_UPLOAD_IMAGE', false );
			$output[ 'PAGETITLE' ]   = jr_gettext( '_JOMRES_COM_MR_EB_HROOM_DETAILS', '_JOMRES_COM_MR_EB_HROOM_DETAILS',false );

			$cancelText = jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL', false );
			$deleteText = jr_gettext( '_JOMRES_COM_MR_ROOM_DELETE', '_JOMRES_COM_MR_ROOM_DELETE', false );
			$saveText   = jr_gettext( '_JOMRES_COM_MR_SAVE', '_JOMRES_COM_MR_SAVE', false );
			$jrtbar     = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
			$jrtb       = $jrtbar->startTable();
			
			$jrtb .= $jrtbar->toolbarItem( 'cancel', jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resources" ), $cancelText );
			$jrtb .= $jrtbar->toolbarItem( 'save', '', $saveText, true, 'save_resource' );
			//if ( $clone < 1 ) 
				//$jrtb .= $jrtbar->toolbarItem( 'delete', jomresURL( JOMRES_SITEPAGE_URL . "&task=delete_resource" . "&roomUid=" . $roomUid ), $deleteText );
			$jrtb .= $jrtbar->endTable();
			$output[ 'JOMRESTOOLBAR' ] = $jrtb;

			$pageoutput[ ] = $output;
			$tmpl          = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'edit_resource.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'delimg_rows', $delimg_rows );
			$tmpl->displayParsedTemplate();
			}
		else
			{
			$output     = array ();
			$pageoutput = array ();

			$query                     = "SELECT room_classes_uid FROM #__jomres_rooms WHERE propertys_uid = '" . (int) $defaultProperty . "'";
			$original_room_classes_uid = doSelectSql( $query, 1 );
			$query                     = "SELECT max_people FROM #__jomres_rooms WHERE propertys_uid = '" . (int) $defaultProperty . "'";
			$max_people                = doSelectSql( $query, 1 );

			$query        = "SELECT a.room_classes_uid, 
									a.room_class_abbv,
									b.propertytype_id
								FROM #__jomres_room_classes a 
								CROSS JOIN #__jomres_roomtypes_propertytypes_xref b 
								ON a.room_classes_uid = b.roomtype_id 
								WHERE a.property_uid = 0 AND a.srp_only = 1 AND b.propertytype_id = ".$basic_property_details->ptype_id." 
								ORDER BY room_class_abbv ";
			$roomClasses  = doSelectSql( $query );
			
			$dropDownList = "<select class=\"inputbox\" name=\"roomClass\">";
			foreach ( $roomClasses as $roomClass )
				{
				$selected = "";
				if ( $roomClass->room_classes_uid == $original_room_classes_uid ) $selected = ' selected="selected"';
				$room_classes_uid = $roomClass->room_classes_uid;
				$room_class_abbv  = $roomClass->room_class_abbv;
				$dropDownList .= "<option value=\"" . $room_classes_uid . "\" " . $selected . " >" . $room_class_abbv . "</option>";

				}
			$dropDownList .= "</select>";
			
			$max_people_dropdown = jomresHTML::integerSelectList( 1,$max_max_people,1, 'max_people','', $max_people );

			$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
			$jrtb   = $jrtbar->startTable();
			
			$jrtb .= $jrtbar->toolbarItem( 'cancel', jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resources" ), $cancelText );
			$jrtb .= $jrtbar->toolbarItem( 'save', '', $saveText, true, 'save_resource' );
			$jrtb .= $jrtbar->endTable();

			$output[ 'PAGETITLE' ]   = jr_gettext( '_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV_SRP', '_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV_SRP' );
			$output[ '_JOMRES_COM_MR_VRCT_PROPERTY_TYPE_INFO' ]    = jr_gettext( '_JOMRES_COM_MR_VRCT_PROPERTY_TYPE_INFO_SRP', '_JOMRES_COM_MR_VRCT_PROPERTY_TYPE_INFO_SRP' );
			$output[ '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE' );
			$output[ 'DROPDOWNLIST' ]                              = $dropDownList;
			$output[ 'JOMRESTOOLBAR' ]                             = $jrtb;
			$output[ 'MAXPEOPLE_DROPDOWN' ]                        = $max_people_dropdown;

			$pageoutput[ ] = $output;
			$tmpl          = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'edit_SRP_propertytype.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->displayParsedTemplate();
			}
		}

	function touch_template_language()
		{
		$output = array ();

		$output[ ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN', '_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN' );
		$output[ ] = jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_ROOM_DELETE', '_JOMRES_COM_MR_ROOM_DELETE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_SAVE', '_JOMRES_COM_MR_SAVE' );
		$output[ ] = jr_gettext( '_JOMRES_UPLOAD_IMAGE', '_JOMRES_UPLOAD_IMAGE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_TAB_ROOM', '_JOMRES_COM_MR_VRCT_TAB_ROOM' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

?>