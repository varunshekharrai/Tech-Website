# Tech Website
This is a sample website made with help of HTML, CSS, JS, PHP, SQL and JQUERY.
## Installation
This website was made and tested in [Ubuntu 20.04](https://ubuntu.com/) using Apache server.
### Install Apache server
```bash
sudo apt-get install apache2
```
### Install PHP
```bash
sudo apt install php
```
### Install and setup SQL
```bash
sudo apt-get install mysql-server mysql-client
sudo mysql_secure_installation
```
### Install PHPMYADMIN
```bash
sudo apt-get install phpmyadmin
```
## Put files in directory
```bash
/var/www/html
```
### Import SQL file
Go to [phpmyadmin](localhost/phpmyadmin) and create a database with name "tech". Then go to that database and import "tech.sql" file. Change the slq url, user and password in "db.php".
## Open website in browser using
[Localhost](localhost/tech)
# Information
This is a basic website created by Varun Shekhar Rai.
## Features
Read Blogs, Creating new Blogs, Comment on Blogs, Login, Signup.
## Pages
This website has three main pages Home, Blog, Services. Other supporting page is Login page which includes Signup and Login feature.
## Website Type
This website is a dynamic website with backend in PHP with database in MySql and frontend is in Materialize framework.
## Purpose
For the purpose of email acquisition a person can't read a blog without Login or Signup.
