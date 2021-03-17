## wordpress tutorial
# Este tutorial es para agregar front y back a un sitio wordpress de manera rápida

# Front con función ajax
1. Se crea una página en elementor (¿Tienes versión pro?), sino crea una página de otra manera, pero que puedas agregar el código html, en este caso el código que colocamos en la página se encuetra en wordpress-front-back-base/src/create-event.html

2. Crear un script, en este caso usamos jquery, por lo cual accedemos a los campos del formulario a través de éste, el script se encuentra en wordpress-front-back-base/src/scriptEvent.js.
    a. Subir archivo js a la carpeta de assets del tema, dentro de la carpeta assets/js, quedaría así:
     /wp-content/themes/twentytwenty/assets/js/scriptEvent.js
# Back que escuche la función ajax
    b. Registrar el script en wordpress:
        Para ésto, ubicamos el archivo functions.php del tema, en nuestro caso era /wp-content/themes/twentytwenty/functions.php, ahora, agregamos dentro de la función twentytwenty_register_scripts lo siguiente:

        wp_enqueue_script( 'scriptevent-js', get_template_directory_uri() . '/assets/js/scriptEvent.js', array(), $theme_version, false );
        => add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' ); esta linea registra los scripts del tema ( se encuentra por defecto escrita)
        Con esto tendremos el script registrado en wordpress

     c. Construcción de función en el back
        I. Registrar ruta publica y ruta privada
            al final de functions.php se agregan las siguientes líneas:
            add_action('wp_ajax_nopriv_create_event','create_event'); /* acceso publico */
            add_action('wp_ajax_create_event','create_event'); /* acceso privado */
        II. Agregar debajo la función que recibe los parámetros que vienen del front
            function create_event(){}
# Ejecutar query a la base de datos
La conexión con la base de datos se hace en la función registrada, ahí tenemos la variable:
 global $wpdb;/* db access */
 la cual nos da acceso a la base de datos y nos permite ejecutar consultas (select, insert, update, etc)



