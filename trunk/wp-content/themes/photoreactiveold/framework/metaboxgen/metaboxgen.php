<?php

function mtheme_generate_sidebarlist( $sidebarlist_type ) {
	if ($sidebarlist_type=="portfolio") {
		$sidebar_options=array('Default Portfolio Sidebar');
		array_push($sidebar_options, 'Default Sidebar');
		for ($sidebar_count=1; $sidebar_count <=MTHEME_MAX_SIDEBARS; $sidebar_count++ ) {

			if ( of_get_option('theme_sidebar'.$sidebar_count) <> "" ) {
				$active_sidebar = of_get_option('theme_sidebar'.$sidebar_count);
				array_push($sidebar_options, $active_sidebar);
			}
		}
	}
	if ($sidebarlist_type=="post" || $sidebarlist_type=="page" ) {
		$sidebar_options=array('Default Sidebar');
		for ($sidebar_count=1; $sidebar_count <=MTHEME_MAX_SIDEBARS; $sidebar_count++ ) {

			if ( of_get_option('theme_sidebar'.$sidebar_count) <> "" ) {
				$active_sidebar = of_get_option('theme_sidebar'.$sidebar_count);
				array_push($sidebar_options, $active_sidebar);
			}
		}
	}
	if ($sidebarlist_type=="mini") {
		$sidebar_options=array('Default Portfolio Mini Sidebar');
		array_push($sidebar_options, 'Default Portfolio Sidebar');
		array_push($sidebar_options, 'Default Sidebar');
		for ($sidebar_count=1; $sidebar_count <=MTHEME_MAX_SIDEBARS; $sidebar_count++ ) {

			if ( of_get_option('theme_sidebar'.$sidebar_count) <> "" ) {
				$active_sidebar = of_get_option('theme_sidebar'.$sidebar_count);
				array_push($sidebar_options, $active_sidebar);
			}
		}
	}
	return $sidebar_options;
}

//METABOX SAVE
if ('post-new.php' == basename($_SERVER['PHP_SELF']) || 'post.php' == basename($_SERVER['PHP_SELF'])) {
	add_action('admin_init', 'mtheme_add_box');
	add_action('save_post', 'mtheme_checkdata');
}

