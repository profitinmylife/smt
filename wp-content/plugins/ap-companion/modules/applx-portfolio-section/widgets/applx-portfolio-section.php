<?php
/**
 * Accesspress Parallax Portfolio
 *
 * @package    Accesspress Themes
 * @subpackage Accesspress Parallax
 * @since      version 2.0.1
 */

namespace ApCompanion\Modules\ApplxPortfolioSection\Widgets;

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



class Applx_Portfolio_Section extends Widget_Base {
    
	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'applx-portfolio-section';
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'AP: Portfolio', 'ap-companion' );
	}

	/**
	 * Retrieve Accesspress_Parallax_Elementor_Section widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-justified';
	}

	/**
	 * Retrieve the list of categories the Accesspress_Parallax_Elementor_Section widget belongs to.
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
	 * Register Accesspress_Parallax_Elementor_Section widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_detail',
			array(
				'label' => esc_html__( 'Section Setting', 'ap-companion' ),
			)
		);

        $this->add_control(
            'section_layout',
            array(
                'label'       => esc_html__( 'Section Layout:', 'ap-companion' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => true,
                'default'   => 'layout1',
                'options'      => array(
                    'layout1'   => esc_html__('Layout 1','ap-companion'),
                    'layout2'   => esc_html__('Layout 2','ap-companion'),
                )
            )
        );

		$this->end_controls_section();

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


        //$this->post_excerpts( array( 'title_excerpts' => true, 'content_excerpts' => true, 'readmore' => true ));

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
            'content_title_color',
            [
                'label'     => esc_html__( 'Content Title Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.portfolio-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_title_color_hover',
            [
                'label'     => esc_html__( 'Content Title Color: Hover', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.portfolio-post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_category_color',
            [
                'label'     => esc_html__( 'Category Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-category' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_description_color',
            [
                'label'     => esc_html__( 'Content Description Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_title_typography',
                'label'     => esc_html__( 'Content Title Typography', 'ap-companion' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} h4.portfolio-post-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_category_typography',
                'label'     => esc_html__( 'Content Category Typography', 'ap-companion' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .portfolio-category',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'content_excerpt_typography',
                'label'     => esc_html__( 'Content Description Typography', 'ap-companion' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .portfolio-excerpt',
            ]
        );

        //element title
        $this->add_control(
            'content_button_color',
            [
                'label'     => esc_html__( 'Button Color', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-readmore' => 'color: {{VALUE}};',
                ],
            ]
        );

        //element title
        $this->add_control(
            'content_button_color_hover',
            [
                'label'     => esc_html__( 'Button Color: Hover', 'ap-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-readmore:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();//end for styling tab
	}
	/**
	 * Render Accesspress_Parallax_Elementor_Section widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();
        $layout = isset( $settings[ 'section_layout' ] )? $settings[ 'section_layout' ] : 'layout1';
        $this->add_render_attribute( 'ap-portfolio', 'class', 'ap-portfolio-section ' );
        $showposts = isset( $settings[ 'showposts' ] )? $settings[ 'showposts' ] : '';
        $excerpt = isset( $settings[ 'content_excerpts' ] )? $settings[ 'content_excerpts' ] : 200;
        $block_args = ap_ea_query($settings,$first_id='', $showposts );
        $query = new \WP_Query( $block_args );
        ?>
        <div <?php echo $this->get_render_attribute_string( 'ap-portfolio' ); ?>>
            <div class=" ap-portfolio-wrapper <?php echo esc_attr($layout);?>">
                <div class="ap-container">
                    <div class="portfolio-post-wrapper">
                        <?php
                        if ( ($layout =='layout1') && $query->have_posts() ):
                            while ( $query->have_posts() ): $query->the_post();
                                ?>
                                <div class="portfolio-post-wrap">
                                    <div class="portfolio-image">
                                        <?php
                                        if ( has_post_thumbnail() ) :
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-thumbnail' );
                                            ?>
                                            <img src="<?php echo esc_url( $image[ 0 ] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image.jpg' ) ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="portfolio-content">
                                        <h4 class="portfolio-post-title">
                                            <a href="<?php the_permalink()?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="portfolio-category">
                                            <?php 
                                                $term_lists = get_the_category();
                                                $term_slugs = array();
                                                foreach ($term_lists as $term_list) {
                                                    $term_slugs[] = $term_list->name;
                                                }
                                                $term_slugs = join(' - ', $term_slugs);
                                                echo esc_html( $term_slugs );
                                             ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();                  
                        
                        elseif ( ($layout =='layout2') && $query->have_posts() ):
                            $i = 0;
                            while ( $query->have_posts() ): $query->the_post();
                                $masonry_class = 'ap-full-half';
                                $i++;
                                $image_size = 'portfolio-thumbnail';
                                if($i == 1 || $i == 8  ){
                                    $masonry_class = 'ap-full';
                                }
                                elseif($i == 4 || $i== 7){
                                    $image_size = 'rect-wide-med';
                                    $masonry_class = 'image-wide';
                                }
                                else{ 
                                    $masonry_class = 'ap-full-half';
                                }
                                if($i==1 || $i==5) {
                                    echo "<div class='left-wrap'>";
                                }
                                elseif($i==2 || $i==8){
                                    echo "<div class='right-wrap'>";
                                }
                                ?>
                                    <div class="portfolio-post-wrap <?php echo esc_attr($masonry_class);?>">
                                        <div class="portfolio-image">
                                            <?php
                                            if ( has_post_thumbnail() ) :
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
                                                ?>
                                                <img src="<?php echo esc_url( $image[ 0 ] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image.jpg' ) ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="portfolio-content">
                                            <h4 class="portfolio-post-title">
                                                <a href="<?php the_permalink()?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            <div class="portfolio-category">
                                                <?php 
                                                    $term_lists = get_the_category();
                                                    $term_slugs = array();
                                                    foreach ($term_lists as $term_list) {
                                                        $term_slugs[] = $term_list->name;
                                                    }
                                                    $term_slugs = join(' - ', $term_slugs);
                                                    echo esc_html( $term_slugs );
                                                 ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                if($i==1 || $i==7 || $i==4 || $i==8){
                                    echo "</div>";
                                }
                                if($i== 8){
                                    $i = 0;
                                }
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div><!-- element main wrapper -->
<?php
	}
}