<?php

class Elementor_Demo_Slider2_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xmoze_slider2_widget';
	}

	public function get_title() {
		return esc_html__( 'Demo Slider Widget 2', 'xmoze-addon' );
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
			'slider_image2',
			[
				'label' => esc_html__( 'Slider Image', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'demo_slider2',
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
			'slider_items2',
			[
				'label' => esc_html__( 'Items', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
			]
		);

		$this->add_control(
			'slider_autoplay2',
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
			'slider_rtl',
			[
				'label' => esc_html__( 'Rtl?', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'true', 'xmoze-addon' ),
				'label_off' => esc_html__( 'false', 'xmoze-addon' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->end_controls_section();

	}
	
  protected function render() {
    $settings = $this->get_settings_for_display();
		$demo_slider2 = $settings['demo_slider2'];
		$slider_items2 = $settings['slider_items2'];
		$slider_autoplay2 = $settings['slider_autoplay2'];
		$slider_rtl = $settings['slider_rtl'];

		if($slider_autoplay2 == 'true'){
			$slider_autoplay2 = 'true';
		} else{
			$slider_autoplay2 = 'false';
		}
		if($slider_rtl == 'true'){
			$slider_rtl = 'true';
		} else{
			$slider_rtl = 'false';
		}
		?>
		
		<script>
				jQuery(document).ready(function ($) {
			
			/* Slider Item Slide
			============================*/
			$('.mas-demo-slider2').slick({
				rtl: <?php echo $slider_rtl ?>,
				infinite: true,
				slidesToShow: <?php echo $slider_items2 ?>, 
				slidesToScroll: 1,
				arrows: false,
				dots: false,
				autoplay: <?php echo $slider_autoplay2 ?>,
				autoplaySpeed: 0,
				speed: 3000,
				pauseOnHover: false,
				cssEase: 'linear',
				pauseOnHover:true,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>',
				responsive: [
				{
					breakpoint: 1400,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
					}
				},
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
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				]
			});
	});
		</script>

    <div class="mas-demo-slider2" dir="<?php echo esc_html($slider_rtl)?>">
        <?php 
          foreach ($demo_slider2 as $demo_sliders2) {
            ?>
            <div class="mas-demo-slider-item">
               <img src="<?php echo esc_url($demo_sliders2['slider_image2']['url'])?>" alt="">
            </div>
            <?php
          }
        ?>
        
    </div>

		<?php
   
  }

}