<?php

/**
 * Html
 *
 * @author     Stephen Michael <info@stephenmichael.net>
 * @copyright  Copyright (C), 2014 Stephen Michael
 * @version    1.0
 */

class Html {

	/**
	 * Function: ActionLink
	 * @param string $linkText - The actual display text for the link
	 * @param string $actionName - The Controller action/page
	 * @param string $controllerName - The Controller
	 * @param string $protocol - HTTP or HTTPS
	 * @param mixed $parameters - URL Parameters (Area, Parameter1, Parameter2, Parameter3)
	 * @param mixed $attributes - Html Attributes (Class, ID, Target, Disabled)
	 */
	public static function actionLink($linkText, $actionName, $controllerName = false, $protocol = false, $parameters = false, $attributes = false)
	{
		$theLink = '<a';
		$theLink .= isset($attributes['ID']) ? ' id="' . $attributes['ID'] . '"' : '';
		$theLink .= isset($attributes['Class']) ? ' class="' . $attributes['Class'] . '"' : '';
        $theLink .= isset($protocol) && $protocol == 'HTTPS' ? ' href="' . BASE_URL . '' : ' href="' . BASE_URL;
		$theLink .= isset($parameters['Area']) ? $parameters['Area'] . '/' : '';
		$theLink .= isset($controllerName) && $controllerName != 'home' ? $controllerName : '';
		$theLink .= isset($actionName) && $actionName != 'index' ? '/' . $actionName : '';
		$theLink .= isset($parameters['Parameter1']) ? '/' . $parameters['Parameter1'] : '';
		$theLink .= isset($parameters['Parameter2']) ? '/' . $parameters['Parameter2'] : '';
		$theLink .= isset($parameters['Parameter3']) ? '/' . $parameters['Parameter3'] : '';
		$theLink .= '"';
		$theLink .= isset($attributes['Disabled']) && $attributes['Disabled'] == TRUE ? ' disabled="disabled"' : '';
		$theLink .= isset($attributes['Target']) ? ' target="_' . $attributes['Target'] . '"' : '';
		$theLink .= '>';
		$theLink .= $linkText . '</a>';
		
		return $theLink;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * Function: ExternalLink
	 * @param string $linkText - The actual display text for the link
	 * @param string $linkUrl - The actual Link
	 * @param mixed $attributes - Html Attributes (Class, ID, Target, Disabled)
	 */
	public static function externalLink($linkText, $linkUrl, $attributes = false)
	{
		$theLink = '<a';
		$theLink .= isset($attributes['ID']) ? ' id="' . $attributes['ID'] . '"' : '';
		$theLink .= isset($attributes['Class']) ? ' class="' . $attributes['Class'] . '"' : '';
		$theLink .= ' href="' . $linkUrl . '"';
		$theLink .= isset($attributes['Disabled']) && $attributes['Disabled'] == TRUE ? ' disabled="disabled"' : '';
		$theLink .= isset($attributes['Target']) ? ' target="_' . $attributes['Target'] . '"' : '';
		$theLink .= '>';
		$theLink .= $linkText . '</a>';
		
		return $theLink;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * Function: fileLink
	 * @param string $linkText - The actual display text for the link
	 * @param string $linkUrl - The actual Link
	 * @param string $protocol - HTTP or HTTPS
	 * @param mixed $parameters - URL Parameters (Area, OptionalID, OptionalID2, OptionalID3)
	 * @param mixed $attributes - Html Attributes (Class, ID, Target, Disabled)
	 */
	public static function fileLink($linkText, $linkUrl, $protocol = false, $parameters = false, $attributes = false)
	{
		$theLink = '<a';
		$theLink .= isset($attributes['ID']) ? ' id="' . $attributes['ID'] . '"' : '';
		$theLink .= isset($attributes['Class']) ? ' class="' . $attributes['Class'] . '"' : '';
        $theLink .= isset($protocol) && $protocol == 'HTTPS' ? ' href="' . BASE_URL . '' : ' href="' . BASE_URL;
		$theLink .= isset($parameters['Area']) ? $parameters['Area'] . '/' : '';
		$theLink .= $linkUrl;
		$theLink .= '"';
		$theLink .= isset($attributes['Disabled']) && $attributes['Disabled'] == TRUE ? ' disabled="disabled"' : '';
		$theLink .= isset($attributes['Target']) ? ' target="_' . $attributes['Target'] . '"' : '';
		$theLink .= '>';
		$theLink .= $linkText . '</a>';
		
		return $theLink;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * Function: EmailLink
	 * @param string $linkText - The actual display text for the link
	 * @param string $email - The actual Link
	 * @param mixed $attributes - Html Attributes (Class, ID, Target, Disabled)
	 */
	public static function emailLink($linkText, $email, $attributes = false)
	{
		$theLink = '<a';
		$theLink .= isset($attributes['ID']) ? ' id="' . $attributes['ID'] . '"' : '';
		$theLink .= isset($attributes['Class']) ? ' class="' . $attributes['Class'] . '"' : '';
		$theLink .= ' href="mailto:' . $email . '"';
		$theLink .= isset($attributes['Disabled']) && $attributes['Disabled'] == TRUE ? ' disabled="disabled"' : '';
		$theLink .= isset($attributes['Target']) ? ' target="_' . $attributes['Target'] . '"' : '';
		$theLink .= '>';
		$theLink .= $linkText . '</a>';
		
		return $theLink;
	}

	// ------------------------------------------------------------------------
	
	
	/**
	 * FUNCTION: getNav
	 * @param string $url - The given URL
	 * @param mixed $viewData - An array of Data from the Controller
	 * @param mixed $attributes - Attributes (area)
	 */
	public static function getNav($url, $viewData = false, $attributes = false){
		$theNav = 'app/';
		$theNav .= !empty($attributes['area']) ? 'areas/' . $attributes['area'] . '/' : '';
		$theNav .= 'views/' . $url;
		$theNav .= '.php';

		require_once $theNav;
	}

	// ------------------------------------------------------------------------
	
}
