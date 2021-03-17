<?php
/*
	agregar esto a archivo functions.php del tema
	/wp-content/themes/twentytwenty/functions.php
*/

function twentytwenty_register_scripts() {
	/* register new ajax script */
	wp_enqueue_script( 'scriptevent-js', get_template_directory_uri() . '/assets/js/scriptEvent.js', array(), $theme_version, false );

	/*
		=> Ubicación de los scripts del tema
		/wp-content/themes/twentytwenty/assets/js/scriptEvent.js
	*/
}

/* registra la función que "registra el scritp" */
add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );

/* AGREGAR AL FINAL DE :
	/wp-content/themes/twentytwenty/functions.php
*/
/* new funtions -> ajax */
add_action('wp_ajax_nopriv_create_event','create_event'); /* acceso publico */
add_action('wp_ajax_create_event','create_event'); /* acceso privado */

/* función que recibe los parámetros */
function create_event(){	

	if (!isset($_POST['data'])) wp_die();

	global $wpdb;/* db access */
	/* set params */
	$post_data = $_POST['data'];
	$hostname = isset($post_data['hostname']) ? sanitize_text_field($post_data['hostname']) : '';
	$email = isset($post_data['email']) ? sanitize_text_field($post_data['email']) : '';
	$phone = isset($post_data['phone']) ? sanitize_text_field($post_data['phone']) : '';
	$event_name = isset($post_data['event_name']) ? sanitize_text_field($post_data['event_name']) : '';
	$event_description = isset($post_data['event_description']) ? sanitize_text_field($post_data['event_description']) : '';
	$event_city = isset($post_data['event_city']) ? sanitize_text_field($post_data['event_city']) : '';
	$event_place = isset($post_data['event_place']) ? sanitize_text_field($post_data['event_place']) : '';
	$event_date = isset($post_data['event_date']) ? sanitize_text_field($post_data['event_date']) : '';
	$event_hour = isset($post_data['event_hour']) ? sanitize_text_field($post_data['event_hour']) : '';
		
	/* insert a mysql a tabla event */
	$rows_added = $wpdb->insert("event", array(
		"hostname" => $hostname,
		"email" => $email,
		"phone" => $phone,
		"event_name" => $event_name,
		"event_description" => $event_description,
		"event_city" => $event_city,
		"event_place" => $event_place,
		"event_date" => $event_date,
		"event_hour" => $event_hour,
		));

	//echo var_dump($rows_added);
	echo $rows_added;
	if($rows_added===1){
		echo 'success';
	}else{
		echo 'error';
	}

	/* generate link => */
	wp_die('');

}