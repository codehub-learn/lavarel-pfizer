## Lab 7

In this lab we will:

- launch Vagrant and interact with it
- SSH into the VM and create some more files with `artisan` tool
- add tests for `UsersController`
- run tests successfully with `phpunit`

### User Story

As a developer, I should ensure the integrity of my work regarding users endpoints provided by `UsersController`, by setting in place some robust test cases

### Step 1

Launch a brand new VM with Vagrant if you haven't already done so

### Step 2

SSH into the VM and navigate into the Laravel's files and folders

### Step 3

Launch artisan and check the available options

### Step 4

Create a test file named `UsersTest`

### Step 5

Add test cases for all API endpoints provided by `UsersController` covering both valid and invalid requests

### Notes

You can run all testcases by running in the terminal:

```
$ phpunit
```

If you need to run all testcases for a specific file, simply run:

 ```
 $ phpunit --filter fileName
 ```

If you need to run a specific testcase, simply run:

 ```
 $ phpunit --filter testcaseName
 ```
