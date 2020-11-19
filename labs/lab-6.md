## Lab 6

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and create some more files with `artisan` tool
- validate sent data for `create` and `update` methods of `UsersController` through Requests classes
- add extra endpoints in `SkillsController` and `UsersSkillsController` through artisan
- create a new Model named `Vacation`
- create `UsersVacationsController` through artisan
- add endpoints for creating, updating and deleting a vacation
- validate sent data for `create` and `update` methods of `SkillsController` and `UsersVacationsController` through Requests classes

### Step 1

Launch a brand new VM with Vagrant if you haven't already done so

### Step 2

SSH into the VM and navigate into the Laravel's files and folders

### Step 3

Launch artisan and check the available options

### Step 4

Add a new `Request` class named `UsersStoreRequest` to validate inputs for `store` method in `UsersController`

Add a new `Request` class named `UsersUpdateRequest` to validate inputs for `update` method in `UsersController`

### Step 5

Add endpoint POST `/skills` in `SkillsController@store` and use Eloquent to create new `skills`

Use `apiResource` to declare this route

The only attribute you need to send over through curl is the `title`

### Step 6

Add a new `Request` class named `SkillsStoreRequest` to validate inputs for `store` method

Remember that each skill should be unique in the `skills` table

### Step 7

Add endpoint PUT `/skills/:id` in `UsersController@update` and use Eloquent to update an existing `skill`

Use `apiResource` to declare this route

The only attribute you need to send over through curl is the `title`

### Step 8

Add a new `Request` class named `SkillsUpdateRequest` to validate inputs for `update` method

Remember that each skill should be unique in the `skills` table

### Step 9

Add endpoint DELETE `/skills/:id` in `UsersController@destroy` and use Eloquent to delete an existing `skill`

### Step 10

Add endpoint POST `/users/:id/skills` in `UsersSkillsController@store` and use Eloquent to attach an array of `skills` to a `user`

Use `apiResource` to declare this route

The only attribute you need to send over through curl is an array of skills ids

### Step 11

Add a new `Request` class named `UsersSkillsStoreRequest` to validate inputs for `store` method

Remember that each skill should actually exist in the `skills` table

### Step 12

Add `Vacation` model with its migration file through artisan and connect it with one-to-many relationship with `User` model

### Step 13

Add fields `from` and `to` that should be dates in the migration file and field `user_id` to connect each vacation entry with one user

The fields `from` and `to` indicate when a vacation starts and when it ends

### Step 14

Add factories and seeders for vacations through artisan

### Step 15

Run the migration command by adding the seed option and check the new `vacations` table in MySQL

```
$ php artisan migrate:fresh --seed
```

### Step 16

Add a new controller named `UsersVacationsController` through artisan

### Step 17

Add endpoints for `index`, `show`, `store`, `update` and `destroy` methods of `UsersVacationsController` and use model binding

### Step 18

Add requests classes through Artisan to validate data sent over to the API through endpoints POST `/users/:user/vacations` and PUT `/users/:user/vacations/:vacation`
