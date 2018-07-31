<?php

$texonomy['categories'] = array('type'=>array('blog','sliders','menu','pages','properties'),'option'=>array(
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
$texonomy['features'] = array('type'=>array('properties'),'option'=>array(
						'hierarchical' => true,
						'labels'=>array(
													'name' => __( 'Features', 'taxonomy general name' ),
													'singular_name' => __( 'Feature', 'taxonomy singular name' ),
													'search_items' =>  __( 'Search Features' ),
													'all_items' => __( 'All Features' ),
													'parent_item' => __( 'Parent Feature' ),
													'parent_item_colon' => __( 'Parent Feature:' ),
													'edit_item' => __( 'Edit Feature' ), 
													'update_item' => __( 'Update Feature' ),
													'add_new_item' => __( 'Add New Feature' ),
													'new_item_name' => __( 'New Feature Name' ),
													'menu_name' => __( 'Features' ),
												),
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
						'rewrite' => array( 'slug' => 'features' ),
					));


$texonomy['communites'] = array('type'=>array('properties'),'option'=>array(
						'hierarchical' => true,
						'labels'=>array(
													'name' => __( 'Communites', 'taxonomy general name' ),
													'singular_name' => __( 'Community', 'taxonomy singular name' ),
													'search_items' =>  __( 'Search Communites' ),
													'all_items' => __( 'All Communites' ),
													'parent_item' => __( 'Parent Community' ),
													'parent_item_colon' => __( 'Parent Community:' ),
													'edit_item' => __( 'Edit Community' ), 
													'update_item' => __( 'Update Community' ),
													'add_new_item' => __( 'Add New Community' ),
													'new_item_name' => __( 'New Community Name' ),
													'menu_name' => __( 'Communites' ),
												),
						'show_ui' => true,
						'show_admin_column' => true,
						'query_var' => true,
						'rewrite' => array( 'slug' => 'communites' ),
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




$data['Texonomies'] = $texonomy;


// Start Property Post type and meta
$meta["price"][] = array("name"=>"amount","options"=>array(
										"type"=>"number",
										"validation"=>array(
												"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Enter amount'),
										)
									)
							 );
$meta["price"][] = array("name"=>"discount","options"=>array(
										"type"=>"number",
										"validation"=>array(
											"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Discount'),
										)
									)
							 );

$meta["price"][] = array("name"=>"tax","options"=>array(
										"type"=>"number",
										"validation"=>array(
												"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Enter Tax'),
										)
									)
							 );


$meta["rooms"][] = array("name"=>"bath","options"=>array(
										"type"=>["name"=>"select","options"=>[
																							''=>'Select Bath Room',																						
																							'1'=>'1',																							
																							'1+'=>'1+',
																							'2'=>'2',
																							'2+'=>'2+',
																							'3'=>'3',
																							'3+'=>'3+',
																							'4'=>'4',
																							'4+'=>'4+',
																							'5'=>'5',
																							'5+'=>'5+',
																							'6'=>'6',
																							'6+'=>'6+',
																							'7'=>'7',
																							'7+'=>'7+',
																							'8'=>'8',
																							'8+'=>'8+',
																							'9'=>'9',
																							'9+'=>'9+',
																							'10'=>'10',
																							'10+'=>'10+',
										]],
										"validation"=>array(
												"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Enter Tax'),
										)
									)
							 );


$meta["city"][] = array("name"=>"name","options"=>array(
										"type"=>"text",
										"validation"=>array(
												"required"=>__( 'Please, Enter city name'),
											"lettersonly"=>__( 'Please, enter letters only'),
										)
									)
							 );

$meta["city"][] = array("name"=>"latitude","options"=>array(
										"type"=>"number",
										"validation"=>array(
												"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Enter Tax'),
										)
									)
							 );

$meta["city"][] = array("name"=>"langitude","options"=>array(
										"type"=>"number",
										"validation"=>array(
												"number"=>__( 'Please Numeric value'),
											"required"=>__( 'Please Enter Tax'),
										)
									)
							 );





$post['properties'] = array(
      'labels' => array(
        'name' => __( 'Properties' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Property' ),
        'plural_name' => __( 'Properties' )
      ),
			'meta'=>$meta,
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'properties'),
    );


$post['blog'] = array(
      'labels' => array(
        'name' => __( 'Blog' ),
        'icon' => 'fa fa-dot-circle-o',
        'singular_name' => __( 'Blog' ),
        'plural_name' => __( 'Blog' )
      ),			
			'add_new_link'=>true,
			'view_all'=>true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'blog'),
    );
// End Property Post type and meta

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
      'rewrite' => array('slug' => 'menu'),
    );


$data['Post'] = $post;

$config['Theme'] = $data;



