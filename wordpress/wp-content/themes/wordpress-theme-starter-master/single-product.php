<?php
/*
 * Template Name: Single-Product
 * Template Post Type: post
 */
// vars
$Shirt_size = get_field('shirt_size');
$Description = get_field('description');
$Price = get_field('price');
$On_sale = get_field('on_sale');
$Sale_price = get_field('sale_price');
$Product_Image = get_field('product_image');
$Quantity = get_field('quantity');
$Affillate_external = get_field('affiliate_external');
$External_URL = get_field('external_link');

get_header(); ?>
	<div class="container">
		<main>
			<div class="title"><h1 class="text-center"><?php the_title(); ?></h1></div>
			<?php if( $Product_Image ): ?>
				<div class="product_img">
					<img src="<?php echo $Product_Image['url']; ?>" alt="<?php echo $Product_Image['alt']; ?>">
				</div>
			<?php endif; ?>
			<?php if( $Description ): ?>
				<div class="description">
					<p><?php echo $Description; ?></p>
				</div>
			<?php endif; ?>
		</main>
		<aside>
			<?php if( $Price ): ?>
				<div class="price">
					<h3>Price: $<?php echo $Price; ?></h3>
				</div>
			<?php endif; ?>
			<?php if( $On_sale == 1 && $Sale_price != 0): ?>
				<div class="on_sale">
					<h3> On Sale for $<?php echo $Sale_price;?></h3>
				</div>
			<?php endif; ?>
			<?php if( $Quantity < 10 ): ?>
				<div class="quantity">
					<h3> Hurry! Only <strong style="color: red; font-weight: 700;"><?php echo $Quantity;?></strong> left!</h3>
				</div>
			<?php endif; ?>
			<?php
				if($Shirt_size)
				{
					echo '<select>';
					foreach($Shirt_size as $value) {
						foreach($value as $value) {
							echo '<option>' . $value. '</option>';
						}
					}
					echo '</select>';
				}
			?>

			<a href="" role="button" class="btn buy_now">Buy Now</a>

		</aside>
	</div>




		<!-- loop -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>
			<!-- article -->
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			</article>
			<!-- /article -->
		<?php endif; ?>


<?php get_footer(); ?>
