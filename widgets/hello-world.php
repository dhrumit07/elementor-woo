<?php

namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hello_World extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_name() {
		return 'elementor-woo';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Elementor WOO', 'elementor-hello-world' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @return array Widget scripts dependencies.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

		$this->model();


	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

		$this->model();
	}

	protected function model() {
		?>
        <style>


            .modal {
                background: #FFF;
                width: 200px;
                height: 100px;
                text-align: center;
                box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
                -moz-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
                -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
                position: fixed;
                top: 50%;
                margin-top: -50px;
                left: 50%;
                margin-left: -100px;
                line-height: 25px;
                z-index: 99;
            }

            .modal a {
                line-height: 1em;
            }

            .modal-bg {
                background: #FFF;
                zoom: 1;
                opacity: 0.8;
                filter: alpha(opacity=80);
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 9;
            }

            .modal-link {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                alignment: center;
                border-radius: 12px;
            }

        </style>

        <div style="background: #FFFFFF; padding-top: 100px; padding-bottom: 100px;align-content: center">

            <a href="#" class="modal-link">Create Product</a>
        </div>
        <div class="modal" style="display: none;">

            <form name="newsletter-form" id="product_submit" method="post">
                <input id="name" name="name" type="text" placeholder="Product name"/>
                <input id="price" name="price" type="text" placeholder="Price"/>
                <input type="submit" class="submit" value="Subscribe!"/>
            </form>
            <a href="#" class="close">close</a>
        </div>
        <div class="modal-bg" style="display: none;"></div>
		<?php
	}


}