function mtheme_generate_metaboxes($meta_data,$post) {
		// Use nonce for verification
	//echo basename(__FILE__);
	echo '<input type="hidden" name="mtheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="metabox-wrapper">';


	foreach ($meta_data['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		$class="";
		$trigger_element="";
		$trigger="";
		
		$titleclass="is_title";
		if ( isSet($field['heading']) ) {
			if ( $field['heading']=="subhead" ) $titleclass="is_subtitle";
		}

		if (isset($field['class'])) {
			$class = $field['class'];
		}
		if (isset($field['triggerStatus'])) {
			if ($field['triggerStatus']=="on") $trigger_element="trigger_element";
			$trigger = "<span data-toggleClass='".$field['toggleClass']."' ";
			$trigger .= "data-toggleAction='".$field['toggleAction']."' ";
			$trigger .= "data-toggleTrigger='".$field['toggleTrigger']."' ";
			$trigger .= "></span>";
		}
		
		echo '<div class="metabox-fields metaboxtype_', $field['type'] ,' '. $class . " " . $titleclass. " " . $trigger_element .'">',
				$trigger,
				'<div class="metabox_label"><label for="', $field['id'], '"></label></div>';
		if ( isSet($field['type']) ) {
			
			if ( $field['type']!="break" ) {
				if ( $field['name']!="" ) {
					echo '<div id="'.$field['id'].'" class="sectiontitle clearfix">'.$field['name'].'</div>';
				}
			}

			if ( $field['type']=="break" ) {
				echo '<div id="'.$field['id'].'" class="maintitle clearfix">'.$field['sectiontitle'].'</div>';
			}
			
			switch ($field['type']) {



			case 'image_gallery':
			?>
<script>
/* <![CDATA[ */
jQuery(function($) {
	var frame,
	    images = '<?php echo get_post_meta( $post->ID, '_mtheme_image_ids', true ); ?>',
	    selection = loadImages(images);

	$('#mtheme_images_upload').on('click', function(e) {
		e.preventDefault();

		// Set options for 1st frame render
		var options = {
			title: '<?php _e("Create Featured Gallery", "mthemelocal"); ?>',
			state: 'gallery-edit',
			frame: 'post',
			selection: selection
		};

		// Check if frame or gallery already exist
		if( frame || selection ) {
			options['title'] = '<?php _e("Edit Featured Gallery", "mthemelocal"); ?>';
		}

		frame = wp.media(options).open();
		
		// Tweak views
		frame.menu.get('view').unset('cancel');
		frame.menu.get('view').unset('separateCancel');
		frame.menu.get('view').get('gallery-edit').el.innerHTML = '<?php _e("Edit Featured Gallery", "mthemelocal"); ?>';
		frame.content.get('view').sidebar.unset('gallery'); // Hide Gallery Settings in sidebar

		// When we are editing a gallery
		overrideGalleryInsert();
		frame.on( 'toolbar:render:gallery-edit', function() {
			overrideGalleryInsert();
		});
		
		frame.on( 'content:render:browse', function( browser ) {
		    if ( !browser ) return;
		    // Hide Gallery Settings in sidebar
		    browser.sidebar.on('ready', function(){
		        browser.sidebar.unset('gallery');
		    });
		    // Hide filter/search as they don't work
		    browser.toolbar.on('ready', function(){
			    if(browser.toolbar.controller._state == 'gallery-library'){
			        browser.toolbar.$el.hide();
			    }
		    });
		});
		
		// All images removed
		frame.state().get('library').on( 'remove', function() {
		    var models = frame.state().get('library');
			if(models.length == 0){
			    selection = false;
				$.post(ajaxurl, { ids: '', action: 'mtheme_save_images', post_id: mtheme_ajax.post_id, nonce: mtheme_ajax.nonce });
			}
		});
		
		// Override insert button
		function overrideGalleryInsert() {
			frame.toolbar.get('view').set({
				insert: {
					style: 'primary',
					text: '<?php _e("Save Featured Gallery", "mthemelocal"); ?>',

					click: function() {
						var models = frame.state().get('library'),
						    ids = '';

						models.each( function( attachment ) {
						    ids += attachment.id + ','
						});

						this.el.innerHTML = '<?php _e("Saving...", "mthemelocal"); ?>';
						
						$.ajax({
							type: 'POST',
							url: ajaxurl,
							data: { 
								ids: ids, 
								action: 'mtheme_save_images', 
								post_id: mtheme_ajax.post_id, 
								nonce: mtheme_ajax.nonce 
							},
							success: function(){
								selection = loadImages(ids);
								$('#_mtheme_image_ids').val( ids );
								frame.close();
							},
							dataType: 'html'
						}).done( function( data ) {
							$('.mtheme-gallery-thumbs').html( data );
						}); 
					}
				}
			});
		}
	});
	
	// Load images
	function loadImages(images) {
		if( images ){
		    var shortcode = new wp.shortcode({
				tag:    'gallery',
				attrs:   { ids: images },
				type:   'single'
			});

		    var attachments = wp.media.gallery.attachments( shortcode );

			var selection = new wp.media.model.Selection( attachments.models, {
				props:    attachments.props.toJSON(),
				multiple: true
			});

			selection.gallery = attachments.gallery;
			
			// Fetch the query's attachments, and then break ties from the
			// query to allow for sorting.
			selection.more().done( function() {
				// Break ties with the query.
				selection.props.set({ query: false });
				selection.unmirror();
				selection.props.unset('orderby');
			});
			
			return selection;
		}
		
		return false;
	}
	
});
/* ]]> */
</script>
			<?php
				// SPECIAL CASE:
				// std controls button text; unique meta key for image uploads
				$meta = get_post_meta( $post->ID, '_mtheme_image_ids', true );
				$thumbs_output = '';
				$button_text = ($meta) ? __('Edit Gallery', 'mthemelocal') : $field['std'];
				if( $meta ) {
					$field['std'] = __('Edit Gallery', 'mthemelocal');
					$thumbs = explode(',', $meta);
					$thumbs_output = '';
					foreach( $thumbs as $thumb ) {
						$thumbs_output .= '<li>' . wp_get_attachment_image( $thumb, 'thumbnail' ) . '</li>';
					}
				}

			    echo 
			    	'<td>
			    		<input type="button" class="button" name="' . $field['id'] . '" id="mtheme_images_upload" value="' . $button_text .'" />
			    		
			    		<input type="hidden" name="mtheme_meta[_mtheme_image_ids]" id="_mtheme_image_ids" value="' . ($meta ? $meta : 'false') . '" />

			    		<ul class="mtheme-gallery-thumbs">' . $thumbs_output . '</ul>
			    	</td>';

			    break;







				case 'display_image_attachments' :
					$images = get_children( array( 
								'post_parent' => $post->ID,
								'post_status' => 'inherit',
								'post_type' => 'attachment',
								'post_mime_type' => 'image',
								'order' => 'ASC',
								'numberposts' => -1,
								'orderby' => 'menu_order' )
								);
					if ($images) {
						foreach ( $images as $id => $image ) {
							$attatchmentID = $image->ID;
							$imagearray = wp_get_attachment_image_src( $attatchmentID , 'thumbnail', false);
							$imageURI = $imagearray[0];
							$imageID = get_post($attatchmentID);
							$imageTitle = $image->post_title;
							echo '<img src="'.$imageURI.'" alt="image" />';
						}
					} else {
						echo 'No images found.';
					}
					break;
				case 'upload':
					if ($meta!="") {
						echo '<img height="100px" src="'.$meta.'" />';
					}
					echo '<div>';
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:400px" />';
					echo '<button class="button-shortcodegen-uploader" data-id="' . $field['id'] . '" value="Upload">Upload</button>';
					echo '</div>';
					break;
				case 'text':				
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" />';
					break;
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" >', $meta ? $meta : $field['std'], '</textarea>';
					break;
				case 'select':
					$class='';
					if (isset($field['target'])) {
						$field['options'] = mtheme_get_select_target_options($field['target']);
					}
					
					if (isset($field['target'])) {
						echo '<div class="selectbox"><select name="', $field['id'], '" id="', $field['id'], '">';
						foreach ($field['options'] as $key => $option) {
							if ($key=='0') { $key = 'All the items'; }
							echo '<option value="'.$key.'"', $meta == $key ? ' selected="selected"' : '', '>', $option , '</option>';
						}
						echo '</select></div>';
					} else {
						echo '<div class="selectbox '.$class.'"><select name="', $field['id'], '" id="', $field['id'], '">';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option , '</option>';
						}
						echo '</select></div>';
					}
					
					break;

				// Basic text input
				case 'range':
					$output="";
					if ( isset($field['unit']) ) {
						$output .= '<div class="ranger-min-max-wrap"><span class="ranger-min-value">'.$field['min'].'</span>';
						$output .= '<span class="ranger-max-value">'.$field['max'].'</span></div>';
						$output .= '<div id="' . esc_attr( $field['id'] ) . '_slider"></div>';
						$output .= '<div class="ranger-bar">';
					}
					if ( !isSet($meta) || $meta=="" ) { 
						if ($meta==0) {$meta="0";} else {$meta=$field['std'];}
					}
					$meta=floatval($meta);
					$output .= '<input id="' . esc_attr( $field['id'] ) . '" class="of-input" name="' . esc_attr( $field['id'] ) . '" type="text" value="'.$meta.'"';
					
					if ( isset($field['unit']) ) {
						if (isset($field['min'])) {
							$output .= ' min="' . $field['min'];
						}
						if (isset($field['max'])) {
							$output .= '" max="' . $field['max'];
						}
						if (isset($field['step'])) {
							$output .= '" step="' . $field['step'];
						}
						$output .= '" />';
						if (isset($field['unit'])) {
							$output .= '<span>' . $field['unit'] . '</span>';
						}
						$output .= '</div>';
					} else {
						$output .= ' />';
					}

					echo $output;
					
				break;

				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="', $field['id'], '" value="', $option, '"', $meta == $option ? ' checked="checked"' : '', ' />', $option;
					}
					break;

				case 'image':
					$output="";
					foreach ($field['options'] as $key => $option) {
						$selected = '';
						$checked = '';
						//echo "---".$meta . "-----".$key;
						if ( $meta == '' ) {
							if ( isSet($field['std']) ) $meta=$field['std'];
							}
						if ( $meta != '' ) {
							if ( $meta == $key ) {
								$selected = ' of-radio-img-selected';
								$checked = ' checked="checked"';
							}
						}
						$output .= '<input type="radio" id="' . esc_attr( $field['id'] .'_'. $key) . '" class="of-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $field['id']) . '" '. $checked .' />';
						$output .= '<div class="of-radio-img-label">' . esc_html( $key ) . '</div>';
						$output .= '<img data-value="' . esc_attr( $key ) . '" src="' . esc_url( $option ) . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. esc_attr($field['id'] .'_'. $key) .'\').checked=true;" />';
					}
					echo $output;
					break;

				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
			}
		}
		if ( isSet($field['desc']) ) echo '<div class="metabox-description">', $field['desc'], '</div>';
		echo '</div>';
	}
	
	echo '</div>';
}


