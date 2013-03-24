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
?>

<div id="gallery">
	<div id="pictures">
		<img src="images/large/1.jpg" alt="" class="turn5right" />
		<img src="images/large/2.jpg" alt="" class="turn5left"/>
		<img src="images/large/3.jpg" alt="" class="turn2left"/>
		<img src="images/large/4.jpg" alt="" class="turn2right"/>
		<img src="images/large/5.jpg" alt="" class="turn5right"/>
	</div>

	<div class="grid_3 alpha" id="prev">
		<a href="#previous">&laquo;&laquo; Previous Picture</a>
	</div>
	<div class="grid_3 omega" id="next">
		<a href="#next">Next Picture &raquo;&raquo;</a>
	</div>
</div>