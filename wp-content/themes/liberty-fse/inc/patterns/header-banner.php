<?php 
/**
 * Default Header Banner
 */
return array(
	'title'      => esc_html__( 'Header Banner', 'liberty-fse' ),
	'categories' => array( 'liberty-fse', 'Header Banner' ),
	'content'    => '<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()).'/assets/images/header-banner.jpg","id":20,"dimRatio":50,"minHeight":679,"className":"hdrbanner-BX"} -->
<div class="wp-block-cover hdrbanner-BX" style="min-height:679px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-20" alt="" src="'.esc_url(get_template_directory_uri()).'/assets/images/header-banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0","margin":{"top":"0"}}},"className":"bannerInfo","layout":{"type":"constrained","wideSize":"600px"}} -->
<div class="wp-block-group bannerInfo" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"textAlign":"center","level":6,"style":{"typography":{"lineHeight":"1.0","fontSize":"16px","textTransform":"none"},"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"color":{"background":"#ad6004"}},"textColor":"foreground"} -->
<h6 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-background" style="background-color:#ad6004;margin-bottom:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);font-size:16px;line-height:1.0;text-transform:none">Countrys #1 History Museum</h6>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"50px","textTransform":"none","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"foreground"} -->
<h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60);font-size:50px;font-style:normal;font-weight:700;text-transform:none">Its not a Museum, Its a Place of Living Ideas</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","textColor":"foreground","style":{"typography":{"fontSize":"16px"},"color":{"background":"#ad6004"}},"className":"is-style-fill"} -->
<div class="wp-block-button has-custom-font-size is-style-fill" style="font-size:16px"><a class="wp-block-button__link has-foreground-color has-text-color has-background has-text-align-center wp-element-button" style="background-color:#ad6004">Discover More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);