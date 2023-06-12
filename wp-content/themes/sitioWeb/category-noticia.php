<?php get_header(  ); ?>
<h3 class="pb-3 mb-4 font-italic border-bottom">
            Galería:
          </h3>
      <div class="row mb-2">
	  
      
      <?php  if(have_posts()) : ?>
<?php  while(have_posts()): the_post( ); ?>

<div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
             
              <h3 class="mb-0">
              <a class="text-dark" href="<?php esc_url(the_permalink( )); ?>">
              <?php the_title( ); ?></a>
              </h3>
             <br/>
              <p class="card-text mb-auto">
              <?php the_excerpt(); ?>
                </p>
              <a href="<?php esc_url(the_permalink( )); ?>">Continuar leyendo...</a>
            </div>
          <a href="<?php esc_url(the_permalink( )); ?>" >
          <?php the_post_thumbnail('chica'); ?>
			</a>
			</div>
        </div>

<?php endwhile; ?>
<?php  endif;?>


      
        

		
      </div>
	  
	  <nav class="blog-pagination text-center">
      <?php posts_nav_link( ); ?>
          
    </nav>
    </div>

    <main role="main" class="container">
    
    </main><!-- /.container -->
<?php get_footer( ); ?>