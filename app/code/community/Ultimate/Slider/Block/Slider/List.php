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
 * Slider list block
 *
 * @category    Ultimate
 * @package     Ultimate_Slider
 * @author Manikandan D
 */
class Ultimate_Slider_Block_Slider_List extends Mage_Core_Block_Template
{
    /**
     * initialize
     *
     * @access public
     * @author Manikandan D
     */
    public function _construct()
    {
        parent::_construct();
        $sliders = Mage::getResourceModel('ultimate_slider/slider_collection');
        $sliders->addFieldToFilter('status', 1);
        $sliders->setOrder('slider_id', 'asc');
        $this->setSliders($sliders);
    }

    public function retrieveData(){

        # Get full collection of data
        # ---------------------------
        # $sliders = Mage::getModel('ultimate_slider/slider')->getCollection()->getData()->getOrder('slider_id', 'asc');

        # Get data based on the given where clause
        # ----------------------------------------
        $sliders = Mage::getModel('ultimate_slider/slider')->getCollection()
                         ->addFieldToFilter('status', array("eq" => "1"))
                         ->addFieldToFilter('published_at', array("lteq" => date("Y-m-d")))
                         ->addOrder('published_at', 'desc')
                         ->getData();

        # SQL query for above code
        # ------------------------
        # SELECT * FROM ultimate_slider_slider WHERE `status` = 1 AND `published_at` <= CURDATE() 
        # ORDER BY `published_at` DESC;

        return $sliders;
        
    }

}
