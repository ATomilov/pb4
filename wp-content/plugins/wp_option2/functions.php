<?php

// 1. customize ACF path
add_filter( 'acf/settings/path', 'my_acf_settings_path' );

function my_acf_settings_path( $path ) {

	// update path
	$path = dirname( __FILE__ ) . '/libs/acf/';

	// return
	return $path;

}

// 2. customize ACF dir
add_filter( 'acf/settings/dir', 'my_acf_settings_dir' );

function my_acf_settings_dir( $dir ) {

	// update path
	$dir = plugin_dir_url( __FILE__ ) . 'libs/acf/';

	// return
	return $dir;

}

/**
 * Enqueue styles for front
 */
function ol_front_scripts() {
	wp_enqueue_style( 'oo-main-ol-css', plugin_dir_url( __FILE__ ) . '/css/main.css' );
	// wp_enqueue_style( 'oo-icons-css', 'https://file.myfontastic.com/LTNvD4kRTEg9CjAr3wWSjE/icons.css' );
}
add_action( 'wp_enqueue_scripts', 'ol_front_scripts' );


// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');
// 4. Include ACF
require_once plugin_dir_path( __FILE__ ) . 'libs/acf/acf.php';

// Include tax meta
require_once plugin_dir_path( __FILE__ ) . 'libs/Tax-meta-class/Tax-meta-class.php';
add_action( 'admin_enqueue_scripts', 'ol_scripts' );

function ol_scripts( $hook ) {
	if ( 'post.php' != $hook ) {
		return;
	}
	wp_enqueue_script( 'ace', 'https://cdn.jsdelivr.net/ace/1.2.2/min/ace.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'jquery-ace', plugin_dir_url( __FILE__ ) . '/js/jquery-ace.min.js', array( 'ace', 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'theme-twilight', plugin_dir_url( __FILE__ ) . '/js/theme-twilight.js', array( 'ace', 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'ace-load', plugin_dir_url( __FILE__ ) . '/js/ace-load.js', array( 'ace', 'jquery' ), '1.0.0', true );

}

/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 *
 * <?php
 * $thumb = get_post_thumbnail_id();
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
if ( ! function_exists( 'vt_resize' ) ) {
	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
		// this is an attachment, so we have the ID
		if ( $attach_id ) {
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
			// this is not an attachment, let's use the image url
		} elseif ( $img_url ) {
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			// Look for Multisite Path
			if ( file_exists( $file_path ) === false ) {
				global $blog_id;
				$file_path = parse_url( $img_url );
				if ( preg_match( '/files/', $file_path['path'] ) ) {
					$path = explode( '/', $file_path['path'] );
					foreach ( $path as $k => $v ) {
						if ( $v == 'files' ) {
							$path[ $k - 1 ] = 'wp-content/blogs.dir/' . $blog_id;
						}
					}
					$path = implode( '/', $path );
				}
				$file_path = $_SERVER['DOCUMENT_ROOT'] . $path;
			}
			// $file_path = ltrim( $file_path['path'], '/' );
			// $file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			$orig_size    = getimagesize( $file_path );
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		$file_info = pathinfo( $file_path );
		// check if file exists
		$base_file = $file_info['dirname'] . '/' . $file_info['filename'] . '.' . $file_info['extension'];
		if ( ! file_exists( $base_file ) ) {
			return;
		}
		$extension = '.' . $file_info['extension'];
		// the image path without the extension
		$no_ext_path      = $file_info['dirname'] . '/' . $file_info['filename'];
		$cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width ) {
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
				$vt_image        = array(
					'url'    => $cropped_img_url,
					'width'  => $width,
					'height' => $height,
				);
				return $vt_image;
			}
			// $crop = false or no height set
			if ( $crop == false or ! $height ) {
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path  = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
					$vt_image        = array(
						'url'    => $resized_img_url,
						'width'  => $proportional_size[0],
						'height' => $proportional_size[1],
					);
					return $vt_image;
				}
			}
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) {
				$width = $img_size[0];
			}
			// Check if GD Library installed
			if ( ! function_exists( 'imagecreatetruecolor' ) ) {
				echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
				return;
			}
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop );
			$new_img_size = getimagesize( $new_img_path );
			$new_img      = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			// resized output
			$vt_image = array(
				'url'    => $new_img,
				'width'  => $new_img_size[0],
				'height' => $new_img_size[1],
			);
			return $vt_image;
		}
		// default output - without resizing
		$vt_image = array(
			'url'    => $image_src[0],
			'width'  => $width,
			'height' => $height,
		);
		return $vt_image;
	}
}

// settings
function olTextSettings( $key ) {
	return function () use ( $key ) {
		echo '<input type="text" name="' . $key . '" id="' . $key . '" value="' . get_option( $key ) . '" />';
	};
}

function olAddTextSettings( $key, $name, $section ) {
	add_settings_field( $key, $name, olTextSettings( $key ), $section, $section );
	register_setting( $section, $key );
}


function ol_locate_template( $template_names, $load = false, $require_once = true ) {
	$located = '';
	foreach ( (array) $template_names as $template_name ) {

		if ( ! $template_name ) {
			continue;
		}
		if ( file_exists( STYLESHEETPATH . '/' . $template_name ) ) {
			$located = STYLESHEETPATH . '/' . $template_name;
			break;
		} elseif ( file_exists( TEMPLATEPATH . '/' . $template_name ) ) {
			$located = TEMPLATEPATH . '/' . $template_name;
			break;
		} elseif ( file_exists( plugin_dir_path( __FILE__ ) . 'templates/' . $template_name ) ) {
			$located = plugin_dir_path( __FILE__ ) . 'templates/' . $template_name;
			break;
		}
	}

	if ( $load && '' != $located ) {
		load_template( $located, $require_once );
	}

	return $located;
}


add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );


function my_ajax_pagination() {

	$month = json_decode( stripslashes( $_POST['month'] ), true );
	$day   = json_decode( stripslashes( $_POST['day'] ), true );

	$args = [
		'post_type'  => 'marketreview',
		'date_query' => [
			[
				'year'  => date( 'Y' ),
				'month' => $month,
				'day'   => $day,
			],
		],
	];

	$posts               = new WP_Query( $args );
	$GLOBALS['wp_query'] = $posts;

	if ( ! $posts->have_posts() ) {
		get_template_part( 'content', 'none' );
	} else {
		while ( $posts->have_posts() ) {
			$posts->the_post(); ?>

			<div class="market-report-item">
				<div class="pull-left flip">
					<span class="day"><?php echo get_the_date( 'j' ); ?></span><br>
					<span class="date"><?php echo get_the_date( 'F, j' ); ?></span>
				</div>
				<div class="market-content">
					<h2><a class="post-title" href="<?php echo get_the_permalink(); ?>">
							<?php echo get_the_title(); ?></a></h2>
					<p><?php echo the_content(); ?></p>
				</div>
			</div>

			<?php
		}
	}

	die();
}
