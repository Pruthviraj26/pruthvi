<?php

$texonomy['categories'] = array('type'=>array('post'),'option'=>array(
						'hierarchical' => true,
						'labels'=>array(
													'name' => __( 'Categoies', 'taxonomy general name' ),
													'singular_name' => __( 'Category', 'taxonomy singular name' ),
													'search_items' =>  __( 'Search Categories' ),
													'all_items' => __( 'All Categories' ),
													'parent_item' => __( 'Parent Category' ),
													'parent_item_colon' => __( 'Parent Category:' ),
													'edit_item' => __( 'Edit Category' ), 
													'update_item' => __( 'Update Category' ),
													'add_new_item' => __( 'Add New Category' ),
													'new_item_name' => __( 'New Category Name' ),
													'menu_name' => __( 'Categories' ),
												),
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
						'rewrite' => array( 'slug' => 'categories' ),
					));


$texonomy['topics'] = array('type'=>array('teams'),'option'=>array(
						'hierarchical' => true,
						'labels'=>array(
													'name' => __( 'Topics', 'taxonomy general name' ),
													'singular_name' => __( 'Topic', 'taxonomy singular name' ),
													'search_items' =>  __( 'Search Topics' ),
													'all_items' => __( 'All Topics' ),
													'parent_item' => __( 'Parent Topic' ),
													'parent_item_colon' => __( 'Parent Topic:' ),
													'edit_item' => __( 'Edit Topic' ), 
													'update_item' => __( 'Update Topic' ),
													'add_new_item' => __( 'Add New Topic' ),
													'new_item_name' => __( 'New Topic Name' ),
													'menu_name' => __( 'Topics' ),
												),
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
						'rewrite' => array( 'slug' => 'topic' ),
					));


$config['Texonomies'] = $texonomy;
$post['post'] = array(
      'labels' => array(
        'name' => __( 'Post' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Post' ),
        'plural_name' => __( 'Post' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'teams'),
    );

$post['teams'] = array(
      'labels' => array(
        'name' => __( 'Teams' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Team' ),
        'plural_name' => __( 'Teams' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'teams'),
    );


$post['pages'] = array(
      'labels' => array(
        'name' => __( 'Pages' ),
        'icon' => 'fa fa-files-o',
        'singular_name' => __( 'Page' ),
        'plural_name' => __( 'Pages' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'teams'),
    );

$data['Post'] = $post;

$config['Theme'] = $data;



