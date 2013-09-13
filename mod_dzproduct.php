<?php
/**
 * @version     1.0.0
 * @package     mod_dzproduct
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <support@dezign.vn> - dezign.vn
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';
require_once JPATH_SITE . '/components/com_dzproduct/helpers/dzproduct.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Merge params with component params
$comParams = JComponentHelper::getParams('com_dzproduct');
$comParams->merge(clone $params);
$params->merge($comParams);

$products = modDZProductHelper::getProducts($params);

// Load the component language
JFactory::getLanguage()->load('com_dzproduct', JPATH_SITE);

// Display template
require JModuleHelper::getLayoutPath('mod_dzproduct', $params->get('layout', 'default'));
