<?php get_header(); ?>
     <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic"><?php echo get_theme_mod('txtTitulo'); ?></h1>
          <p class="lead my-3"><?php echo get_theme_mod('txtContenido'); ?></p>
          <p class="lead mb-0">
          
            <a href="<?php echo get_theme_mod('txtURL'); ?>" class="btn btn-primary">
            Continuar leyendo...</a>

          </p>
        </div>
      </div>
	  
	  
 <h3 class="pb-3 mb-4 font-italic border-bottom">
            Noticias destacadas:
          </h3>
      <div class="row mb-2">
	  
      <?php 
$args=array(
  'post_type'=> 'post',
   'post__in'=> get_option('sticky_posts'),
  'posts_per_page'=> '2',
  'ignore_sticky_posts'=> 1
  );
$query= new WP_Query($args);
?>
<?php  if($query->have_posts()) : ?>
<?php  while($query->have_posts()): $query->the_post( ); ?>

        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">

              <strong class="d-inline-block mb-2 text-primary">
              <?php 
               the_category(',');
              ?>
              </strong>

              <h3 class="mb-0">
                <a class="text-dark" href="<?php esc_url(the_permalink( )); ?>"><?php the_title( ); ?></a>

              </h3>
              <br/>
              <a href="<?php esc_url(the_permalink( )); ?>" >Continuar leyendo...</a>
            </div>
            <?php the_post_thumbnail('chica'); ?>


          </div>
        </div>

  <?php endwhile; ?>
<?php  endif;?>


      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Noticias:
          </h3>
			


<?php 
$args=array('post_type'=>'post');
$query= new WP_Query($args);
?>
<?php  if($query->have_posts()) : ?>
<?php  while($query->have_posts()): $query->the_post( ); ?>
        <div class="blog-post">
            <h2 class="blog-post-title">
 <a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a>
            </h2>
            <?php the_date('', '<p class="blog-post-meta">','</p>'); ?>
            <p> <?php the_excerpt(); ?>  </p>

          </div><!-- /.blog-post -->
      
<?php endwhile; ?>
<?php  endif;?>


        </div><!-- /.blog-main -->
  <?php get_sidebar(); ?>

      </div><!-- /.row -->

    </main><!-- /.container -->
<?php  get_footer( );?>



