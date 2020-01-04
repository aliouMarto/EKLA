<?php
/*
 * Template Name: Collections
 
 * description: >-

  Page template Collections

 */

get_header();
?>


<main class="container">



 <?php if (have_posts()): ?>

	      <section class="intro_collection">
			<?php while (have_posts()): the_post(); ?>
                	
				<div class="text_collection">
					<?php echo the_content(); ?>
				</div>
		
		    <?php endwhile; ?>
		  </section>
       <?php
       endif;
?>


<?php if (have_posts()): ?>

	    
			<?php while (have_posts()): the_post(); ?>

		
				  <section class="rdv_clt_bloc">
				  	 <div class="rdv_clt">
                	  <?php the_field('text_rdv_clt'); ?>
                    </div>
				  </section>

                   <div class="calendly_clt">
                   	  <?php the_field('code_calendly_clt'); ?>
                   </div>
		
		    <?php endwhile; ?>
		 
       <?php
       endif;
?>







	<?php $arg_image_collectionpage = array(

   'post_type' => 'image_collectionpage',
   'posts_per_page' => -1
);

$req_image_collectionpage = new WP_Query($arg_image_collectionpage);

?>





<?php if ($req_image_collectionpage->have_posts()): ?>
            <section class="image_collectionpage">
			<?php while ($req_image_collectionpage->have_posts()): $req_image_collectionpage->the_post(); ?>

				<?php $image_collectionpage = get_field('image'); ?>

				
					<article>
						<img src="<?php echo esc_url($image_collectionpage['url']); ?>" alt="<?php echo esc_attr($image_collectionpage['alt']); ?>" />
						<div class="infos">
							<p><?php the_field('description'); ?></p>
						</div>
					</article>
		
		    <?php endwhile; ?>
		    </section>
       <?php
       endif;
?>





<div class="overlay"></div>
    <div class="overlay-back"></div>
    <div id="calendly-popin">
            <img class="popin-close" src="<?php echo get_template_directory_uri(); ?>/img/cross.png" alt="close">

            <!-- Début de widget en ligne Calendly -->
            <div class="calendly-inline-widget" data-url="https://calendly.com/eklaparis/rdvboutique" style="min-width:320px;height:630px;"></div>

            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
            <!-- Fin de widget en ligne Calendly -->
    </div>
	
</main>

	

<?php
get_footer();
