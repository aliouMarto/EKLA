<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ekla_byAli
 */


get_header();
?>


    <main class="main">
        <!-- REQUETE RECUPERATION IMAGE BOUTIQUE -->

        <?php $arg_boutique = array(

            'post_type' => 'boutique',
            'posts_per_page' => -1
        );

        $req_boutique = new WP_Query($arg_boutique);

        ?>





        <?php if ($req_boutique->have_posts()): ?>
            <section class="boutique">
                <?php while ($req_boutique->have_posts()): $req_boutique->the_post(); ?>

                    <?php $image_boutique = get_field('image_boutique'); ?>


                    <article>
                        <img src="<?php echo esc_url($image_boutique['url']); ?>"
                             alt="<?php echo esc_attr($image_boutique['alt']); ?>"/>
                    </article>

                <?php endwhile; ?>
            </section>
        <?php
        endif;
        ?>



        <?php if (have_posts()): ?>


            <?php while (have_posts()): the_post(); ?>

                <h2 class="title_marque"><?php the_field('titre_bloc_marque'); ?></h2>

            <?php endwhile; ?>

        <?php
        endif;
        ?>


        <!-- REQUETE IMAGES MARQUES -->

        <?php $arg_marque = array(

            'post_type' => 'marques',
            'posts_per_page' => -1
        );

        $req_marque = new WP_Query($arg_marque);

        ?>


        <?php if ($req_marque->have_posts()): ?>
            <section class="marque container">
                <?php while ($req_marque->have_posts()): $req_marque->the_post(); ?>

                    <?php $image_marque = get_field('image_marque'); ?>


                    <article>
                        <img src="<?php echo esc_url($image_marque['url']); ?>"
                             alt="<?php echo esc_attr($image_marque['alt']); ?>"/>
                    </article>

                <?php endwhile; ?>
            </section>
        <?php
        endif;
        ?>

        <?php if (have_posts()): ?>


            <?php while (have_posts()): the_post(); ?>

                <div class="desc_text_marque"><?php the_field('texte_marque'); ?></div>

            <?php endwhile; ?>

        <?php
        endif;
        ?>




        <?php if (have_posts()): ?>


            <?php while (have_posts()): the_post(); ?>

                <h2 class="title_collection"><?php the_field('titre_bloc_collection'); ?></h2>

            <?php endwhile; ?>

        <?php
        endif;
        ?>


        <!-- REQUETE IMAGES MARQUES -->

        <?php $arg_collections_home = array(

            'post_type' => 'collections_home',
            'posts_per_page' => -1
        );

        $req_collections_home = new WP_Query($arg_collections_home);

        ?>


        <?php if ($req_collections_home->have_posts()): ?>
            <section class="collections_home container">
                <?php while ($req_collections_home->have_posts()): $req_collections_home->the_post(); ?>

                    <?php $image_collections_home = get_field('image_clt_home'); ?>
                    <?php $description_img = get_field('description_img'); ?>


                    <article class="img_collection">
                        
                            <img src="<?php echo esc_url($image_collections_home['url']); ?>"
                                 alt="<?php echo esc_attr($image_collections_home['alt']); ?>"/>
                            <p class="desc"><?php echo $description_img; ?></p>
                    
                    </article>

                <?php endwhile; ?>

            </section>
        <?php
        endif;
        ?>


        <?php if (have_posts()): ?>

         
                 <?php while (have_posts()): the_post(); ?>
                   
                    <?php $title_cta_collections = get_field('title_cta_collections'); ?>
                    <?php $url__cta_collections = get_field('url__cta_collections'); ?>
                    
                <div class="cta_collection"><a href="<?php echo $url__cta_collections; ?>"><?php echo $title_cta_collections; ?></a></div>
        
                <?php endwhile; ?>
         
                   <?php
                   endif;
                 ?>


       <?php if (have_posts()): ?>

         
            <?php while (have_posts()): the_post(); ?>
                    
                <div class="titre_none"><?php the_field('titre_none') ;?></div>
        
            <?php endwhile; ?>
         
       <?php
       endif;
?>




<?php $choix_img_video=get_field('choix_img_video');?>



<?php if($choix_img_video=="image") : ?>