/**
 * Save image ids
 */
function mtheme_save_images() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset($_POST['ids']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'mtheme-nonce-metagallery' ) )
		return;
	
	if ( !current_user_can( 'edit_posts' ) ) return;
 
	$ids = strip_tags(rtrim($_POST['ids'], ','));
	update_post_meta($_POST['post_id'], '_mtheme_image_ids', $ids);

	// update thumbs
	$thumbs = explode(',', $ids);
	$thumbs_output = '';
	foreach( $thumbs as $thumb ) {
		$thumbs_output .= '<li>' . wp_get_attachment_image( $thumb, 'thumbnail' ) . '</li>';
	}

	echo $thumbs_output;

	die();
}
add_action('wp_ajax_mtheme_save_images', 'mtheme_save_images');


/*-----------------------------------------------------------------------------------*/
/*	Register related Scripts and Styles
/*-----------------------------------------------------------------------------------*/

function mtheme_metabox_portfolio_scripts() {
    global $post;
	
	if( isset($post) ) {
		wp_localize_script( 'jquery', 'mtheme_ajax', array(
		    'post_id' => $post->ID,
		    'nonce' => wp_create_nonce( 'mtheme-nonce-metagallery' )
		) );
	}
}
add_action('admin_enqueue_scripts', 'mtheme_metabox_portfolio_scripts');


