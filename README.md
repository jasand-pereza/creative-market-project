# Free Trial email verification tool – Scope/Project Info Document

## Project Summary.
This document outlines the scope for this project. It will breakdown highlevel tasks by including a description for each item.
An email sign up form will be developed to allow new customers of the Creative Market site to register and obtain trial access. User who have already registered will not be able to sign up again and instead be redirected to another view.

## Project Requirements
 - PHP 7+
 - MySQL 5.7.2

## Project setup
- First run `composer install`.
- Add your .env file in the project's root folder. Replace the site name and database information with the appropriate environment info.
- Then run `php artisan key:generate`
- Create and migrated the database. You may run the php artisan migration command or import the latest SQL dump from the "/database/dumps" folder.
- Test away. In order to test the form, there needs to be existing users in the database.
- Report bugs and then hire the developer because you made him feel bad.

### Tasks
- Create the frontend view and form. This will include the following fields.
- Frontend validation 
- Set up the backend.
    - Routing
    - Controller (includes validation)
    - Model
    - Database setup (See below for schema)
- Interactive animations
    
### Datbase Schema for users

**USERS**
- id | int, primary, unsigned, autoincrements, length = 10
- email | varchar, length = 255
- password | varchar, length = 255
- created_at | timestamp, nullable
- updated_at | timestamp, nullable
- trial_expires | timestamp, nullable
- plan_ends_at | timestamp, nullable


### Notes About Form Validation
The form checks for a valid domain and a valid email. It then checks the database to see if a record already exists.
The database dump is seeded with 4 user records. Those records belong to employees of The Creative Market. I promise to remove this repository when the Creative Market team is done reviewing. 