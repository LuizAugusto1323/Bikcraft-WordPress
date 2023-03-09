<?php 
/*
 Template Name: Portfolio
 */
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php include(TEMPLATEPATH . '/inc/introducao.php'); ?>

		<section class="container animar-interno">
			<ul class="rslides">
			<?php 
			$quotes = get_field2('quote');
			if (isset($quotes)) { foreach ($quotes as $quote) { ?>
			<li>
					<blockquote class="quote_clientes">
						<p><?php echo $quote['descricao_quote'];?></p>
						<cite><?php echo $quote['autor_quote'];?></cite>
					</blockquote>
				</li>
			<?php } } ?>
			</ul>
		</section>

		<section class="portfolio">
			<div class="container">
			<?php include(TEMPLATEPATH . '/inc/clientes-portfolio.php'); ?>
			</div>
		</section>

		<?php endwhile; else: endif; ?>
<?php get_footer(); ?>