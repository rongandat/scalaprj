<?php
/*
Template Name: Contact Template
*/
?>
<?php
get_header(); ?>
get_template_part('header', 'title');
<?php
	$mtheme_pagestyle= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
	$floatside="float-left";
	if ($mtheme_pagestyle=="nosidebar") { $floatside=""; }
	if ($mtheme_pagestyle=="rightsidebar") { $floatside="float-left"; }
	if ($mtheme_pagestyle=="leftsidebar") { $floatside="float-right"; }
?>
<div class="page-contents-wrap <?php echo $floatside; ?> <?php if ($mtheme_pagestyle != "nosidebar") { echo 'two-column'; } ?>">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<div class="entry-page-wrapper entry-content clearfix">
			
			<?php the_content() ?> <!-- Display Content -->
				
				<div>
							<h3><?php echo stripslashes_deep (of_get_option('ctemplate_title')); ?></h3>
							<div id="contactform">
								<div id="successmessage">
										<?php echo stripslashes_deep (of_get_option('ctemplate_thankyou')); ?>
								</div>
								<form id="contact">
									<fieldset>
										<label for="name" id="name_label"><?php echo stripslashes_deep (of_get_option('ctemplate_lname')); ?></label>
										<div class="error" id="error-name">
											<?php echo stripslashes_deep (of_get_option('ctemplate_errorname')); ?>
										</div>
										<input type="text" name="name" id="name" size="60" value="" class="text-input"/>
										<label for="email" id="email_label"><?php echo of_get_option('ctemplate_lemail'); ?></label>
										<div class="error" id="error-email-msg1">
											<?php echo stripslashes_deep (of_get_option('ctemplate_erroremail')); ?>
										</div>
										<div class="error" id="error-email-msg2">
											<?php echo stripslashes_deep (of_get_option('ctemplate_invalidemail')); ?>
										</div>
										<input type="text" name="email" id="email" size="60" value="" class="text-input"/>
										<label for="subject" id="subject_label"><?php echo stripslashes_deep (of_get_option('ctemplate_lsubject')); ?></label>
										<input type="text" name="subject" id="subject" size="60" value="" class="text-input"/>
										<label for="msg" id="msg_label"><?php echo stripslashes_deep (of_get_option('ctemplate_lmessage')); ?></label>
										<div class="error" id="error-message">
											<?php echo stripslashes_deep (of_get_option('ctemplate_errormsg')); ?>
										</div>
										<textarea cols="60" rows="10" name="msg" id="msg" class="text-input"></textarea>
										<button type="submit" name="submit" class="button form-button" id="submit_button"><?php echo stripslashes_deep (of_get_option('ctemplate_button')); ?></button>
									</fieldset>
								</form>
							</div>
							<!-- end of contactform -->
						</div>
				<div class="clear"></div>
			</div>

	</div>

	
 <!-- Post Loop -->
<?php endwhile; ?>

<?php endif; ?>
</div>
<?php
global $mtheme_pagestyle;
if ($mtheme_pagestyle=="rightsidebar" || $mtheme_pagestyle=="leftsidebar" ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>