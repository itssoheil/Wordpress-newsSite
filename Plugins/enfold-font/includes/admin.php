<?php


function fu_admin_page() {
	add_theme_page( __('تغییر فونت قالب', 'fontuploader'), __('تغییر فونت قالب', 'fontuploader'), 'manage_options', 'font-uploader', 'fu_render_admin');
}
add_action('admin_menu', 'fu_admin_page');

function fu_render_admin() {

    $options = fu_setup_options();
    $i=0;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>' . __('فونت مورد نظر شما ذخیره گردید', 'fontuploader') . '</strong></p></div>';
	?>
	<div class="wrap">
		
		<h2>تغییر فونت</h2>
		<p>در صورتی که فونت خاصی مد نظر شماست و در لیست فونت های موجود نیست ، از طریق زیر آپلود کنید.</p>	
		<form method="post" enctype="multipart/form-data" action="themes.php?page=font-uploader">
			<p><input type="file" name="font"></p>
			<input type="hidden" name="fu_action" value="upload"/>
			<?php echo wp_nonce_field('font-upload-nonce', 'font-upload-nonce'); ?>
			<div class="description"><em><?php _e('فرمت های مورد قبول: ', 'fontuploader'); ?><strong>.ttf</strong>, <strong>.otf</strong>, and <strong>.eot</strong></em></div>
			<?php echo submit_button(__('تغییر فونت قالب', 'fontuploader'), 'secondary' ); ?>
		</form>


	    <form method="post">
	    	<table class="form-table">
			<?php 
	        foreach ($options as $value):
	            switch ( $value['type'] ):
	                case "open":  break;
					case "close": ?>
	    					</td>
						</tr>
						<?php
						break;
	                case "title": ?>
						<p><?php _e('فونت های آپلود شده خود را از زیر مدیریت کنید', 'fontuploader'); ?></p>
						<?php
						break;
					case 'text': ?>
						<tr class="form-field">
							<th scope="row" valign="top">
		    					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							</th>
							<td class="fu_input fu_text">
		    					<input name="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != ""){ echo htmlentities(stripslashes(get_option( $value['id']))); } else { echo htmlentities($value['std']); } ?>" />
		    					<p class="description"><?php echo $value['desc']; ?></p>
							</td>
						</tr>
						<?php
	                    break;
	                case 'textarea': ?>
						<tr class="form-field">
							<th scope="row" valign="top">
		    					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							</th>
							<td class="fu_input fu_text">
		    					<textarea name="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>" rows="10" id="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != ""){ echo htmlentities(stripslashes(get_option( $value['id']))); } else { echo htmlentities($value['std']); } ?></textarea>
		    					<p class="description"><?php echo $value['desc']; ?></p>
							</td>
						</tr>
						<?php
	                    break;
	                case 'select':
						?>
						<tr class="form-field">
							<th scope="row" valign="top">
		    					<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							</th>
							<td class="fu_input fu_select">
							    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="<?php echo $value['class']; ?>">
							    <?php foreach ($value['options'] as $option) { ?>
							        <option <?php if (get_option( $value['id'] ) == $option){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
							    <?php } ?>
							    </select>
							    <span class="description"><?php echo $value['desc']; ?></span>
							</td>
						</tr>
						<?php
	                    break;
	                case "section":
	                    $i++; ?>
						<tr class="form-field">
						    <th scope="row" valign="top">
						    	<h3><?php echo $value['name']; ?></h3>
						   	</th>
						    <td class="fu_options">
	                        <?php 
	                    break;
	            endswitch;
	        endforeach;
			?>
			</table>
	        <input type="hidden" name="action" value="save" />
	        <?php echo submit_button(__('ذخیره تغییرات', 'fontuploader') ); ?>
	    </form>
	</div>
	<?php
}

function fu_setup_options() {
	
	$sn = 'fu';
	$fonts = fu_load_fonts();
	$font_sizes = fu_get_font_sizes();
	$options = array(

	    array( "name" => __('تغییر فونت قالب', 'fontuploader'),
	        "type" => "title"),
	   
	    array( "name" => __('استایل کلی قالب', 'fontuploader'),
	        "type" => "section"),

	    array( "type" => "open"),

		 array( 
		 	"name" => __('سربرگ ها', 'fontuploader'),
			"desc" => __('فونت برای هدر های شما مثلا هدینگ 1 و یا هدینگ2', 'fontuploader'),
			"id" => $sn."_header_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),

		array( 
		 	"name" => __('لیست ها', 'fontuploader'),
			"desc" => __('فونت لیست آیتم های شما', 'fontuploader'),
			"id" => $sn."_lists_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),

		array( 
		 	"name" => __('بدنه', 'fontuploader'),
			"desc" => __('فونت کلی و بنده ی سایت', 'fontuploader'),
			"id" => $sn."_body_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		   
	    array( "type" => "close"),
	    
	    array( 
	    	"name" => __('عناصر سفارشی', 'fontuploader'),
	        "type" => "section"
	    ),
	    array( "type" => "open"), 
	    
		array( 
		 	"name" => __('فونت عنصر', 'fontuploader'),
			"id" => $sn."_custom_one_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		), 
		array( 
		 	"name" => __('عنصر', 'fontuploader'),
			"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
			"id" => $sn."_custom_one",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => __('فونت عنصر', 'fontuploader'),
			"id" => $sn."_custom_two_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => __('عنصر', 'fontuploader'),
			"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
			"id" => $sn."_custom_two",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => __('فونت عنصر', 'fontuploader'),
			"id" => $sn."_custom_three_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => __('عنصر', 'fontuploader'),
			"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
			"id" => $sn."_custom_three",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
		 	"name" => __('فونت عنصر', 'fontuploader'),
			"id" => $sn."_custom_four_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		), 
		array( 
		 	"name" => __('عنصر', 'fontuploader'),
			"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
			"id" => $sn."_custom_four",
			"class" => "regular-text",
			"type" => "text"
		),    
		array( 
			"name" => __('فونت عنصر', 'fontuploader'),
			"id" => $sn."_custom_five_font",
			"class" => "fu_font_list",
			"type" => "select",
			"options" => $fonts
		),
		array( 
			"name" => __('عنصر', 'fontuploader'),
			"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
			"id" => $sn."_custom_five",
			"class" => "regular-text",
			"type" => "text"
		),    
			   
	    array( "type" => "close"),
	    
	    array( "name" => __('گوگل فونت', 'fontuploader'),
        "type" => "section"),
    array( "type" => "open"), 

	 array( "name" => __('آدرس های گوگل فونت', 'fontuploader'),
		"desc" => __('اگر میخواهید از فونت های گوگل استفاده کنید<br />لینک های فونت گوگل باید شبیه این باشند: &lt;link&gt; . . . &lt;/link&gt;', 'fontuploader'),
		"id" => $sn."_google_font_urls",
		"class" => "google_font_url large-text",
		"type" => "textarea"),
	 array( "name" => __('اسم فونت گوگل - سربرگ ها', 'fontuploader'),
		"desc" => __('اسم یک فونت گوگل را وارد کنید مثلا:<em>font-family: <strong>Tangerine</strong></em>, شما تایپ کنید <em>Tangerine</em>', 'fontuploader'),
		"id" => $sn."_google_header_font_name",
		"type" => "text"),
		
	 array( "name" => __('اسم فونت گوگل - بدنه', 'fontuploader'),
		"desc" => __('اسم یک فونت گوگل را وارد کنید مثلا: <em>font-family: <strong>Lobster</strong></em>, شما تایپ کنید <em>Lobster</em>', 'fontuploader'),
		"id" => $sn."_google_body_font_name",
		"type" => "text"),
		
	 array( "name" => __('اسم فونت گوگل- لیست ها', 'fontuploader'),
		"desc" => __('اسم یک فونت گوگل را وارد کنید مثلا: <em>font-family: <strong>Reanie Beanie</strong></em>, ما تایپ کنید <em>Reanie Beanie</em>', 'fontuploader'),
		"id" => $sn."_google_lists_font_name",
		"type" => "text"),

    array( "type" => "close"),
    
    array( "name" => __('فونت های اینترنت اکسپلورر', 'fontuploader'),
        "type" => "section"),
    array( "type" => "open"), 

	 array( "name" => __('اکسپلورر- سربرگ ها', 'fontuploader'),
		"desc" => __('فونت برای هدینگ های محتوا که باید فونت انخابی فرمت <strong>.eot</strong> داشته باشد.', 'fontuploader'),
		"id" => $sn."_ie_header_font",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $fonts),
	 array( "name" => __('لیست ها', 'fontuploader'),
		"desc" => __('فونت های اینترنت اکسپلورر برای لیست ها که فرمت ان ها باید <strong>.eot</strong> باشد.', 'fontuploader'),
		"id" => $sn."_ie_lists_font",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $fonts),
	 array( "name" => __('اکسپلورر  -  بدنه', 'fontuploader'),
		"desc" => __('فونت های بدنه وبسایت شما که باید فرمت  <strong>.eot</strong> را انتخاب کنید.', 'fontuploader'),
		"id" => $sn."_ie_body_font",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $fonts),

    array( "type" => "close"),

    array( "name" => __('عنصر های سفارشی اینترنت اکسپلورر', 'fontuploader'),
        "type" => "section"),
    array( "type" => "open"), 
    
	array( "name" => __('عنصر', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
		"id" => $sn."_ie_custom_one",
		"type" => "text"),    
	array( "name" => __('فونت عنصر', 'fontuploader'),
		"id" => $sn."_ie_custom_one_font",
		"class" => "fu_font_list",
		"type" => "select",
		"desc" => __('فونت انتخابی باید فرمت <strong>.eot</strong> داشته باشد.', 'fontuploader'),
		"options" => $fonts), 

	array( "name" => __('عنصر', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
		"id" => $sn."_ie_custom_two",
		"type" => "text"),    
	array( "name" => __('غونت عنصر', 'fontuploader'),
		"id" => $sn."_ie_custom_two_font",
		"class" => "fu_font_list",
		"type" => "select",
		"desc" => __('فونت انتخابی باید فرمت <strong>.eot</strong> داشته باشد', 'fontuploader'),
		"options" => $fonts), 
		
	array( "name" => __('عنصر', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
		"id" => $sn."_ie_custom_three",
		"type" => "text"),    
	array( "name" => __('فونت عنصر', 'fontuploader'),
		"id" => $sn."_ie_custom_three_font",
		"class" => "fu_font_list",
		"type" => "select",
		"desc" => __('فونت انتخابی باید فرمت <strong>.eot</strong> داشته باشد', 'fontuploader'),
		"options" => $fonts), 
		
	array( "name" => __('عنصر', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
		"id" => $sn."_ie_custom_four",
		"type" => "text"),    
	array( "name" => __('فونت عنصر', 'fontuploader'),
		"id" => $sn."_ie_custom_four_font",
		"class" => "fu_font_list",
		"type" => "select",
		"desc" => __('فونت انتخابی باید فرمت <strong>.eot</strong> داشته باشد.', 'fontuploader'),
		"options" => $fonts), 
		
	array( "name" => __('عنصر', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخش یا عنصر مورد نظر را اینجا وارد کنید  ', 'fontuploader'),
		"id" => $sn."_ie_custom_five",
		"type" => "text"),    
	array( "name" => __('فونت عنصر', 'fontuploader'),
		"id" => $sn."_ie_custom_five_font",
		"class" => "fu_font_list",
		"type" => "select",
		"desc" => __('فونت انتخابی باید فرمت <strong>.eot</strong> داشته باشد. ', 'fontuploader'),
		"options" => $fonts),

	array( "type" => "close"),

    array( "name" => __('اندازه فونت ها', 'fontuploader'),
        "type" => "section"),
    array( "type" => "open"),

	array( "name" => __('اندازه فونت های سربرگ', 'fontuploader'),
		"desc" => __('اندازه فونت برای هدینگ های محتوا', 'fontuploader'),
		"id" => $sn."_header_font_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
	array( "name" => __('اندازه فونت لیست ها', 'fontuploader'),
		"desc" => __('سایز فونت برای آیتم های لیست', 'fontuploader'),
		"id" => $sn."_lists_font_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
	array( "name" => __('سایز فونت بدنه', 'fontuploader'),
		"desc" => __('اندازه فونت بدنه سایت شما', 'fontuploader'),
		"id" => $sn."_body_font_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
		
	array( "name" => __('سایز فونت سفارشی', 'fontuploader'),
        "type" => "section"),
    array( "type" => "open"),

	array( "name" => __('عنصر سفارشی اول', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخشی که میخواهید اندازه آن را کنترل کنید اینجا وارد کنید. مثلا: <span style="font-style:normal;"">.navigation li</span>', 'fontuploader'),
		"id" => $sn."_custom_one_size_element",
		"type" => "text"),		
	array( "name" => __('سایز فونت عنصر', 'fontuploader'),
		"desc" => __('یک اندازه برای فونت عنصر تعریف شده انتخاب کنید..', 'fontuploader'),
		"id" => $sn."_custom_one_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
		
	array( "name" => __('عنصر سفارشی دوم', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخشی که میخواهید اندازه آن را کنترل کنید اینجا وارد کنید. مثلا: <span style="font-style:normal;"">.navigation li</span>', 'fontuploader'),
		"id" => $sn."_custom_two_size_element",
		"type" => "text"),		
	array( "name" => __('سایز فونت عنصر', 'fontuploader'),
		"desc" => __('یک اندازه برای فونت عنصر تعریف شده انتخاب کنید..', 'fontuploader'),
		"id" => $sn."_custom_two_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
		
	array( "name" => __('عنصر سفارشی سوم', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخشی که میخواهید اندازه آن را کنترل کنید اینجا وارد کنید. مثلا: <span style="font-style:normal;"">.navigation li</span>', 'fontuploader'),
		"id" => $sn."_custom_three_size_element",
		"type" => "text"),		
	array( "name" => __('سایز فونت عنصر"', 'fontuploader'),
		"desc" => __('یک اندازه برای فونت عنصر تعریف شده انتخاب کنید..', 'fontuploader'),
		"id" => $sn."_custom_three_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),

	array( "name" => __('عنصر سفارشی چهارم', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخشی که میخواهید اندازه آن را کنترل کنید اینجا وارد کنید. مثلا: <span style="font-style:normal;"">.navigation li</span>', 'fontuploader'),
		"id" => $sn."_custom_four_size_element",
		"type" => "text"),		
	array( "name" => __('سایز فونت عنصر', 'fontuploader'),
		"desc" => __('یک اندازه برای فونت عنصر تعریف شده انتخاب کنید..', 'fontuploader'),
		"id" => $sn."_custom_four_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
		
	array( "name" => __('عنصر سفارشی پنچم', 'fontuploader'),
		"desc" => __('آی دی یا کلاس بخشی که میخواهید اندازه آن را کنترل کنید اینجا وارد کنید. مثلا: <span style="font-style:normal;"">.navigation li</span>', 'fontuploader'),
		"id" => $sn."_custom_five_size_element",
		"type" => "text"),		
	array( "name" => __('سایز فونت عنصر', 'fontuploader'),
		"desc" => __('یک اندازه برای فونت عنصر تعریف شده انتخاب کنید..', 'fontuploader'),
		"id" => $sn."_custom_five_size",
		"class" => "fu_font_list",
		"type" => "select",
		"options" => $font_sizes),
		
		
    array( "type" => "close"),	


	);

	return $options;
}

function fu_save_options() {

	global $pagenow;

    $options = fu_setup_options();

    if ( isset( $_GET['page'] ) && $_GET['page'] == 'font-uploader'  && $pagenow == 'themes.php') {

        if ( 'save' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                update_option( $value['id'], $_REQUEST[ $value['id'] ] );
            }

            foreach ($options as $value) {

                if( isset( $_REQUEST[ $value['id'] ] ) ) {

                    update_option( $value['id'], $_REQUEST[ $value['id'] ]  );

                } else {

                    delete_option( $value['id'] );

                }

            }
        }
    }
}
add_action('admin_init', 'fu_save_options');