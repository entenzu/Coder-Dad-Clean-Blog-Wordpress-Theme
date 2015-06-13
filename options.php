<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'cd-clean-blog';
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options[] = array(
		'name' => __( 'Basic Settings', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Logo', 'theme-textdomain' ),
		'desc' => __( 'Upload a logo for your site.', 'theme-textdomain' ),
		'id' => 'logo_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Header Top Line', 'theme-textdomain' ),
		'desc' => __( 'Top Line of Header', 'theme-textdomain' ),
		'id' => 'header_top_line',
		'placeholder' => get_bloginfo('name'),
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Header Bottom Line', 'theme-textdomain' ),
		'desc' => __( 'Bottom Line of Header', 'theme-textdomain' ),
		'id' => 'header_bottom_line',
		'placeholder' => get_bloginfo('description'),
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Copyright', 'theme-textdomain' ),
		'desc' => __( 'Copyright text. You can use {{DATE}} for the current year, and {{BLOGNAME}} for your blogs name.', 'theme-textdomain' ),
		'id' => 'copyright',
		'placeholder' => "Copyright &copy; " . get_bloginfo('name') . ' ' . date('Y'),
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Home Header Image', 'theme-textdomain' ),
		'desc' => __( 'Upload a header image for your homepage.', 'theme-textdomain' ),
		'id' => 'home_image_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Category Header Image', 'theme-textdomain' ),
		'desc' => __( 'Upload a header image for your category pages.', 'theme-textdomain' ),
		'id' => 'category_image_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Tags Header Image', 'theme-textdomain'),
		'desc' => __('Upload a header image for your tags pages. Defaults to category header image (or lorempixem if no category header image) until changed'),
		'id'   => 'tags_image_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Archive Header Image', 'theme-textdomain' ),
		'desc' => __( 'Upload a header image for your archive page.', 'theme-textdomain' ),
		'id' => 'archive_image_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Archive Title', 'theme-textdomain' ),
		'desc' => __( 'Archive Title: Defaults to The Archive', 'theme-textdomain' ),
		'id' => 'archive_title',
		'placeholder' => "The Archive",
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Social Settings', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Facebook Button in Footer', 'theme-textdomain' ),
		'desc' => __( 'The url that will be opened when the Facebook icon is clicked in footer. Note these icons open in a new tab.', 'theme-textdomain' ),
		'id' => 'facebook_footer',
		'placeholder' => 'Enter a Facebook URL or page URL.',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Twitter Button in Footer', 'theme-textdomain' ),
		'desc' => __( 'The url that will be opened when the Twitter icon is clicked in footer. Note these icons open in a new tab.', 'theme-textdomain' ),
		'id' => 'twitter_footer',
		'placeholder' => 'Enter a Twitter URL or page URL.',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Pinterest Button in Footer', 'theme-textdomain' ),
		'desc' => __( 'The url that will be opened when the Pinterest icon is clicked in footer. Note these icons open in a new tab.', 'theme-textdomain' ),
		'id' => 'pinterest_footer',
		'placeholder' => 'Enter a Pinterest URL or page URL.',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Contact Page', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Contact Page Header Image', 'theme-textdomain' ),
		'desc' => __( 'Upload a header image for your contact page.', 'theme-textdomain' ),
		'id' => 'contact_image_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Contact Heading', 'theme-textdomain' ),
		'desc' => __( 'The Headline for your Contact Page', 'theme-textdomain' ),
		'id' => 'contact_headline',
		'placeholder' => 'Defaults to Post Title',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Contact Subheading', 'theme-textdomain' ),
		'desc' => __( 'Contact Subheading.', 'theme-textdomain' ),
		'id' => 'contact_sub_headline',
		'placeholder' => 'Defaults to empty.',
		'type' => 'text'
	);

	$contact_form_options = array(
		'yes' => 'Use Local Contact Form',
		'no'  => 'Do not Use Local Contact Form'
	);

	$options[] = array(
		'name' => __( 'Use Local Contact Form?', 'theme-textdomain' ),
		'desc' => __( 'Use local contact form? If yes a working contact form will be displayed on the page "Contact". If you wish to use a page named "Contact Us" or any other name change the tile and make sure slug is "contact". If no you can use things like Contact 7 for contact forms and put the shortcode in the page editor which will display the form.', 'theme-textdomain' ),
		'id' => 'use_local_contact',
		'std' => 'yes',
		'type' => 'radio',
		'options' => $contact_form_options
	);

	$options[] = array(
		'name' => __( 'Send Contact Form To:', 'theme-textdomain' ),
		'desc' => __( 'Contact form will not displayed until this is filled out. Use an email that is monitored.', 'theme-textdomain' ),
		'id' => 'contact_email',
		'placeholder' => 'your.name@yourdomain.com',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Subject', 'theme-textdomain' ),
		'desc' => __( 'The subject to be used in the email. Use:<br>{{NAME}} For name field<br>{{BLOGNAME}} For your blogs name.', 'theme-textdomain' ),
		'id' => 'contact_subject',
		'placeholder' => '{{NAME}} has sent you a message on {{BLOGNAME}}',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Success Message', 'theme-textdomain' ),
		'desc' => __( 'The success message to display when the mail has been sent from your blog. To Personalize Use: <br>{{NAME}} For name field.', 'theme-textdomain' ),
		'id' => 'contact_form_sent',
		'placeholder' => 'Successfully sent the message.',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Fail Message', 'theme-textdomain' ),
		'desc' => __( 'The fail message to display when the mail has not been sent from your blog. To Personalize Use: <br>{{NAME}} For name field.', 'theme-textdomain' ),
		'id' => 'contact_form_not_sent',
		'placeholder' => 'Could not send the message',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Contact Message Format', 'theme-textdomain' ),
		'desc' => __( 'HTML NOT ALLOWED. The Format You want to use for local contact form. You can use: <br>{{NAME}} For name field<br>{{EMAIL}} For email field<br>{{PHONE}} For phone field<br>{{MESSAGE}} For message field.<br>{{BLOGNAME}} For your blogs name.', 'theme-textdomain' ),
		'id' => 'contact_format',
		'std' => "{{NAME}} has sent you a message using your contact form on {{BLOGNAME}}.\r\n\r\n They said:\r\n{{MESSAGE}}\r\n\r\n You can contact them back at: \r\n Email: {{EMAIL}}\r\n Phone: {{PHONE}}",
		'type' => 'textarea'
	);

	return $options;
}