<?php
$name = $categorie->name;
?>
		<div class="categorie_produit">
			<h2><?=$name?></h2>
			<?php
			$slug = $categorie->slug;
			// on récupère les produits voulu (catégorie audio)
			$args = array(
				// permet de sélectionner par post-type
					'post_type'=>'produit',

					// précise le nombre maximum de post à afficher
					'posts_per_page'=>4,

					//premet de séléctionner par taxonomie
					'tax_query'=>array(
					
						array(
							'taxonomy'=>'categorie_produit',
							'field'=>'slug',
							'terms'=>$slug,
						),
					),
				);

		$query = new WP_Query($args);
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();
				$image = get_the_post_thumbnail();
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$url = get_post_permalink();
		
				?>
				
				<a class="categorie_produit_item" href="<?=$url?>">
					<?=$image?>
					<h3><?=$title?></h3>
					<!--<p>$excerpt</p>-->
				</a>
				
				<?php
			}
		}
		?>
	</div>