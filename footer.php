<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ekla_byAli
 */

?>




<footer>
		<?php $arg_footer = array(

	   'post_type' => 'footer',
	   'posts_per_page' => -1
	);

	$req_footer = new WP_Query($arg_footer);

	?>


	<?php if ($req_footer->have_posts()): ?>
	            <section class="footer">
				<?php while ($req_footer->have_posts()): $req_footer->the_post(); ?>

					  

					
						<article>
							<?php the_field('adresse'); ?>
						</article>
						<article>
							<?php the_field('horaire'); ?>
						</article>
						<article>
							<?php the_field('contact'); ?>
						</article>

						<div class="map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.4446271737547!2d2.3073733156740683!3d48.84973127928672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670259b3657ef%3A0xcb3dc57a74410cfb!2s9%20Villa%20de%20Saxe%2C%2075007%20Paris!5e0!3m2!1sfr!2sfr!4v1577650696075!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
			
			    <?php endwhile; ?>
			    </section>
	       <?php
	       endif;
	?>





<?php wp_footer(); ?>



</footer>

</body>
</html>
