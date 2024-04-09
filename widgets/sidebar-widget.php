<?php
// Register Widgets
if ( !function_exists( 'chroma_sidebars_init' ) ) {
	function chroma_sidebars_init() {
		register_sidebar(array(
			'id' => 'sidebar-widget',
			'name' => 'Post Sidebar ',
			'before_widget' => '',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '>',
		));
	}
}
add_action( 'widgets_init', 'chroma_sidebars_init' );
