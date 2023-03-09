<?php

function get_field2($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field2($key, $page_id = 0) {
  echo get_field2($key, $page_id);
}

// functions.php
add_action('cmb2_admin_init', 'cmb2_fields_home');

// array('item1', 'item2') === ['item1', 'item2']
function cmb2_fields_home() {
  // Adiciona um bloco
  $cmb = new_cmb2_box([
    'id' => 'sobre_box', // id deve ser único
    'title' => 'Sobre',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-sobre.php',
    ], // modelo de página
  ]);

  $qualidades = $cmb->add_field([
    'name' => 'Qualidade',
    'id' => 'qualidade',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Qualidade {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'sortable' => true,
    ],
  ]);

  $cmb->add_group_field($qualidades, [
    'name' => 'Titulo',
    'id' => 'titulo_item_qualidade',
    'type' => 'text',
  ]);

  $cmb->add_group_field($qualidades, [
    'name' => 'Descrição',
    'id' => 'descricao_item_qualidade',
    'type' => 'textarea',
  ]);

  $cmb2 = new_cmb2_box([
    'id' => 'portfolio_box', // id deve ser único
    'title' => 'Portfolios',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-portfolio.php',
    ], // modelo de página
  ]);

  $portfolios = $cmb2->add_field([
    'name' => 'Portifólio',
    'id' => 'portfolio',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Portifólio {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'sortable' => true,
    ],
  ]);

  $cmb2->add_group_field($portfolios, [
    'name' => 'Imagem 1',
    'id' => 'portfolio_imagem1',
    'type' => 'file',
  ]);

  $cmb2->add_group_field($portfolios, [
    'name' => 'Imagem 2',
    'id' => 'portfolio_imagem2',
    'type' => 'file',
  ]);

  $cmb2->add_group_field($portfolios, [
    'name' => 'Imagem 3',
    'id' => 'portfolio_imagem3',
    'type' => 'file',
  ]);

  $cmb3 = new_cmb2_box([
    'id' => 'quote_box', // id deve ser único
    'title' => 'Quotes',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-portfolio.php',
    ], // modelo de página
  ]);

  $quotes = $cmb3->add_field([
    'name' => 'Quote',
    'id' => 'quote',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Quote {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'sortable' => true,
    ],
  ]);

  $cmb3->add_group_field($quotes, [
    'name' => 'Quote',
    'id' => 'descricao_quote',
    'type' => 'textarea',
  ]);

  $cmb3->add_group_field($quotes, [
    'name' => 'Quote',
    'id' => 'autor_quote',
    'type' => 'text',
  ]);

  $cmb4 = new_cmb2_box([
    'id' => 'contatos_box', // id deve ser único
    'title' => 'Contatos',
    'object_types' => ['page'], // tipo de post
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-contato.php',
    ], // modelo de página
  ]);

  $redes = $cmb4->add_field([
    'name' => 'Redes',
    'id' => 'redes_sociais',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Rede {#}',
      'add_button' => 'Adicionar',
      'remove_button' => 'Remover',
      'sortable' => true,
    ],
  ]);

  $cmb4->add_group_field($redes, [
    'name' => 'Link',
    'id' => 'link_rede_social',
    'type' => 'text_url',
  ]);

  $cmb4->add_group_field($redes, [
    'name' => 'Imagem',
    'id' => 'imagem_rede_social',
    'type' => 'file',
  ]);

  $cmb4->add_group_field($redes, [
    'name' => 'Nome da Rede',
    'id' => 'nome_rede_social',
    'type' => 'text',
  ]);

}

// Função para registrar os Scripts e o CSS
function origamid_scripts() {
	// Desregistra o jQuery do Wordpress
	wp_deregister_script('jquery');

	// Registra o jQuery Novo
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.11.2.min.js', array(), "1.11.2", true );

	// Registrar Plugins
	wp_register_script( 'plugins-script', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );

	// Registrar Main
	wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'plugins-script' ), false, true );

	// Registrar Modernizr
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr.custom.45655.js', array(), "45655", false );

	// Carrega o Script
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'main-script' );	
}
add_action( 'wp_enqueue_scripts', 'origamid_scripts' );

function origamid_css() {
	wp_register_style( 'origamid-style', get_template_directory_uri() . '/style.css', array(), false, false );
	wp_enqueue_style( 'origamid-style' );
}
add_action( 'wp_enqueue_scripts', 'origamid_css' );

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');

// Registrar o Menu
function register_my_menu() {
  register_nav_menu('menu_principal',__( 'Menu Principal' ));
}
add_action( 'init', 'register_my_menu' );

//Custom Images Sizes
function my_custom_sizes() {
	add_image_size('large', 1450, 380, true);
	add_image_size('medium', 768, 380, true);
}
add_action('after_setup_theme', 'my_custom_sizes');


// Adicionar Custom Post Types
function custom_post_type_produtos() {
	register_post_type('produtos', array(
		'label' => 'Produtos',
		'description' => 'Produtos',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'produtos', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'Produtos',
			'singular_name' => 'Produto',
			'menu_name' => 'Produtos',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Novo Produto',
			'edit' => 'Editar',
			'edit_item' => 'Editar Produto',
			'new_item' => 'Novo Produto',
			'view' => 'Ver Produto',
			'view_item' => 'Ver Produto',
			'search_items' => 'Procurar Produtos',
			'not_found' => 'Nenhum Produto Encontrado',
			'not_found_in_trash' => 'Nenhum Produto Encontrado no Lixo',
		)
	));
}
add_action('init', 'custom_post_type_produtos');
?>