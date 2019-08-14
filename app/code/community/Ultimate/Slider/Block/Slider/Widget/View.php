<?php
/**
 * Ultimate_Slider extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Ultimate
 * @package        Ultimate_Slider
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Slider widget block
 *
 * @category    Ultimate
 * @package     Ultimate_Slider
 * @author      Ultimate Module Creator
 */
class Ultimate_Slider_Block_Slider_Widget_View extends Mage_Core_Block_Template implements
    Mage_Widget_Block_Interface
{
    protected $_htmlTemplate = 'ultimate_slider/slider/widget/view.phtml';

    /**
     * Prepare a for widget
     *
     * @access protected
     * @return Ultimate_Slider_Block_Slider_Widget_View
     * @author Ultimate Module Creator
     */
    protected function _beforeToHtml()
    {
        parent::_beforeToHtml();
        $sliderId = $this->getData('slider_id');
        if ($sliderId) {
            $slider = Mage::getModel('ultimate_slider/slider')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($sliderId);
            if ($slider->getStatus()) {
                $this->setCurrentSlider($slider);
                $this->setTemplate($this->_htmlTemplate);
            }
        }
        return $this;
    }
}
