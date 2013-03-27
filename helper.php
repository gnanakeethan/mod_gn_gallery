<?php
/**
 * Module Gnanam Gallery - Multi-Purpose Carousel Module by Gnanakeethan
 * 
 * @package	  ModuleGNGallery
 * @author    Gnanakeethan Balasubramaniam <gnanakeethan@gmail.com>
 * @copyright (c) 2013 Gnanakeethan Balasubramaniam
 * @license   GNU/GPL v3 or Later.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class GalleryHelper {
	var $config= array();
	function __construct(&$params,&$module) {
		$this->module_id = ($params->get('auto_id',0) == 1) ? 'Gn_gallery_'.$module->id : $params->get('module_unique_id',0);
		$this->config['gallery']['mode']								=$params->get('gallery_mode','elastislide');		
		$this->config['gallery']['load']['jquery']						=$params->get('gallery_load_jquery','true');
		$this->config['elastislide']['mode']							=$params->get('elastislide_mode','select');
		$this->config['elastislide']['type']							=$params->get('elastislide_type','horizontal');
		$this->config['elastislide']['min_items']						=$params->get('elastislide_min','3');
		$this->config['elastislide']['timing']							=$params->get('elastislide_timing','500');
		$this->config['elastislide']['selected']['image_0']				=$params->get('elastislide_selected_image_0');
		$this->config['elastislide']['selected']['image_1']				=$params->get('elastislide_selected_image_1');
		$this->config['elastislide']['selected']['image_2']				=$params->get('elastislide_selected_image_2');
		$this->config['elastislide']['selected']['image_3']				=$params->get('elastislide_selected_image_3');
		$this->config['elastislide']['selected']['image_4']				=$params->get('elastislide_selected_image_4');
		$this->config['elastislide']['selected']['image_5']				=$params->get('elastislide_selected_image_5');
		$this->config['elastislide']['selected']['image_6']				=$params->get('elastislide_selected_image_6');
		$this->config['elastislide']['selected']['image_7']				=$params->get('elastislide_selected_image_7');
		$this->config['elastislide']['selected']['image_8']				=$params->get('elastislide_selected_image_8');
		$this->config['elastislide']['selected']['image_9']				=$params->get('elastislide_selected_image_9');
		$this->config['elastislide']['directory']['root']				=$params->get('elastislide_directory_root');
		$this->config['elastislide']['directory']['type']				=$params->get('elastislide_directory_type');
		$this->config['elastislide']['directory']['type']['select']		=$params->get('elastislide_directory_type_select');
		$this->config['zindex']['mode']									=$params->get('zindex_mode','select');
		$this->config['zindex']['timing']								=$params->get('zindex_timing','slow');
		$this->config['zindex']['selected']['image_0']					=$params->get('zindex_selected_image_0');
		$this->config['zindex']['selected']['image_1']					=$params->get('zindex_selected_image_1');
		$this->config['zindex']['selected']['image_2']					=$params->get('zindex_selected_image_2');
		$this->config['zindex']['selected']['image_3']					=$params->get('zindex_selected_image_3');
		$this->config['zindex']['selected']['image_4']					=$params->get('zindex_selected_image_4');
		$this->config['zindex']['selected']['image_5']					=$params->get('zindex_selected_image_5');
		$this->config['zindex']['selected']['image_6']					=$params->get('zindex_selected_image_6');
		$this->config['zindex']['selected']['image_7']					=$params->get('zindex_selected_image_7');
		$this->config['zindex']['selected']['image_8']					=$params->get('zindex_selected_image_8');
		$this->config['zindex']['selected']['image_9']					=$params->get('zindex_selected_image_9');
		$this->config['zindex']['directory']['root']					=$params->get('zindex_directory_root');
		$this->config['zindex']['directory']['type']					=$params->get('zindex_directory_type');
		$this->config['zindex']['directory']['type']['select']			=$params->get('zindex_directory_type_select');
		
	}
	function render(){
		switch ($this->config['gallery']['mode']){
			case 'elastislide' : require (JModuleHelper::getLayoutPath('mod_gn_gallery', 'elastislide'));
				break;
			case 'zindex' : require (JModuleHelper::getLayoutPath('mod_gn_gallery', 'zindex'));
				break;
			default : require JModuleHelper::getLayoutPath('mod_gn_gallery','default');
			
		}

	}
}