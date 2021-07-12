<?php
namespace ApCompanion\Modules\ApplxProgressSection;

use ApCompanion\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Module_Base {

	public function get_name() {
		return 'applx-progress-section';
	}

	public function get_widgets() {

		$widgets = [
			'Applx_Progress_Section'
		];

		return $widgets;
	}
}
