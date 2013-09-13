<?php
// no direct access
defined('_JEXEC') or die;

abstract class modDZProductHelper
{
    protected static $products = null;
    
    public static function getProducts($params)
    {
        if (static::$products == null) {
            // Get the model
            JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_dzproduct/models/');
            $model = JModelLegacy::getInstance('Category', 'DZProductModel', array('ignore_request' => true));
            
            if ($model) {
                $model->setState($params);
                
                // Set request
                $model->setState('filter.catid', $params->get('catid', 'root'));
                $model->setState('filter.display_items', $params->get('display_items', 'all'));
                $types = $params->get('special_types', array('featured'), 'array');
                foreach ($types as $type) {
                    $model->setState('filter.' . $type, true);
                }
                
                // Ordering
                $model->setState('list.ordering', $params->get('category_order_by', 'created'));
                $model->setState('list.direction', $params->get('category_order_direction', 'DESC')); 
                
                // Get products
                static::$products = $model->getItems();
            }
        }
        
        return static::$products;
    }
}
