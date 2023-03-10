#!/bin/bash
apt-get update
apt-get upgrade -y
echo "*********************************************************************"
echo "* INSTALLING THE APACHE2 SYSTEM *"
echo "*********************************************************************"
apt install apache2 -y # instalar Apache
service apache2 start # iniciar el servicio Apache
echo "*********************************************************************"
echo "* In Windows 10 go to the browser and enter: localhost *"
echo "* The APACHE home page should appear *"
echo "*********************************************************************"
read -p "End of APACHE2 installation - Press the [Enter] key to continue..."
echo "*********************************************************************"
echo "* INSTALl PHP 8.0 *"
echo "*********************************************************************"
add-apt-repository ppa:ondrej/php # Press enter when prompted.
apt-get update
apt install php8.0-common php8.0-cli -y
apt install php8.0-{bz2,curl,intl,mysql,readline,xml} -y
apt install libapache2-mod-php8.0 -y
service apache2 reload # Reiniciar el servicio Apache
echo "*********************************************************************"
read -p "Finish PHP 8 installation - Press the [Enter] key to continue ...."
echo "*********************************************************************"
echo "* MYSQL SERVER 8.0 INSTALLATION *"
echo "*********************************************************************"
echo "* Enter password: ZZZZZZZZ for MySQL root user *"
echo "*********************************************************************"
apt update
apt upgrade -y
apt install mysql-server -y # instalar MySQL
usermod -d /var/lib/mysql/ mysql
service mysql start # Iniciar el servicio MySQL
echo "*********************************************************************"
read -p " End MySQL 8 installation - Press the [Enter] key to continue... "
echo "*********************************************************************"
echo "* INSTALLING SECURITY IN MYSQL SERVER *"
echo "*********************************************************************"
echo "* Questions during installation of Mysql Security *"
echo "*********************************************************************"
echo "VALIDATE PASSWORD PLUGIN can be used to test passwords"
echo "and improve security. It checks the strength of password"
echo "and allows the users to set only those passwords which are"
echo "secure enough. Would you like to setup VALIDATE PASSWORD plugin?"
echo " "
echo "Press y|Y for Yes, any other key for No: [ N ]"
echo " "
echo "Please set the password for root here."
echo "New password:ZZZZZZZZ"
echo "Re-enter new password:ZZZZZZZZ"
echo "*********************************************************************"
echo "By default, a MySQL installation has an anonymous user,"
echo "allowing anyone to log into MySQL without having to have"
echo "a user account created for them. This is intended only for"
echo "testing, and to make the installation go a bit smoother."
echo "You should remove them before moving into a production"
echo "environment."
echo " "
echo "Remove anonymous users? (y|Y for Yes, any other key for No):[ Y ]"
echo "*********************************************************************"
echo "Normally, root should only be allowed to connect from"
echo "'localhost'. This ensures that someone cannot guess at"
echo "the root password from the network."
echo " "
echo "Disallow root login remotely? (y|Y for Yes, y other key for No):[ N ]"
echo "*********************************************************************"
echo "By default, MySQL comes with a database named 'test' that"
echo "anyone can access. This is also intended only for testing,"
echo "and should be removed before moving into a production"
echo "environment."
echo " "
echo "Remove test database and access? (y|Y for Yes,other key for No):[ N ]"
echo "*********************************************************************"
echo " ... skipping."
echo " Reloading the privilege tables will ensure that all changes"
echo " made so far will take effect immediately."
echo " "
echo " Reload privilege tables now? ( y|Y for Yes, other key for No):[ Y ]"
echo "*********************************************************************"
read -p " Write down the answers (N Y N N Y) and press the [Enter] key..."
echo "*********************************************************************"
mysql_secure_installation # Establecer la seguridad en MySQL
service mysql restart # Reiniciar el servicio MySQL
echo "*********************************************************************"
echo "* ENTER TO MYSQL CONSOLE *"
echo "*********************************************************************"
echo "* Enter password: ZZZZZZZZ for MySQL root user *"
echo "*********************************************************************"
echo " Create a user 'your-user' other than root with all the privileges "
echo " enough both to access from phpmyadmin and connect from a webservice "
echo " To do this, enter the following instructions in the MySQL console "
echo " (copy and paste all together) "
echo "CREATE USER 'your-user' @'%' IDENTIFIED BY 'your-password';"
echo "GRANT ALL PRIVILEGES ON *.* TO 'your-user' @'%' WITH GRANT OPTION;"
echo "FLUSH PRIVILEGES;"
echo "exit; "
echo "*********************************************************************"
mysql -u root -p
service mysql restart
echo "*********************************************************************"
echo "* END OF SECURITY INSTALLATION IN MYSQL SERVER *"
echo "*********************************************************************"
read -p " Press the [Enter] key to continue...."
echo "*********************************************************************"
echo "* INSTALL phpMyAdmin 5.0.4 MySQL Manager *"
echo "*********************************************************************"
read -p " Press the [Enter] key to continue..."
echo "*********************************************************************"
wget https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-all-languages.tar.gz
tar xzf phpMyAdmin-5.0.4-all-languages.tar.gz
mkdir /usr/share/phpmyadmin
mv phpMyAdmin-5.0.4-all-languages/* /usr/share/phpmyadmin
rm -rf phpMyAdmin-5.0.4-all-languages
rm phpMyAdmin-5.0.4-all-languages.tar.gz
mkdir /usr/share/phpmyadmin/tmp
chown -R www-data:www-data /usr/share/phpmyadmin
chmod 777 /usr/share/phpmyadmin/tmp
echo "*********************************************************************"
read -p " End of installation phpMyAdmin - Press [Enter] to continue.."
echo "*********************************************************************"
echo "* To finish you must copy and paste all following lines in the console to configure phpMyAdmin *"
echo "*********************************************************************"
echo "cat > /etc/apache2/conf-available/phpmyadmin.conf<<EOF"
echo "Alias /phpmyadmin /usr/share/phpmyadmin"
echo "Alias /phpMyAdmin /usr/share/phpmyadmin"
echo ""
echo "<Directory /usr/share/phpmyadmin/>"
echo " AddDefaultCharset UTF-8"
echo " <IfModule mod_authz_core.c>"
echo " <RequireAny>"
echo " Require all granted"
echo " </RequireAny>"
echo " </IfModule>"
echo "</Directory>"
echo ""
echo "<Directory /usr/share/phpmyadmin/setup/>"
echo " <IfModule mod_authz_core.c>"
echo " <RequireAny>"
echo " Require all granted"
echo " </RequireAny>"
echo " </IfModule>"
echo "</Directory>"
echo "EOF"
"*********************************************************************"
read -p " End of configuration of phpMyAdmin - Press [Enter] to continue.."
echo "*********************************************************************"
echo "*********************************************************************"
echo "* To finish you must copy and paste all following lines in the console to show PHP information *"
echo "*********************************************************************"
echo "cat > /var/www/html/phpinfo.php<<EOF"
echo "<?php phpinfo(); ?>"
echo "EOF"
"*********************************************************************"
read -p " End of PHPinfo.php PHP information - Press [Enter] to continue.."
echo "*********************************************************************"
"*********************************************************************"
echo "* To finish you must copy and paste all following lines"
echo "                       ( ONE-BY-ONE) "
echo "and execute in the console to finish the installation *"
echo "*********************************************************************"
echo "a2enconf phpmyadmin"
echo "service apache2 restart"
echo "service apache2 reload"
echo "php --version"
echo "mysql --version"
echo ""
echo "*********************************************************************"
echo "* END OF THE INSTALLATION OF LAMP APACHE2 WEB SERVER - PHP8 - MYSQL8*"
echo "*********************************************************************"
read -p "Press the [Enter] key to continue..."
echo "*********************************************************************"
echo " Once these lines have been copied and executed in the console "
echo "*********************************************************************"
echo "1.- In Windows 10 in the browser enter: localhost/phpinfo.php "
echo " You will see the PHP features installed "
echo "2.- In Windows 10 in the browser enter: localhost/phpmyadmin"
echo " Enter user: your-user Enter password: your-password "
echo " Create database, tables, define fields, queries, etc.."
EOF
