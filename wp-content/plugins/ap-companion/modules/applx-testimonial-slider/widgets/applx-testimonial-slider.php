<?php
/**
 * Accesspress Parallax Testimonial
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace ApCompanion\Modules\ApplxTestimonialSlider\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

use ApCompanion\Group_Control_Query;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



class Applx_Testimonial_Slider extends Widget_Base {
    
	/**
	 * Retrieve Applx_Testimonial_Slider widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'applx-testimonial-slider';
	}

	/**
	 * Retrieve Applx_Testimonial_Slider widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Testimonial Slider', 'ap-companion' );
	}

	/**
	 * Retrieve Applx_Testimonial_Slider widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}

	/**
	 * Retrieve the list of categories the Applx_Testimonial_Slider widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'applx-elements' );
	}

	/**
	 * Register Applx_Testimonial_Slider widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

        /**
         * Content Tab: Query
         */
        $this->start_controls_section(
            'section_post_query',
            [
                'label'             => esc_html__( 'Query', 'ap-companion' ),
            ]
        );
        $this->add_group_control(
                Group_Control_Query::get_type(), [
            'name' => 'posts',
            'label' => esc_html__( 'Posts', 'ap-companion' ),
                ]
        );

        $this->end_controls_section();


        //styling tab
        $this->start_controls_section(
            'section_general_style',
            [
                'label' => esc_html__( 'General Styles', 'ap-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        //element title
        $this->add_control(
            'testimonial_title_color',
            [
                'label'     => esc_html__( 'Content Title Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.testimonial-post-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'testimonial_description_color',
            [
                'label'     => esc_html__( 'Content Description Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_title_typography',
                'label'     => esc_html__( 'Content Title Typography', 'ap-companion' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.testimonial-post-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'testimonial_content_typography',
                'label'     => esc_html__( 'Content Description Typography', 'ap-companion' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .testimonial-content',
            ]
        );


        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Applx_Testimonial_Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();
        $this->add_render_attribute( 'ap-testimonial-slider', 'class', 'ap-testimonial-slider-section ' );
        $showposts = isset( $settings[ 'showposts' ] )? $settings[ 'showposts' ] : '';
        $block_args = ap_ea_query($settings,$first_id='', $showposts );
        $query = new \WP_Query( $block_args );
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-testimonial-slider' ); ?>>
            <div class="ap-testimonial-slider-wrapper">
                <?php
                    while ( $query->have_posts() ): $query->the_post();
                        ?>
                        <div class="testimonial-post-wrap">
                            <div class="testimonial-content">
                                <?php the_content();?>
                            </div>
                            <div class="testimonial-title-wrap">
                                <?php the_title('<h4 class="testimonial-post-title">','</h4>'); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}