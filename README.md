Desarrollo Seguro de Aplicaciones - Trabajo de Proyecto de Software
-----------

This application is a CMS (Content Management System), it uses Doctrine, MySQL and PHP.

Installation
------------
Clone the repo
```
git@github.com:rapofran/dsa2013_proyecto_software.git
```

Make the cache/ and log/ folders, and change the permissions
```
mkdir cache/ log/
chmod 777 cache/ log/
```

Make a new Apache VirtualHost 
```
# /etc/apache2/sites-enabled/dsa
<VirtualHost *:80>
  ServerName dsa2013.com

  DirectoryIndex index.php index.html
  DocumentRoot <dir_path>/dsa_proyecto_software/web/

  ErrorLog ${APACHE_LOG_DIR}/error.log
  LogLevel warn

  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Map the name of the VirtualHost to a local IP address
```
# /etc/hosts
127.0.0.1       dsa2013.com
```

Create the MySQL database
```
mysqladmin -u <user> -p create dsa_proyecto_software
```

Download Symfony 1.4.20 and put it into
```
lib/vendor/symfony
```

And run this commands
```
lib/vendor/symfony
php symfony doctrine:build --model
php symfony doctrine:build --sql
php symfony doctrine:build-all --and-load
```

Now you should be able to get into 
```
http://dsa2013.com/frontend_dev.php
```

The backend URL
```
http://dsa2013.com/backend_dev.php

user: admin
pass: admin
```
