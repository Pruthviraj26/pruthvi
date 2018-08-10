<?php

$texonomy['categories'] = array(
						'type'=>array('post','sliders','menu','pages','school'),
						'option'=>array(
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

$texonomy['templates'] = array('type'=>array('pages'),'option'=>array(
						'hierarchical' => false,
						'labels'=>array(
													'name' => __( 'Templates', 'taxonomy general name' ),
													'singular_name' => __( 'Template', 'taxonomy singular name' ),
													'search_items' =>  __( 'Search Template' ),
													'all_items' => __( 'All Templates' ),
													'parent_item' => __( 'Parent Template' ),
													'parent_item_colon' => __( 'Parent Template:' ),
													'edit_item' => __( 'Edit Template' ), 
													'update_item' => __( 'Update Template' ),
													'add_new_item' => __( 'Add New Template' ),
													'new_item_name' => __( 'New Template Name' ),
													'menu_name' => __( 'Templates' ),
												),
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
						'rewrite' => array( 'slug' => 'templates' ),
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


$data['Texonomies'] = $texonomy;

$post['post'] = array(
      'labels' => array(
        'name' => __( 'Post' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Post' ),
        'plural_name' => __( 'Post' )
      ),
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'post'),
    );

		$post['schools'] = array(
      'labels' => array(
        'name' => __( 'School' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'School' ),
        'plural_name' => __( 'School' )
      ),
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'school'),
    );


$post['sliders'] = array(
      'labels' => array(
        'name' => __( 'Sliders' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Slider' ),
        'plural_name' => __( 'Sliders' )
      ),
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'sliders'),
    );


$post['teams'] = array(
      'labels' => array(
        'name' => __( 'Teams' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Team' ),
        'plural_name' => __( 'Teams' )
      ),
			'add_new_link'=>true,
			'view_all'=>true,
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
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'teams'),
    );



$post['menu'] = array(
      'labels' => array(
        'name' => __( 'Menu' ),
        'icon' => 'fa fa-bars',
        'singular_name' => __( 'Menu' ),
        'plural_name' => __( 'Menu' )
      ),
			'add_new_link'=>true,
			'view_all'=>false,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'post'),
    );
$data['Post'] = $post;

$config['Theme'] = $data;