// Save data from meta box
function mtheme_checkdata($post_id) {
	global $mtheme_active_metabox, $mtheme_meta_box, $mtheme_common_page_box, $mtheme_portfolio_box, $mtheme_fullscreen_box, $mtheme_video_meta_box, $mtheme_link_meta_box, $mtheme_image_meta_box, $mtheme_quote_meta_box, $mtheme_audio_meta_box, $mtheme_common_meta_box;
	//echo basename(__FILE__);
	// verify nonce
	if ( isset($_POST['mtheme_meta_box_nonce']) ) {
		if (!wp_verify_nonce($_POST['mtheme_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
//echo $portfolio_box;
	// check permissions
	if ( isset($_POST['post_type']) ) {
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
	}

	if ( isset($_POST['mtheme_meta_box_nonce']) ) {
		mtheme_savedata($mtheme_common_page_box,$post_id);
		mtheme_savedata($mtheme_portfolio_box,$post_id);
		mtheme_savedata($mtheme_fullscreen_box,$post_id);
		mtheme_savedata($mtheme_video_meta_box,$post_id);
		mtheme_savedata($mtheme_link_meta_box,$post_id);
		mtheme_savedata($mtheme_image_meta_box,$post_id);
		mtheme_savedata($mtheme_quote_meta_box,$post_id);
		mtheme_savedata($mtheme_audio_meta_box,$post_id);
		mtheme_savedata($mtheme_common_meta_box,$post_id);
	}
	
}

	function mtheme_savedata($mtheme_metaboxdata,$post_id) {
		foreach ($mtheme_metaboxdata['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			if ( isset($_POST[$field['id']]) ) {
				$new = $_POST[$field['id']];
			}
			
			if ( isset($new) ) {

				if ($new && $new != $old) {
					//update_post_meta($post_id, $field['id'], esc_attr($new) );
					update_post_meta($post_id, $field['id'], $new );
				} elseif ($new=="0") {
					update_post_meta($post_id, $field['id'], $new );
				}elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old );
				}
			}			
		}
	}
?>