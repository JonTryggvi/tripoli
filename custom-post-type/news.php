<?php

// let's create the function for the custom type
function custom_post_news() {
	// creating (registering) the custom type
	register_post_type( 'news', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Trípólí News', 'JT_theme' ), /* This is the Title of the Group */
			'singular_name' => __( 'News', 'JT_theme' ), /* This is the individual type */
			'all_items' => __( 'All articles', 'JT_theme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'JT_theme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New', 'JT_theme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'JT_theme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit articles', 'JT_theme' ), /* Edit Display Title */
			'new_item' => __( 'New article', 'JT_theme' ), /* New Display Title */
			'view_item' => __( 'View article', 'JT_theme' ), /* View Display Title */
			'search_items' => __( 'Search article', 'JT_theme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'JT_theme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'JT_theme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example News post type', 'JT_theme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-megaphone', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'news', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'news', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'projects' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'custom_type' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_news');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'news_cat',
		array('news'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'News Categories', 'JT_theme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'News Category', 'JT_theme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search News Categories', 'JT_theme' ), /* search title for taxomony */
				'all_items' => __( 'All News Categories', 'JT_theme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent News Category', 'JT_theme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent News Category:', 'JT_theme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit News Category', 'JT_theme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update News Category', 'JT_theme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New News Category', 'JT_theme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New News Category Name', 'JT_theme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'news-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	// register_taxonomy( 'custom_tag',
	// 	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
	// 		'labels' => array(
	// 			'name' => __( 'Custom Tags', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Custom Tag', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Custom Tags', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Custom Tags', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Custom Tag', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Custom Tag:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Custom Tag', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Custom Tag', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Custom Tag', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Custom Tag Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 	)
	// );
?>
