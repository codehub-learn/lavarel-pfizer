## Lab 4

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and create some more files with `artisan` tool
- connect models `User` and `Skill` with many to many relationship
- create factories and seeders for models `User` and `Skill`
- add extra endpoints for `users`
- create `SkillsController` and `UsersSkillsController` through artisan
- add extra endpoints for `skills`
- run migrations with seeders
- show real data in the endpoints

### Step 1

Launch a brand new VM with Vagrant if you haven't already done so

### Step 2

SSH into the VM and navigate into the Laravel's files and folders

### Step 3

Launch artisan and check the available options

### Step 4

Connect models `User` and `Skill` with many-to-many relationship and create a migration through artisan for `users_skills` table

### Step 5

Add foreign keys `user_id` and `skill_id` in this migration script

### Step 6

Create a new factory named `SkillFactory` with artisan

### Step 7

Use Faker to add a random `title` in `SkillFactory`

### Step 8

Create seeders named `UsersSeeder` and `SkillsSeeder` with artisan and declare them in file `database/seeders/DatabaseSeeder`

In `UsersSeeder` add also some random bindings between `users` and `skills` to populate the `users_skills` table

### Step 9

Run the migration command by adding the seed option and check the `users` and `skills` tables in MySQL with their random data

```
$ php artisan migrate:fresh --seed
```

### Step 10

Go to `index` method in `UsersController` and use Eloquent to get all available `users` from MySQL. Once done, replace the dummy list with this collection

### Step 11

Add another route under `/api/users/:id` and bind a new method named `show` in `UsersController`. Use Eloquent to spot the user that has this `id` passed as a parameter and return it

### Step 12

Create controllers `SkillsController` and `UsersSkillsController` through artisan

### Step 13

Add another route under `/api/skills` and bind a new method named `index` in `SkillsController`. Use Eloquent to retrieve all records from `skills` table and return them

### Step 14

Add another route under `/api/users/:id/skills` and bind a new method named `index` in `UsersSkillsController`. Use Eloquent to spot the user that has this `id` passed as a parameter and return its skills
