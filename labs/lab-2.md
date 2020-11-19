## Lab 2

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and install a new dependency
- connect with MySQL by using the command line
- run the default migrations and create our first tables in MySQL

### Step 1

Check if you have any VMs active and destroy them

### Step 2

Launch a brand new VM with Vagrant

### Step 3

SSH into the VM and navigate into the Laravel's files and folders

### Step 4

Install a new development dependency named [Clockwork](https://underground.works/clockwork/) with [Composer](https://getcomposer.org/)

### Step 5

Open `http://homestead.test/` in the browser to check your Laravel application

### Step 6

Open `http://homestead.test/__clockwork` in another tab, enable it and check all the info it gives us for every route

### Step 7

Connect with MySQL through the command line by using the following credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Check the existing databases and tables in MySQL

### Step 8

Run the following command in terminal and then check again the existing tables in MySQL

```php
$ php artisan migrate
```
