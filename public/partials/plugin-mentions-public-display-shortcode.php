<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://thierrycharriot.github.io
 * @since      1.0.0
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php get_header(); ?>

<div class="container mt-3">
	<div class="row">

		<main id="primary" class="site-main col-12 col-md-9">

		<article class="card m-3" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<header class="entry-header card-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="card-body">
				<div class="entry-content">
				<?php 
					// https://developer.wordpress.org/reference/functions/get_userdata/
					// get_userdata( int $user_id ): WP_User|false
					// Retrieves user info by user ID.
					$user_infos = get_userdata(1); 
					//var_dump($user_infos)
					$user_courriel = $user_infos->user_email;
					$user_courriel = str_replace( '@', ' (signe bizarre) ', $user_courriel );
				?>

					<p>
						Ce site est édité par :
						<?php echo $user_infos->first_name .  " " . $user_infos->last_name; ?><br>
						Courriel: 
						<?php echo $user_courriel; ?>
					</p>

					<p>
						Ce site est hébergé par :
						<span id="domain"></span>
						<script>
							let hostname = location.hostname;
							document.getElementById( 'domain' ).innerHTML =  hostname;
						</script>
					</p>

					<p>
						Le directeur de publication du site est :
						<?php echo $user_infos->first_name .  " " . $user_infos->last_name; ?>
					</p>

					<p>
						Le site est réalisé par :
						<?php echo $user_infos->first_name .  " " . $user_infos->last_name; ?>
					</p>
					
					<p>
						Le site est soumis à la loi française et est régi par les dispositions du Code de la propriété intellectuelle.
					</p>

					<p>
						Les informations contenues sur ce site sont protégées par le droit d'auteur. Toute reproduction ou utilisation de ces informations doit faire l'objet d'une autorisation préalable de la part de l'éditeur.
					</p>

					<p>
						Les informations contenues sur ce site sont fournies "telles quelles" et sans garantie d'aucune sorte, expresse ou implicite. L'éditeur ne pourra être tenu responsable des erreurs, d'une absence de disponibilité des informations et des dommages résultant de leur utilisation.
					</p>

					<p>
						L'éditeur du site se réserve le droit de modifier, à tout moment et sans préavis, le contenu de ce site.
					</p>

					<p>
						Le site peut contenir des liens hypertextes vers d'autres sites qui ne sont pas édités par l'éditeur. Ces liens sont proposés à titre indicatif et l'éditeur décline toute responsabilité quant aux contenus de ces sites.
					</p>

					<P>
						Conformément à la loi "Informatique et Libertés" du 6 janvier 1978, vous disposez d'un droit d'accès, de rectification et de suppression des données qui vous concernent. Pour exercer ce droit, vous pouvez vous adresser à l'éditeur du site à l'adresse mentionnée ci-dessus.
					</P>

					<p>
						<!--Aucune donnée personnelle n'est collectée à l'insu de l'utilisateur. Aucune donnée personnelle n'est cédée à des tiers.-->
					</p>	

				</div><!-- .entry-content -->
			</div><!-- card-body -->

		</article>

		</main><!-- #main -->

		<?php
			get_sidebar();
		?>

	</div><!-- row -->
</div><!-- container -->

<?php
get_footer();
