<?php

class Elementor_Demo_thumb_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'xmoze_demo_thumb_widget';
	}

	public function get_title() {
		return esc_html__( 'Demo Thumb', 'xmoze-addon' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'xmoze-addon-category' ];
	}

	public function get_keywords() {
		return [ 'demo thumb', 'demo thumb' ];
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

				// column
				$this->add_control(
					'blog_column',
					[
						'label' => esc_html__( 'Column', 'xmoze-addon' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'col-lg-4',
						'options' => [
							'col-lg-3'  => esc_html__( 'Four Column', 'xmoze-addon' ),
							'col-lg-4' => esc_html__( 'Three Column', 'xmoze-addon' ),
							'col-lg-6' => esc_html__( 'Two Column', 'xmoze-addon' ),
						],
					]
				);
		

    $repeater->add_control(
			'demo_thumb',
			[
				'label' => esc_html__( 'Image', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
        'label_block' => true,
        'separator' => "before"
			]
		);

    $repeater->add_control(
			'btn1_text', 
      [
				'label' => esc_html__( 'Button One', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Demo' , 'xmoze-addon' ),
				'show_label' => true,
        'separator' => "before"
			]
		);

    $repeater->add_control(
			'btn1_url',
			[
				'label' => esc_html__( 'Url One', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'xmoze-addon' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

    $repeater->add_control(
			'btn2_text', [
				'label' => esc_html__( 'Button Two', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Demo' , 'xmoze-addon' ),
				'show_label' => true,
        'separator' => "before"
			]
		);
    $repeater->add_control(
			'btn2_url',
			[
				'label' => esc_html__( 'Url Two', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'xmoze-addon' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

    $repeater->add_control(
			'thumb_title', [
				'label' => esc_html__( 'Title', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Cryptocurrency App' , 'xmoze-addon' ),
				'show_label' => true,
        'label_block' => true,
        'separator' => "before"
			]
		);
		$repeater->add_control(
			'thumb_title_link',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'thumb_badge', [
				'label' => esc_html__( 'Badge', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hot' , 'xmoze-addon' ),
				'show_label' => true,
        'label_block' => false,
        'separator' => "before"
			]
		);

    $this->add_control(
			'thumb_list',
			[
				'label' => esc_html__( 'Repeater List', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'demo_thumb' => esc_html__( 'Demo Thumb', 'xmoze-addon' ),
						'btn1_text' => esc_html__( 'Btn One Text', 'xmoze-addon' ),
						'btn2_text' => esc_html__( 'Btn Two Text', 'xmoze-addon' ),
						'btn1_url' => esc_html__( 'Btn One Url', 'xmoze-addon' ),
						'btn2_url' => esc_html__( 'Btn Two Url', 'xmoze-addon' ),
						'thumb_title' => esc_html__( 'Thumb Title', 'xmoze-addon' ),
					]
				],
				'title_field' => '{{{ thumb_title }}}',
			]
		);

		

		$this->end_controls_section();

		
    //  demo btn
		$this->start_controls_section(
			'demo_btn_style',
			[
				'label' => esc_html__( 'Button', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'demo_btn_typography',
				'selector' => '{{WRAPPER}} .mas-demo-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-btn',
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'xmoze-addon' ),
			]
		);
		$this->add_control(
			'demo_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mas-demo-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_background',
				'label' => esc_html__( 'Background', 'xmoze-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mas-demo-btn',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'Btn_border',
				'label' => esc_html__( 'Border', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-btn',
				'separator' => 'before'
			]
		);
		$this->add_control(
			'btn_radius',
			[
				'label' => esc_html__( 'Border Radius', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-btn',
			]
		);
		$this->add_control(
			'demo_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);
    
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'xmoze-addon' ),
			]
		);
		$this->add_control(
			'demo_btn_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mas-demo-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_background_hover',
				'label' => esc_html__( 'Background', 'xmoze-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mas-demo-btn:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'Btn_border_hover',
				'label' => esc_html__( 'Border', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-btn:hover',
				'separator' => 'before'
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-btn:hover',
			]
		);
		$this->add_control(
			'demo_btn_padding_hover',
			[
				'label' => esc_html__( 'Padding', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);
		$this->end_controls_tabs();
		
		
		$this->end_controls_section();

    //  demo title
		$this->start_controls_section(
			'demo_title_style',
			[
				'label' => esc_html__( 'Title', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs_title'
		);

		$this->start_controls_tab(
			'style_normal_tab_title',
			[
				'label' => esc_html__( 'Normal', 'xmoze-addon' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'demo_title_typography',
				'selector' => '{{WRAPPER}} .mas-demo-data h4',
			]
		);
		
		$this->add_control(
			'demo_title_color',
			[
				'label' => esc_html__( 'Color', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mas-demo-data h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'demo_title_margin',
			[
				'label' => esc_html__( 'Margin', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-data h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'demo_title_padding',
			[
				'label' => esc_html__( 'Padding', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-data h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab_title',
			[
				'label' => esc_html__( 'Hover', 'xmoze-addon' ),
			]
		);
		$this->add_control(
			'demo_title_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mas-demo-data h4:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tabs();

		$this->end_controls_section();
		// thumb
		$this->start_controls_section(
			'thumb_style',
			[
				'label' => esc_html__( 'Image', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'thumb_background',
				'label' => esc_html__( 'Background', 'xmoze-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .mas-demo-thumb:hover::before',
			]
		);

		$this->end_controls_section();

		
		// box
		$this->start_controls_section(
			'badge_style',
			[
				'label' => esc_html__( 'Badge', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'badge_typography',
				'selector' => '{{WRAPPER}} .badge',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'badge_background',
				'label' => esc_html__( 'Background', 'xmoze-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .badge',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'badge_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .badge',
			]
		);
		$this->add_control(
			'badge_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'badge_padding',
			[
				'label' => esc_html__( 'Padding', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();



		// box
		$this->start_controls_section(
			'box_style',
			[
				'label' => esc_html__( 'Box', 'xmoze-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'xmoze-addon' ),
				'selector' => '{{WRAPPER}} .mas-demo-wrap',
			]
		);

		$this->add_control(
			'box_padding',
			[
				'label' => esc_html__( 'Padding', 'xmoze-addon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mas-demo-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

	}
	
  protected function render() {
    $settings = $this->get_settings_for_display();
		$thumb_list = $settings['thumb_list'];
		$blog_column = $settings['blog_column'];

		if($blog_column == 'col-lg-4'){
			$blog_column = 'col-lg-4';
		} elseif($blog_column == 'col-lg-6'){
			$blog_column = 'col-lg-6';
		} elseif($blog_column == 'col-lg-3'){
			$blog_column == 'col-lg-3';
		}
		
	
		?>
		
    <div class="row">
        <?php 
          foreach ($thumb_list as $thumb_lists) {
            ?>
            <div class="<?php echo $blog_column?> col-md-6">
               <div class="mas-demo-wrap">
                  <div class="mas-demo-thumb">
                     <img src="<?php echo esc_url($thumb_lists['demo_thumb']['url'])?>" alt="">
                     <div class="mas-demo-btn-wrap">
											 <?php 
											 	if($thumb_lists['btn1_text']){
													 ?>
														<a class="mas-demo-btn" href="<?php echo esc_url($thumb_lists['btn1_url']['url'])?>"><?php echo esc_html($thumb_lists['btn1_text'])?></a>
													 <?php
												 }
											 ?>
											 <?php 
											 	if($thumb_lists['btn2_text']){
													 ?>
														<a class="mas-demo-btn" href="<?php echo esc_url($thumb_lists['btn2_url']['url'])?>"><?php echo esc_html($thumb_lists['btn2_text'])?></a>
													 <?php
												 }
											 ?>
                     </div>
										 <?php 
											 	if($thumb_lists['thumb_badge']){
													 ?>
														<div class="badge hot"><?php echo esc_html($thumb_lists['thumb_badge'])?></div>
													 <?php
												 }
											 ?>
                     
                  </div>
									<?php 
											if($thumb_lists['thumb_title']){
													?>
													<a class="mas-demo-data" href="<?php echo esc_url($thumb_lists['thumb_title_link']['url'])?>">
													<h4><?php echo esc_html($thumb_lists['thumb_title'])?></h4>
													<?php
												}
											?>
                  </a>
               </div>
            </div>
            <?php
          }
        ?>
        
    </div>

		<?php
   
  }

}