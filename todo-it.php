<?php
/**
 * @package Myplygun
 */
/*
Plugin name: Todo It
Plugin uri: https://mrmolaei.com/plugins/todo-it
Description: This is my first attempt on writing a custom plugin for the first time.
Version: 1.0.0
Author: MohammadReza Molaei
Author uri: https://mrmolaei.com
License: GPL v2 or later
Text Domain: todo-it
 */

// Security
! defined( 'ABSPATH' ) && die;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'PLUGIN_CLASS', 'TodoIt' );

use Todo_It\TodoIt;


if ( class_exists( 'Todo_It\\TodoIt' ) ) {
	$todo_it_instance = new TodoIt();
	$todo_it_instance->register();
}

register_activation_hook( __FILE__, array( $todo_it_instance, 'activate' ) );
//
register_deactivation_hook( __FILE__, array( $todo_it_instance, 'deactivate' ) );
//
//register_uninstall_hook( __FILE__, array( PLUGIN_CLASS, 'uninstall' ) );