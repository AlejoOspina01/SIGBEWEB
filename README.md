# SIGBEWEBSERVICES

## Pasos basicos para el uso del proyecto

### Primera vez clonado

Si se clona por primera vez se debe usar el siguiente comando para descargar las librerias necesarias
esto se hace dentro de la raiz del proyecto de WEBSERVICES PHP
```
composer install
```

### Guia inicial para el uso de un proyecto con doctrine
```
https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html#getting-started-with-doctrine
```

### La guia para realizar las relaciones entre tablas o clases
Esta guia es la oficial para poder realizar las debidas relaciones.
```
https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/association-mapping.html
```

### Actualizar la base de datos al crear nuevas clases o cambios

Si se realizo nuevas clases en la carperta SRC y en la carpeta config/xml el comando para guardar y actualizar la base de datos bd.sqlite.
Esto se hace dentro de la raiz del proyecto de WEBSERVICES PHP.
```
vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
```

