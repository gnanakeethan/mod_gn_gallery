<?php

/**
 * Module Gnanam Gallery - Multi-Purpose Carousel Module by Gnanakeethan
 * 
 * @author     Gnanakeethan Balasubramaniam <gnanakeethan@gmail.com>
 * @copyright  (c) 2013 Gnanakeethan Balasubramaniam
 * @license    GNU/GPL v3 or Later.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'helper.php');
$gallery = new GalleryHelper($params,$module);
$gallery->render();