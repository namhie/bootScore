<?php

/**
 * Deprecated, functions moved to wc-functions.php, delete file in v6.
 *
 * This empty file is needed to not crash existing bootcommerce-child installations
 * because they have require get_template_directory() . '/woocommerce/woocommerce-functions.php';
 * in their functions.php.
 */
add_theme_support( 'wc-product-gallery-slider' );
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;

    return '... <a role="button" href="'.get_permalink($post).'" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseExample"><span class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover text-nowrap">Читать далее</span></a>';


	// return '... <a href="'. get_permalink($post) . '">Читать дальше</a>';
}
add_filter( 'excerpt_length', function(){
	return 16;
} );
add_action( 'woocommerce_product_options_advanced', 'rudr_product_field' );
function rudr_product_field(){

	echo '<div class="options_group">';
	woocommerce_wp_text_input(
		array(
			'id'      => 'product_link_video',
			'value'   => get_post_meta( get_the_ID(), 'product_link_video', true ),
			'label'   => 'Сылка видео',
			'desc_tip' => true,
			'description' => 'Вставьте сылку на видео',
		)
	);
	echo '</div>';

}
add_action( 'woocommerce_process_product_meta', 'rudr_save_field' );
function rudr_save_field( $id ){

	$super = isset( $_POST[ 'product_link_video' ] ) ? $_POST[ 'product_link_video' ] : "";
	update_post_meta( $id, 'product_link_video', $super );

}

function custom_login_redirect( $redirect_to, $request, $user ) {
    // Get the current user's role
    if ( isset($_GET['blocklyfile'] ) ) {
		wp_redirect('./blockly/blockly?blocklyfile=' . $_GET['blocklyfile']);
	}


    return $redirect_to;
}
add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );



// Not Use
function categories_single_product_bottom() {
	$taxonomy     = 'product_cat';
	$orderby      = 'name';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 0;

	$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty
	);
	$all_categories = get_categories( $args );

	$html = '';
	foreach ($all_categories as $cat) {
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;

			$cat_url = get_term_link($cat->slug, $taxonomy);
			$cat_name = $cat->name;
			if ( $cat_name == 'Misc') continue;

			$args2 = array(
					'taxonomy'     => $taxonomy,
					'child_of'     => 0,
					'parent'       => $category_id,
					'orderby'      => $orderby,
					'show_count'   => $show_count,
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'hide_empty'   => $empty
			);
			$sub_cats = get_categories( $args2 );
			$html_inner = '';
			if($sub_cats) {
				$isset_sub_class = 'form-list';
				$html_inner = '<a class="d-block" data-bs-toggle="collapse" href="#collapseCatalogItem'.$category_id.'" role="button" aria-controls="collapseCatalogItem'.$category_id.'">
									<input class="form-check-input" type="checkbox" value="" id="'.$category_id.'">
									<label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>
									<div class="form-check-arrow"></div>
								</a>
								<div class="collapse" id="collapseCatalogItem'.$category_id.'">
								';
				foreach($sub_cats as $sub_category) {
					$sub_category_id = $sub_category->term_id;
					$sub_cat_name = $sub_category->name;
					$html_inner .= '<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="'.$sub_category_id.'">
										<label class="form-check-label" for="'.$sub_category_id.'">'.$sub_cat_name.'</label>
									</div>';
				}
				$html_inner .= '</div>';
			} else {
				$isset_sub_class = '';
				$html_inner = '<input class="form-check-input" type="checkbox" value="" id="'.$category_id.'">
								<label class="form-check-label" for="'.$category_id.'">'.$cat_name.'</label>';
			}
			$html .= '<div class="form-check border-bottom py-2 '.$isset_sub_class.'"> '.$html_inner.' </div>';
		}
	}
	$wrapper = '<div class="form-check border-bottom py-2">
					<input class="form-check-input" type="checkbox" value="" id="user_announcements">
					<label class="form-check-label" for="user_announcements">Мои объявления</label>
				</div>' . $html;
	echo $wrapper;
}
function filter_single_product_bottom( $type, $categories = [] ) {
	$categories_list = isset($_POST['categories_ids']) ? $_POST['categories_ids'] : $categories;
	if ( !$categories_list ) {
		$categories_list = [ ];
	}

	$data_query = [
		'status'    => 'publish',
		'limit'     => 4,
		'product_category_id' => $categories_list
	];
	$products = wc_get_products( $data_query);

	if ( in_array( 'user_announcements', $categories ) ) {
		unset($data_query['product_category_id']);

		$data_query['author'] = get_current_user_id();

		$products_author = wc_get_products($data_query);
		foreach ($products_author as $key => $product) {
			$products[] = $product;
		}
	}

	ob_start();
	foreach ($products as $_product) {
		$thumbnail_url = get_the_post_thumbnail_url( $_product->get_id() );
		if ( !$thumbnail_url) $thumbnail_url = wc_placeholder_img_src('thumb');
		?>
			<div class="d-flex mb-5">
				<div class="flex-shrink-0"><img class="img-fluid img-flex-card rounded me-3" src="<?= $thumbnail_url ?>" alt=""></div>
					<div class="flex-grow-1 py-0">
						<div class="row">
						<div class="col-xl-7"><a class="d-block fw-bold" href="<?php echo get_post_permalink($_product->get_id()) ?>"><?php echo $_product->get_name() ?></a>
							<p class="fs-6 mb-2">Купить абонемент или билет на занятие</p>
							<?php if( current_user_can('edit_pages') ) { ?>
								<a class="link-success redact" href="ge<?php echo get_edit_post_link($_product->get_id()) ?>">Редактировать</a>
							<?php } ?>
							<div class="mb-3">
							<div class="collapse" id="addDescrCard">
								<div class="card card-body px-0">
								<textarea class="form-control" id="textareaCardDescription" name="" cols="30" rows="2"></textarea>
								</div>
								<button class="btn btn-sm btn-secondary">Добавить </button>
							</div>
							</div>
						</div>
						<div class="col-xl-2">
							<div class="d-flex flex-column justify-content-center align-items-start">

							<h5 class="text-danger text-nowrap m-0"><?php echo $_product->get_price() . ' ' . get_woocommerce_currency_symbol()?></h5>
							<?php if ( $_product->get_regular_price() ) { ?>
								<p class="text-decoration-line-through"><?php echo $_product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?></p>
							<?php }?>

							</div>
						</div>
						<div class="col-xl-3">
							<div class="count d-flex flex-md-wrap flex-nowrap">
							<div class="count-content collapse pe-2" id="collapseCartCatalog1" data-bs-delay="{&quot;show&quot;:0,&quot;hide&quot;:150}"><span class="change minus min d-flex justify-content-center align-items-center"><span>-</span></span>
								<input type="text" name="productСount" value="1" disabled=""><span class="change plus d-flex justify-content-center align-items-center"><span>+</span></span>
							</div>
							<div class="btn-block ms-auto" href="#collapseCartCatalog1" data-bs-toggle="collapse">
								<button class="btn btn-primary w-100">
								<svg class="bi bi-basket" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
									<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"></path>
								</svg><span>В корзину</span>
								</button>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
	$contetn = ob_get_contents();
	ob_end_clean();
	if ( $type == 'front' ) {
		echo  $contetn;
	} else if ( $type == 'ajax' ) {
		echo json_encode($contetn, JSON_UNESCAPED_SLASHES);
		wp_die();
	}
}