<?php if (have_posts()): ?>

          <div class="video container">
            <?php while (have_posts()): the_post(); ?>

                
                <h2><?php $titre_video = the_field('titre'); ?></h2>

                <?php $img_vlr = get_field('image'); ?>

                <section class="bloc_video_text">

                <img src="<?php echo esc_url($img_vlr['url']); ?>" alt="<?php echo esc_attr($img_vlr['alt']); ?>" />

                <div class="text_video"><?php $text_video = the_field('texte'); ?></div>
        
            <?php endwhile; ?>
            </section>

        <?php
        endif;
        ?>
          </div>

 <?php
   endif;
?>



<?php if($choix_img_video=="video") : ?>


  <?php if (have_posts()): ?>
          
          <?php $choix_img_video=get_field('choix_img_video');?>
          <div class="video container">
            <?php while (have_posts()): the_post(); ?>

                
                <h2><?php $titre_video = the_field('titre'); ?></h2>

                <section class="bloc_video_text">

                <?php $video = the_field('video'); ?>

                <div class="text_video"><?php $text_video= the_field('texte'); ?></div>
        
            <?php endwhile; ?>
            </section>

           <?php
                endif;
           ?>
          </div>


 <?php
    endif;
 ?>



        <?php if (have_posts()): ?>

            <?php while (have_posts()): the_post(); ?>

                <?php $img_bg = get_field('img_bg'); ?>

                <?php if ($img_bg): ?>
                    <section class="bg_rdv" style="background-image: url(<?php echo esc_url($img_bg['url']); ?>);">

                        <div class="text_rdv">
                            <?php the_field('text_bg_rdv'); ?>
                        </div>

                        <div class="cta cta_rdv">
                            <?php the_field('text_cta_rdv'); ?>
                        </div>
                    </section>

                    <div class="calend">
                        <?php the_field('code_calendly'); ?>
                    </div>
                <?php endif ?>

            <?php endwhile; ?>

        <?php
        endif;
        ?>


        <?php $choix_bloc = get_field('bloc_choix'); ?>


        <?php if ($choix_bloc == "caroussel") : ?>


            <?php if (have_posts()): ?>

                <div class="carousel">
                <?php while (have_posts()): the_post(); ?>


                    <h2><?php $titre_video = the_field('titre_crl'); ?></h2>

                    <section class="bloc_carousel">

                    <div class="carousel_img">
                        <?php the_field('caroussel'); ?>
                    </div>
                    <div class="description_crl"><?php the_field('description_crl'); ?></div>

                <?php endwhile; ?>
                </section>
            <?php
            endif;
            ?>
            </div>

        <?php
        endif;
        ?>


        <?php if ($choix_bloc == "evenement") : ?>


            <?php if (have_posts()): ?>


                <?php while (have_posts()): the_post(); ?>

                    <h2><?php $titre_ev = the_field('titre_ev'); ?></h2>

                <?php endwhile; ?>

            <?php
            endif;
            ?>

            <?php if (have_posts()): ?>

                <section class="event_one container">
                <?php while (have_posts()): the_post(); ?>

                    <?php $image_ev = get_field('image_ev'); ?>
                    <?php $cta_ev = get_field('cta_ev'); ?>
                    <?php $url_cta = get_field('url_cta'); ?>


                    <div class="event_one_text">

                        <article>
                            <div class="text"><?php $texte_ev = the_field('texte_ev'); ?></div>

                            <div class="cta cta_event">
                                <a href="<?php echo $url_cta; ?>"><?php echo $cta_ev; ?></a>
                            </div>
                        </article>

                        <div class="img_event_one">
                            <img src="<?php echo esc_url($image_ev['url']); ?>"
                                 alt="<?php echo esc_attr($image_ev['alt']); ?>"/>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php
            endif;
            ?>
            </section>

        <?php
        endif;
        ?>




        <?php if (have_posts()): ?>

            <section class="newsletters container">
                <?php while (have_posts()): the_post(); ?>

                    <div class="newsletters">
                        <?php the_field('newsletters'); ?>
                    </div>

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
            <div class="calendly-inline-widget" data-url="https://calendly.com/eklaparis/rdvboutique"
                 style="min-width:320px;height:630px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
            <!-- Fin de widget en ligne Calendly -->
        </div>

    </main>


    <!-- <div class="calendly-inline-widget" style="min-width: 320px; height: 630px;" data-url="https://calendly.com/eklaparis/rdvboutique"></div>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> -->


<?php
get_footer();
