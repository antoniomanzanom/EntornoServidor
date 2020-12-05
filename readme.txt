Para que funcione el proyecto asegurate de que los puertos indicados no dan conflicto cambiandolos y ajustandolos en el archivo docker-compose.yml.
En el directorio donde se encuentra el archivo mencionado anteriormente abrir la cmd y realizar los siguientes comandos "docker-compose up".
Abrimos otra cmd y ejecutamos el comando: "docker exec -it proyectoinstagram4_servidor_1 /bin/bash", luego hacemos "cd /var/www/html/", luego
"php artisan migrate", despues "php artisan db:seed" y por último "php artisan storage:link" Que nos sirve para poder visualizar las imagenes.

***********************************************************
A partir de aquí es nuevo.
***********************************************************

A día de hoy la aplicación funciona, permitiendonos logearnos/registrarnos, subir nuestras fotos, editar dichas fotos o eliminarlas,
comentar en las fotos de todo el mundo, dar like y borrar nuestros propios comentarios. El botón de borrar y editar la foto está en el apartado
que se abre al pulsar comentarios por motivos estéticos.
