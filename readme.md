Explicación
HTML: Crea la estructura básica de la página con un formulario para introducir el código y una lista para mostrar la cola de usuarios.
CSS: Estiliza la página para que se vea agradable.
PHP (queue.php): Devuelve la cola actual de usuarios.
Archivo JSON: Contiene los códigos y nombres de los usuarios.
PHP (add_to_queue.php): Lee el archivo JSON, verifica el código y agrega el nombre del usuario a la cola si el código es válido y el usuario no está ya en la cola.
JavaScript: Maneja el envío del formulario, actualiza la cola en la interfaz y la refresca cada 5 segundos.