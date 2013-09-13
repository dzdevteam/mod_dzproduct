<?php
/**
 * @version     1.0.0
 * @package     mod_dzproduct
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <support@dezign.vn> - dezign.vn
 */
 
// no direct access
defined('_JEXEC') or die;
?>
<div class="dzproduct-module<?php echo $moduleclass_sfx; ?>">
    <div class="product-grid">    
        <?php
            $column = $params->get('category_number_of_columns', 3) ;
            $length = $params->get('category_item_intro_text_length', 180);
        ?>        
        <?php foreach(array_chunk($products,$column) as $row) :?>
        <div class="row-fluid">
            <?php foreach ($row as $product) : ?>    
            <div class="span<?php echo 12/$column;?>">
                <div class="product-item">
                <a href="<?php echo $product->link; ?>" class="product-link">
                    <?php if ($params->get('category_show_item_intro_image')) : ?>
                    <div class="product-image"><img src="<?php echo JUri::root().'/'.$product->images['intro'];?>" alt="<?php echo $product->title;?>"/></div>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_title', 1)) : ?>
                    <h3 class="product-title"><?php echo $product->title;?></h3>
                    <?php endif; ?>
                </a>
                    <?php if ($params->get('category_show_item_category', 1)) : ?>
                    <div class="product-category"><?php echo $product->catid_title;?></div>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_fields', 1)) : ?>
                    <div class="product-info">
                        <ul>
                            <?php foreach ($product->fields as $field) { ?>
                            <?php $tag = JFactory::getLanguage()->getTag(); ?>
                            <li><span><?php echo $field['dname'][$tag]; ?>: <?php echo $field['value']; ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_intro_text', 1)) : ?>
                    <div class="product-intro">
                        <?php echo mb_substr(strip_tags($product->short_desc),0,$length, "UTF-8");?>...
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_price', 1)) : ?>
                    <div class="product-price">
                        <?php if($product->saleoff) :?>
                            <span><?php echo $product->saleoff;?></span><em><?php echo $product->price;?></em>
                        <?php else :?>
                            <span><?php echo $product->price;?></span>
                        <?php endif;?>                            
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_readmore_btn', 1)) : ?>
                    <a href="<?php echo $product->link; ?>">View more</a>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_saleoff_label', 1)) : ?>
                    <div class="product-labels">
                    <?php if($product->saleoff) :?>
                    <span class="product-saleoff">
                        -<?php echo (100*($product->price - $product->saleoff)/$product->price) ;?>%
                    </span>
                    <?php endif;?>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_featured_label', 1)) : ?>
                    <span class="product-featured">
                        <?php echo $product->featured; ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_new_arrival_label', 1)) : ?>
                    <span class="product-new">
                        <?php echo $product->new_arrival; ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if ($params->get('category_show_item_availability_label', 1)) : ?>
                    <span class="product-avail">
                        <?php echo DZProductHelper::availabilityText($product->availability); ?>
                    </span>
                    <?php endif; ?>
                    </div>
                
                </div>                
               
            </div>
            <?php endforeach; ?>
        
        </div>
        <?php endforeach; ?>

        
    </div>
</div>