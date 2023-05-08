# This project is not maintained anymore, I have been involved in other projects and forgot about this. I don't have plans coming back to this project currently, however I may do so in the future.

# AeroCMS
Aero / AeroCMS is a simple and easy to use CMS (Content Management System) designed to create fast and powerful web applications. Aero is built with OOP (Object Oriented Programming) PHP which is known for fast website loading speeds.

## System Requirements
- PHP 5.6 - PHP 7.4
- MySQL or MariaDB Database
- Apache2 Server
- If you have an XAMPP server, you have all of these requirements already.

## LAMP Installation
You can run Aero on any operating system or architecture if it runs linux. You can do it on armhf (arm32), arm64 (aarch64), x86 (i386), or x86_64 (amd64). We recommend Debian or Ubuntu Linux since that is what we ran AeroCMS on. XAMPP also works too, it has everything included. Skip to Aero Installation and Database if you already configured your LAMP stack or have XAMPP.

Starting off we need to install our lamp stack. We go with the easiest one which is using tasksel. If you don't have tasksel you need to install it with `sudo apt-get install tasksel`. After we finish installing tasksel, we will install the lamp stack on tasksel with this command. `sudo tasksel install lamp-server` With this command, tasksel will install php, apache2 and mysql. You can even install AeroCMS with MariaDB, but you will need to install the lamp stack manually instead of a two command install. 

After your lamp stack is installed, run `sudo mysql_secure_installation` so you can configure mysql. Create a password and select a level. We suggest level 2 or 3. Press and Enter y for every single other question on the installation. After you get to the privilege tables question, your installation has been completed. Next you need to install phpmyadmin which will help you configure your database visually instead of typing out commands. Run `sudo apt-get install phpmyadmin` to install the graphical interface. Now move on to the section titled Aero Installation and Database.

### Aero Installation and Database
Download this repo and unzip. Make sure your files are in the `htaccess` folder. Remove the file that ends with `.sql`. You will need that. Go into phpmyadmin by going into `http://[YOUR IP ADDRESS]/phpmyadmin/`. Create a database named `aerocms` and go into the import tab in the `aerocms` database. Press choose file and select the file that ends with `.sql`. Press go and the database will be filled with tables. You may get out of phpmyadmin and go to your website which is located at `http://[YOUR IP ADDRESS]/`. Your installation is completed!
