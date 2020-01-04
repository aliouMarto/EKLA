<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ekla_byAli
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<!-- <link rel="apple-touch-icon" sizes="57x57" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php //echo get_template_directory_uri(); ?>/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php //echo get_template_directory_uri(); ?>/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php //echo get_template_directory_uri(); ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php //echo get_template_directory_uri(); ?>/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php //echo get_template_directory_uri(); ?>/img/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php //echo get_template_directory_uri(); ?>/img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff"> -->


	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>

		<div class="navigation">
			<nav>
			<?php


			wp_nav_menu( array(
				'theme_location' => 'header_menu',
				'menu_id'        => 'primary-menu',
			) );
			?>

		</nav>



          <?php $arg_reseaux_sociaux = array(

		   'post_type' => 'reseaux_sociaux',
		   'posts_per_page' => -1
		);

		$req_reseaux_sociaux = new WP_Query($arg_reseaux_sociaux);

		?>
       
	       <div class="social">

			<?php if ($req_reseaux_sociaux->have_posts()): ?>
			     
						<?php while ($req_reseaux_sociaux->have_posts()): $req_reseaux_sociaux->the_post(); ?>

							<?php $image_reseaux_sociaux = get_field('icone_du_reseau'); ?>
							<?php $lien_reseau = get_field('lien_reseau'); ?>

							
								<a href="<?php echo $lien_reseau ?>" target="blank"><img src="<?php echo esc_url($image_reseaux_sociaux['url']); ?>" alt="<?php echo esc_attr($image_reseaux_sociaux['alt']); ?>" /></a>
					
					    <?php endwhile; ?>
					    
			       <?php
			       endif;
			?>
				
			</div>



</div>



   <?php if ( is_front_page() ): ?>

		<!-- REQUETE headerS -->


		<?php $arg_header = array(

		   'post_type' => 'header',
		   'posts_per_page' => 1
		);

		$req_header = new WP_Query($arg_header);

		?>

       
		<?php if ($req_header->have_posts()): ?>

		            <section class="section_header header-container">
					<?php while ($req_header->have_posts()): $req_header->the_post(); ?>

						<!-- VARIABLES -->

						<?php $logo_header = get_field('logo'); ?>
						<?php $call_to_action_texte = get_field('call_to_action_texte'); ?>
                        <?php $url_call_to_action = get_field('url_call_to_action'); ?>


						
                        <?php if($logo_header) : ?>
							<article class="bloc_logo">
								<img class="logo" src="<?php echo esc_url($logo_header['url']); ?>" alt="<?php echo esc_attr($logo_header['alt']); ?>" />
							</article>
						<?php endif; ?>


						
                        
							
								<div class="text_intro"> <?php the_field('texte_intro'); ?> </div>
							
						


						<?php if($call_to_action_texte) : ?>
							<div class="cta bloc_cta">
								<a href="<?php echo $url_call_to_action; ?>"><?php echo $call_to_action_texte; ?></a>
							</div>
						<?php endif; ?>
				
				    <?php endwhile; ?>

				    <?php
		              endif;
		            ?>
				    </section>

    <?php
		endif;
    ?>


	</header>

	
