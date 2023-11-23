#!/bin/bash

# Otros comandos de inicio del contenedor...

# Cambiar los permisos del archivo deseado
chmod 777 $PWD/app/log/WebSistema.log
chmod 777 $PWD/app/pasahitzaKonprobatu.php 
# Mantener el contenedor en funcionamiento
"$@"
