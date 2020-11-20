## Lab 3

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and play with `artisan` tool
- create our first Controller
- tweak User Model
- create our first Model and migration

### Step 1

Launch a brand new VM with Vagrant if you haven't already done so

### Step 2

SSH into the VM and navigate into the Laravel's files and folders

### Step 3

Launch artisan and check the available options

### Step 4

Run some commands to:

- check the available routes
- clear all clockwork records

### Step 5

Create `UsersController` through artisan

```
$ php artisan make:controller UsersController
```

Check that the controller was created successfully

### Step 6

Create a method named `index` that returns the word `users`

### Step 7

Create a route under `routes/api.php` for `/api/users` and connect the `index` method living in `UsersController` controller with route `/users`. Check the result in the browser

### Step 8

Create an array of dummy users and return this array instead of the word `users`. Check the result in the browser

### Step 9

Create a variable that counts the `users` array volume and return an array with 2 keys one for `users` and one for `count`. Check the result in the browser

### Step 10

Add 2 new `string` fields in users migration:

- firstName
- lastName

### Step 11

Drop the `name` field from the users migration

### Step 12

Run the migration command again and check the `users` table

### Step 13

Create a computed property in the `User` model named `fullName` that will be the created after concatenating the first name with last name. Declare it in the model so it is added in the JSON output accordingly

### Step 14

Create a Model named `Skill` and its migration with:

```
$ php artisan make:model Skill -m
```

Check that the model and the migration files were created successfully

### Step 15

Add a `string` field named `title` in the migration script

### Step 16

Run the migration command again and check the `skills` table
