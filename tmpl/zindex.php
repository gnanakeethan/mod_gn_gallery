<?php

/**
 * Module Gnanam Gallery - Multi-Purpose Carousel Module by Gnanakeethan
 * 
 * @package	  ModuleGNGallery
 * @author    Gnanakeethan Balasubramaniam <gnanakeethan@gmail.com>
 * @copyright (c) 2013 Gnanakeethan Balasubramaniam
 * @license   GNU/GPL v3 or Later.
 */
$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_gn_gallery/assets/css/zindex/main.css');
$doc->addScript('modules/mod_gn_gallery/assets/js/jquery/jquery-1.3.2.min.js');
$doc->addScript('modules/mod_gn_gallery/assets/js/zindex/zindex.js');


switch ($this->config['zindex']['mode']) {
	case 'directory_based': {
			echo '<div id="gallery"><div id="pictures">';

			$types = array(
				'jpg', 'png', 'gif', 'JPG', 'PNG', 'GIF'
			);
			$folder = JPATH_ROOT . '/images/' .$this->config['zindex']['directory']['root'];
			$it = new RecursiveDirectoryIterator($folder);
			$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ($files as $file) {
				if (is_file($file)) {
					$pos = strrpos($file, 'images');
					$str = substr($file, $pos);
					$ext = JFile::getExt($file);
					foreach ($types as $type) {
						if ($ext == $type) {
							$no = rand(2, 5);
							$side = rand(1,2);
							if($side=1){
								$side="right";
							}
							else 
							{
								$side="left";
							}
							echo '<img src="' . $str . '" alt="" class="zindex_slider turn' . $no .$side. '" />';
						}
					}
				}
			}
			echo '</div><div id="prev"><a href="#previous">&laquo;&laquo; 
				Previous Picture</a></div><div id="next"><a href="#next">
				Next Picture &raquo;&raquo;</a></div></div>';
		}
		break;
	default : echo 'Default Case Zindex';
}
?>
