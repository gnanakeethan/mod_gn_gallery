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

$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_gn_gallery/assets/css/elastislide/elastislide.css');
$doc->addStyleSheet('modules/mod_gn_gallery/assets/css/elastislide/custom.css');
$doc->addStyleSheet('modules/mod_gn_gallery/assets/css/elastislide/setup.css');
$doc->addScript('modules/mod_gn_gallery/assets/js/elastislide/modernizr.custom.17475.js');
$style = 'div#top{
	background: #ffffff !important;
	border-color:#ffffff !important;
	
}';
$doc->addStyleDeclaration($style);
switch ($this->config['elastislide']['mode']) {

	case 'directory_based': {
			/**
			 * ****************************
			 * Directory to Gallery Start
			 * ****************************
			 */
			$types = array(
				'jpg', 'png', 'gif', 'JPG', 'PNG', 'GIF'
			);
			if ($this->config['elastislide']['type'] == 'vertical') {
				echo '
				<div class="column">';
			} elseif ($this->config['elastislide']['type'] == 'boxed') {
				echo '<div class="gallery">';
			} elseif ($this->config['elastislide']['type'] == 'fixed_bottom') {
				echo '<div class="fixed-bar">';
			}
			echo "<ul id='carousel' class='elastislide-list'>";
			$folder = JPATH_ROOT . '/images' . DS . $this->config['elastislide']['directory']['root'];
			$it = new RecursiveDirectoryIterator($folder);
			$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ($files as $file) {
				if (is_file($file)) {
					$pos = strrpos($file, 'images');
					$str = substr($file, $pos);
					$ext = JFile::getExt($file);
					foreach ($types as $type) {
						if ($ext == $type) {
							echo '<li';
							if ($this->config['elastislide']['type'] == 'boxed') {
								echo ' data-preview="' . $str . '" ><a  href="#"><img  class="mod_gallery_image"  src="' . $str . '"/></a></li>';
							} else {
								echo '><a href="#"><img  src="' . $str . '"/></a></li>';
							}
						}
					}
				}
			}
			echo "</ul>";
			if ($this->config['elastislide']['type'] == 'boxed') {
				echo '<div class="image-preview">
						<img id="preview" src="' . $str . '" />
					</div>';
			}
			if ($this->config['elastislide']['type'] == 'vertical' || $this->config['elastislide']['type'] == 'boxed' || $this->config['elastislide']['type'] == 'fixed_bottom') {
				echo '</div>';
			}

			/**
			 * ****************************
			 * Directory to Gallery End
			 * ****************************
			 */
		}
		break;
	case 'select' : {
			if ($this->config['elastislide']['type'] == 'vertical') {
				echo '
				<div class="column">';
			} elseif ($this->config['elastislide']['type'] == 'boxed') {
				echo '<div class="gallery">';
			} elseif ($this->config['elastislide']['type'] == 'fixed_bottom') {
				echo '<div class="fixed-bar">';
			}
			echo "<ul id='carousel' class='elastislide-list'>";
			foreach ($this->config['elastislide']['selected'] as $selected) {
				if (!$selected) {
					
				} else {

					echo '<li><a href="#"><img src="' . $selected . '"/></a></li>';
				}
			}
			echo "</ul>";
			if ($this->config['elastislide']['type'] == 'boxed') {
				echo '<div class="image-preview">
						<img id="preview" src="' . $str . '" />
					</div>';
			}
			if ($this->config['elastislide']['type'] == 'vertical' || $this->config['elastislide']['type'] == 'boxed' || $this->config['elastislide']['type'] == 'fixed_bottom') {
				echo '</div>';
			}
		}
		break;
	default : {
			echo 'We Are Unable to Determine what you have choosen';
		}
}
?>
<script type="text/javascript" src="modules/mod_gn_gallery/assets/js/jquery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="modules/mod_gn_gallery/assets/js/elastislide/elastislide.js"></script>
<script type="text/javascript" src="modules/mod_gn_gallery/assets/js/elastislide/custom.js"></script>
<script type="text/javascript">
	//TODO Add Config

<?php
if ($this->config['elastislide']['type'] == 'vertical' || $this->config['elastislide']['type'] == 'fixed_bottom' || $this->config['elastislide']['type'] == 'horizontal') {
	echo "$('#carousel').elastislide({\n";
	echo 'orientation:\'' . $this->config['elastislide']['type'] . '\',' . "\n";
	echo 'minItems :' . $this->config['elastislide']['min_items'] . ',' . "\n";
	echo 'speed :' . $this->config['elastislide']['timing'] . ',' . "\n";
	echo 'onClick : function( el, position, evt ) { return false; },
		onReady : function() { return false; },
		onBeforeSlide : function() { return false; },
		onAfterSlide : function() { return false; }';
	echo "});" . "\n";
}
if ($this->config['elastislide']['type'] == 'boxed') {
	echo "var current = 0,
				\$preview = $( '#preview' ),
				\$carouselEl = $( '#carousel' ),
				\$carouselItems = \$carouselEl.children(),
				carousel = \$carouselEl.elastislide( {
					current : current,
					minItems :" . $this->config['elastislide']['min_items'] . ",
					onClick : function( el, pos, evt ) {

						changeImage( el, pos );
						evt.preventDefault();

					},
					onReady : function() {

						changeImage( \$carouselItems.eq( current ), current );
						
					}
				} );

			function changeImage( el, pos ) {

				\$preview.attr( 'src', el.data( 'preview' ) );
				\$carouselItems.removeClass( 'current-img' );
				el.addClass( 'current-img' );
				carousel.setCurrent( pos );

			}";
}
?>

</script>