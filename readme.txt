Para que funcione el proyecto asegurate de que los puertos indicados no dan conflicto cambiandolos y ajustandolos en el archivo docker-compose.yml.
En el directorio donde se encuentra el archivo mencionado anteriormente abrir la cmd y realizar los siguientes comandos "docker-compose up".
Abrimos otra cmd y ejecutamos el comando:"docker ps" vemos cual es que tiene una imagen con el nombre'fjortegan/dwes:laravel'y ejecutamos 
"docker exec -it <nombre> /bin/bash" siendo <nombre> el nombre lo que aparece como names será algo parecido a:entornoservidorgithub_servidor_1.
Luego hacemos "cd /var/www/html/", hay que hacer "composer install"(tarda bastante)  si da error porque git se deja algunos archivos por el camino.
luego "php artisan migrate", despues "php artisan db:seed" y por último "php artisan storage:link" Que nos sirve para poder visualizar las imagenes.

***********************************************************
A partir de aquí es nuevo.
***********************************************************

A día de hoy la aplicación funciona, permitiendonos logearnos/registrarnos, subir nuestras fotos, editar dichas fotos o eliminarlas,
comentar en las fotos de todo el mundo, dar like y borrar nuestros propios comentarios. El botón de borrar y editar la foto está en el apartado
que se abre al pulsar comentarios por motivos estéticos.


//Juan Pablo llevo 2 horas subiendo el proyecto a github y no paran de salir errores debido a que los archivos no se suben del todo bien,
si quieres ver el proyecto funcionando correctamente lo mejor es que te lo descargues del siguiente link:
https://drive.google.com/drive/folders/1ZPDgNFPxjP111_U23xr1g9eERY4VTlWn?usp=sharing
