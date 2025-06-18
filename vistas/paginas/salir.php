<?php
#Destruimos todas las variables de SESSION que exista en el sistema.
session_destroy();
# y con un echo lo voy a mandar nuevamente a la pagina de ingreso.
echo'<script>window.location = "index.php?pagina=ingreso";</script>';