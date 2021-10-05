# AeroCMS
Aero / AeroCMS is a simple and easy to use CMS (Content Management System) designed to create fast and powerful web applications. Aero is built with OOP (Object Oriented Programming) PHP which is known for fast website loading speeds.

## Contents
- <a href="#installation">Installation (Not Completed)</a>

<div class=#installation>
## Installation (Not Completed)
You can run Aero on any operating system or architecture if it runs linux. You can do it on armhf (arm32), arm64 (aarch64), x86 (i386), or x86_64 (amd64). We recommend Debian or Ubuntu Linux since that is what we ran AeroCMS on.

Starting off we need to install our lamp stack. We go with the easiest one which is using tasksel. If you don't have tasksel you need to install it with `sudo apt-get install tasksel`. After we finish installing tasksel, we will install the lamp stack on tasksel with this command. `sudo tasksel install lamp-server` With this command, tasksel will install php, apache2 and mysql. You can even install AeroCMS with MariaDB, but you will need to install the lamp stack manually instead of a two command install. 

After your lamp stack is installed, run `sudo mysql_secure_installation` so you can configure mysql. Create a password and select a level. We suggest level 2 or 3. Press and Enter y for every single other question on the installation. After you get to the privilege tables question, your installation has been completed. Next you need to install phpmyadmin which will help you configure your database visually instead of typing out commands. Run `sudo apt-get install phpmyadmin` to install the graphical interface.
</div>
