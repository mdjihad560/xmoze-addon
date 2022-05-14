<?php

class Elementor_Demo_Slider3_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xmoze_slider3_widget';
	}

	public function get_title() {
		return esc_html__( 'Demo Slider Widget 3', 'xmoze-addon' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'xmoze-addon-category' ];
	}

	public function get_keywords() {
		return [ 'demo slider', 'demo slider' ];
	}

  protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
			'slider_image3',
			[
				'label' => esc_html__( 'Slider Image', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'demo_slider3',
			[
				'label' => esc_html__( 'Repeater List', 'halim-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);



		$this->end_controls_section();

		// setting slider

		$this->start_controls_section(
			'setting_section',
			[
				'label' => esc_html__( 'Setting', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_items',
			[
				'label' => esc_html__( 'Items', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 10,
				'step' => 1,
				'default' => 1,
			]
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label' => esc_html__( 'Autoplay?', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'true', 'xmoze-addon' ),
				'label_off' => esc_html__( 'false', 'xmoze-addon' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slider_dots',
			[
				'label' => esc_html__( 'Dots', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'true', 'xmoze-addon' ),
				'label_off' => esc_html__( 'false', 'xmoze-addon' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'slider_arrow',
			[
				'label' => esc_html__( 'Arrow', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'true', 'xmoze-addon' ),
				'label_off' => esc_html__( 'false', 'xmoze-addon' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();

	}
	
  protected function render() {
    $settings = $this->get_settings_for_display();
		$demo_slider3 = $settings['demo_slider3'];
		$slider_items = $settings['slider_items'];
		$slider_autoplay = $settings['slider_autoplay'];
		$slider_dots = $settings['slider_dots'];
		$slider_arrow = $settings['slider_arrow'];

		if($slider_autoplay == 'true'){
			$slider_autoplay = 'true';
		} else{
			$slider_autoplay = 'false';
		}

		if($slider_dots == 'true'){
			$slider_dots = 'true';
		} else{
			$slider_dots = 'false';
		}

		if($slider_arrow == 'true'){
			$slider_arrow = 'true';
		} else{
			$slider_arrow = 'false';
		}

		?>
		
		<script>
				jQuery(document).ready(function ($) {
		
		/* Slider Item Slide
		============================*/
		$('.mas-demo-slider3').slick({
			infinite: true,
			slidesToShow: <?php echo $slider_items ?>, 
			slidesToScroll: 1,
			arrows: <?php echo $slider_arrow ?>,
			autoplay: <?php echo $slider_autoplay ?>,
			dots: <?php echo $slider_dots ?>,
			prevArrow: '<button class="slide-arrow prev-arrow"></button>',
			nextArrow: '<button class="slide-arrow next-arrow"></button>',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
					}
				},
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false
					}
				}

			]
		});
	});
		</script>

    <div class="mas-demo-slider3">
        <?php 
          foreach ($demo_slider3 as $demo_sliders3) {
            ?>
            <div class="mas-demo-slider-item">
               <img src="<?php echo esc_url($demo_sliders3['slider_image3']['url'])?>" alt="">
            </div>
            <?php
          }
        ?>
        
    </div>

		<?php
   
  }

}