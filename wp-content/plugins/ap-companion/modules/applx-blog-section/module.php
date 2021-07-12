<?php
namespace ApCompanion\Modules\ApplxBlogSection;

use ApCompanion\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'applx-blog-section';
	}

	public function get_widgets() {

		$widgets = [
			'Applx_Blog_Section'
		];

		return $widgets;
	}
}
