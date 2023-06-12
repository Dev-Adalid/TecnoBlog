<?php
// Agregar scripts style,Javascript
add_action('wp_enqueue_scripts','scriptsTemplate');
function scriptsTemplate(){

    // Estilos del template
    wp_enqueue_style( 'style',get_stylesheet_uri());
    wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/css/bootstrap.min.css" );
    wp_enqueue_style( 'blog', get_template_directory_uri()."/css/blog.css" );

    // Archivos Javascript 
    wp_enqueue_script('jquery');
    
    wp_enqueue_script('popper',get_template_directory_uri()."/js/popper.min.js" );
    wp_enqueue_script('bootstrap',get_template_directory_uri()."/js/bootstrap.min.js" );
    wp_enqueue_script('holder',get_template_directory_uri()."/js/holder.min.js" );
}

// iniciar elementos necesarios de el tema
add_action('after_setup_theme','instalarTemplate');

function instalarTemplate(){

    // Cargamos la gestión de la imagen destacada
    add_theme_support('post-thumbnails');
 // Creamos tamaños de las imagenes del sitio web
    add_image_size( 'chica',200,250,true );
    add_image_size( 'grande',700,400,false);


    register_nav_menus(array('main-menu'=>esc_html__('Menú principal','')));
}

add_action( 'nav_menu_css_class','funcionAgregarEstilosAlMenu',1,3);

function funcionAgregarEstilosAlMenu($classes,$item,$args){

    $classes[]="p-2 text-muted";
    return $classes;

}

//registro de Sidebar (área de Widgets)
add_action('widgets_init','iniciarWidget');

function iniciarWidget(){

    register_sidebar( array(
                        'name'=>esc_html__('Área de barra lateral derecha'),
                        'id'=>'barra_lateral_1',
                        'before_title'=>'<h4 class="font-italic"> ',
                'after_title'=>'</h4>',
                'before_widget'=>'<div id="%1$s" class="p-3 mb-3 bg-light rounded widget %2$s" >',
                'after_widget'=>'</div>'


                     ) );

}

function opcionesTema( $wp_customize )
{
  
    $wp_customize->add_section('configuracion', array(
                'title'=>'Configuración'
     ));
    
     // Agregar campos a la sección 
     $wp_customize->add_setting('txtTitulo', array(
         'default'=>'blog de tecnología'
     ));

     // El tipo de campo txtTitulo 
     $wp_customize->add_control('txtTitulo', array(
         'section'=>'configuracion', 
         'type'=>'text', 
         'label'=>'Título del banner:'
     ));


    // El tipo de campo txtContenido
     // Agregar campos a la sección 
     $wp_customize->add_setting('txtContenido', array(
        'default'=>'Contenido principal'
    ));

    // El tipo de campo txtContenido 
    $wp_customize->add_control('txtContenido', array(
        'section'=>'configuracion', 
        'type'=>'textarea', 
        'label'=>'Contenido del banner:'
    ));

    // El tipo de campo txtURL
     // Agregar campos a la sección 
     $wp_customize->add_setting('txtURL', array(
        'default'=>'Url Banner'
    ));

    // El tipo de campo txtURL 
    $wp_customize->add_control('txtURL', array(
        'section'=>'configuracion', 
        'type'=>'url', 
        'label'=>'Url del Banner:'
    ));

}
add_action( 'customize_register', 'opcionesTema' );



?>