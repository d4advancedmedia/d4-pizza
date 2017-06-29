<?php

/*
  Shortcode Name: d4getpost
  Usage: [d4getpost posttype="" orderby=""]
  Version: 1.1.3
  Author: D4 Adv. Media
  License: GPL2
*/

	function shortcode_d4getpost( $atts ) {
		$attr = shortcode_atts( array(
			'postid'=>'',
			'pageid'=>'',
			'wrapperclass'=>'',
			'posttype'=>'',
			'title'=>'',
			'category_name'=>'',
			'number'=>'99',
			'tag'=>'',
			'taxonomy'=>'',
			'tax_field'=>'',
			'terms'=>'',
			'link'=>'',
			'use_excerpt'=>'',
			'content_length'=>'',
			'orderby'=>'date',
			'order' => 'DESC',
			'author' => 'false',
			'edit_link' => '',
			'meta_fields' => '',
			'content_order' => 'title,image,body,meta',
			'all_link' => '',
			'all_linktext' => '',
			'button_text' => 'Read More',
			'link_overlay' => true,
		), $atts );

		$getposts_args = array();
		
		if ($attr['postid'] != '') {
			$postid = $attr['postid'];
			$getposts_args['p'] = $postid;
		}
		if ($attr['pageid'] != '') {
			$pageid = $attr['pageid'];
			$getposts_args['page_id'] = $pageid;
		}
		if ($attr['wrapperclass'] != '') {
			$wrapperclass = ' '.$attr['wrapperclass'];
		}
		if ($attr['category_name'] != '') {
			$category_name = $attr['category_name'];
			$getposts_args['category_name'] = $category_name;
		}
		if ($attr['order'] != '') {
			$order = $attr['order'];
			$getposts_args['order'] = $order;
		}
		if ($attr['number'] != '') {
			$number = intval($attr['number']);
			$getposts_args['posts_per_page'] = $number;
		}
		if ($attr['orderby'] != '') {
			$orderby = $attr['orderby'];
			$getposts_args['orderby'] = $orderby;
		}
		if ($attr['tag'] != '1') {
			$tag = $attr['tag'];
			$getposts_args['tag'] = $tag;
		}
		if ( ($attr['taxonomy'] != '') && ($attr['terms'] != '') && ($attr['tax_field'] != '') ) {
			/*$getposts_args['tax_query'][0]['taxonomy'] = $attr['taxonomy'];
			$getposts_args['tax_query'][0]['terms'] = $attr['terms'];*/

			$getposts_args['tax_query'] = array(
		        array(
		            'taxonomy' => $attr['taxonomy'],
		            'field'    => $attr['tax_field'],
		            'terms'    => $attr['terms'],
		        ),
		    );
		}
		if ($attr['posttype'] != '') {
			$posttype = $attr['posttype'];
			$getposts_args['post_type'] = $posttype;

			$posttype_obj = get_post_type_object( $posttype );
			$posttype_name = $posttype_obj->labels->name;	
		}
		if ($attr['author'] == 'true') {
			$user_ID = get_current_user_id();
			$getposts_args['author'] = $user_ID;
		}

		if ($attr['title'] != '') {
			$title = '<h1 class="getpost-title">'.$attr['title'].'</h1>';
		}

		if ($attr['all_linktext'] == '') {
			$all_linktext = 'See all '.$posttype_name;
		} else {
			$all_linktext = $attr['all_linktext'];
		}	 
	
		
		$getposts = new WP_Query($getposts_args);

		while ( $getposts->have_posts() ) { $getposts->the_post();	
		$postid = get_the_id();


		if ($attr['all_link'] == '') {
			$alllink = '<div class="clearfix"></div><a class="get-all button" href="/'.$posttype.'">'.$all_linktext.'</a>';
		} elseif ( ($attr['all_link'] == 'term') || ($attr['all_link'] == 'category') ) {
			$category_object = get_term_by( 'name', $category_name, $attr['all_link'] );
			$alllink = '<div class="clearfix"></div><a class="get-all button" href="'.home_url().'/'.$category_object->slug.'">'.$all_linktext.'</a>';
		} elseif ($attr['all_link'] == 'none') {
			$alllink = '';
		}
		else {
			$alllink = '<div class="clearfix"></div><a class="get-all button" href="'.$attr['all_link'].'">'.$all_linktext.'</a>';
		}

		// Post Thumbnail
		if ( has_post_thumbnail() ) {
			$thumbnail = '<div class="post-thumb"><span class="center-helper"></span>' . get_the_post_thumbnail( $postid, 'large' ) . '</div>';
		}

		if ($attr['use_excerpt'] != '') {
			$post_content = get_the_excerpt();
		} else {
			$post_content = get_the_content();
		}
		
		if ($attr['content_length'] != '') {
			$content_length = intval($attr['content_length']);
			if (strlen($post_content) > $content_length) {
				$post_content_modified = preg_replace('/\s+?(\S+)?$/', '', substr(wpautop(do_shortcode($post_content)), 0, $content_length)).' […]';
			} else {
				$post_content_modified = $post_content;
			}
			#$post_content_modified = 'test';
		} else {
			$post_content_modified = $post_content;
		}

		$body = '<div class="getpost-content">'.$post_content_modified.'</div>';

		$posttitle = '<h3 class="getpost-title">'.get_the_title().'</h3>';

		$postdate = '<div class="post-date">posted '.get_the_date('m/d/Y','','',false).'</div>';


		if ($attr['link'] == 'false') {
			$link_url = '';
		}
		elseif ($attr['link'] == '') {
			$link_url = get_the_permalink();
		} else {
			$link_url = $attr['link'];
		}

		if ($attr['link_overlay'] == true) {
			$link_overlay = '<a style="position:absolute; top:0; bottom:0; left:0; right:0;z-index:99" href="'.$link_url.'"></a>';
		} else {
			$link_overlay = '';
		}		

		if ($attr['edit_link'] != '') {
			$editlink =  '<a href="/wp-admin/post.php?post='.$postid.'&action=edit">Edit</a>';
		}

		if ($attr['meta_fields'] != '') {
			$meta_fields = explode(',', $attr['meta_fields']);
			$post_meta = '<ul class="getpost-meta">';
			foreach ($meta_fields as $key) {				
				$post_meta .= '<li><span class="meta-key">'.$key.': </span><span class="meta-value">'.get_post_meta($postid, $key, true).'</span></li>';
			}
			$post_meta .= '</ul>';
		}

		$readmore = '<a class="getpost-readmore button" href="'.get_the_permalink().'">'.$attr['button_text'].'</a>';

		$content_order = explode(',',$attr['content_order']);

		$content = '';
		foreach ($content_order as $element) {
			
			if ($element == 'title') { $content .= $posttitle; }
			if ($element == 'date') { $content .= $postdate; }
			if ($element == 'image') { $content .= $thumbnail; }
			if ($element == 'body') { $content .= '<div class="getpost-textwrap">'.$body.'</div>'; }
			if ($element == 'meta') { $content .= $post_meta; }
			if ($element == 'readmore') {$content .= $readmore; }
		}	

		//Render output
		
		$getpost_inner .= '<div class="getpost-wrapper'.$wrapperclass.'" style="position:relative;">';
		$getpost_inner .= $link_overlay;
		$getpost_inner .= $content;
		$getpost_inner .= $editlink;
		$getpost_inner .= '<div class="clearfix"></div></div>';	

		}
		
		wp_reset_postdata();

		$output = '<div class="getpost-outerwrap getpost-'.$posttype.'">';
		$output .= $getpost_inner;
		$output .= $alllink;
		$output .= '</div>';
		return $output;		

	}

add_shortcode( 'd4getpost', 'shortcode_d4getpost' );
?>