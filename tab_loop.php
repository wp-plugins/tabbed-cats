<?php


			
			$topcat = $atts['top'];
			
			$args=array('child_of'=>$topcat);

			echo '<div class="tcats">';

			$categories = get_categories( $args);
			foreach($categories as $category){
			
			
			echo '<div class="tcat">
       <input type="radio" id="tcat-'.$category->slug.'" name="tcat-group-1">
       <label for="tcat-'.$category->slug.'">'.$category->name.'</label><div class="tcat_content"><p>';

			
			//echo '<section id="tcat-'.$category->slug.'"><h2 id="#tcatb"><a href="#tcat-'.$category->slug.'">'.$category->name.'</a></h2><p>';

			// LOOP with category number

			$cat_num = get_category_by_slug( $category->slug );

			$cat_id=$cat_num->term_id;
			
			
			
			
			
			// THE LOOP HERE

			
			
				$args2 = array('posts_per_page'   => -1, 'category' => $cat_id, 'orderby' => 'title', 'order'=>'ASC'); // exclude category 9
				$custom_posts = get_posts($args2);
				foreach($custom_posts as $post) : setup_postdata($post);
				echo '<a href="'.$post->guid.'">'.$post->post_title.'</a><BR>';
				endforeach;


			// LOOP END
			echo '</p></div></div>';
			}

			echo "</div>";
			
			?>