<?php


$texonomy['categories'] = array('type'=>array('post','sliders'),'option'=>array(
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