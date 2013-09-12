<?php
/*
Plugin Name: Simple Intro Paragraph
Plugin URI: http://plugins.findingsimple.com
Description: Simple plugin for adding an "intro" paragraph style to the WordPress editor for styling 
Version: 1.0
Author: Finding Simple
Author URI: http://findingsimple.com
License: GPL2
*/
/*
Copyright 2013  Finding Simple  (email : plugins@findingsimple.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'Simple_Intro_Paragraph' ) ) {

/**
 * Plugin Main Class.
 *
 */
class Simple_Intro_Paragraph {
    
    /**
     * Initialise
     */
    function Simple_Intro_Paragraph() {
        
        add_action( 'init', array( $this , 'simple_intro_paragraph_filter' ) );

    }

    /**
     * Apply appropriate hooks and filters to add the intro style
     */
    function simple_intro_paragraph_filter() {

        add_filter( 'mce_buttons_2', array( $this , 'add_styles_dropdown' ) ); 

        add_filter( 'tiny_mce_before_init', array( $this , 'add_styles_to_dropdown' ) );
        
    }  

    /**
     * Force add the "Styles" drop-down
     */ 
    function add_styles_dropdown( $buttons ) {

        if ( ! in_array( 'styleselect', $buttons ) )
            array_unshift( $buttons, 'styleselect' );

        return $buttons;

    }

    /**
     * Add styles/classes to the "Styles" drop-down
     */ 
    function add_styles_to_dropdown( $settings ) {

        $style_formats = array(
            array(
                'title' => 'Intro Paragraph',
                'selector' => 'p',
                'classes' => 'intro-paragraph',
            )
        );

        $settings['style_formats'] = json_encode( $style_formats );

        return $settings;

    }

}

$Simple_Intro_Paragraph = new Simple_Intro_Paragraph();

}