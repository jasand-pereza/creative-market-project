# Free Trial email verification tool – Scope/Project Info Document

### Project summary.
This document outlines the scope for this project. It will breakdown highlevel tasks by including a description for each item.
An email sign up form will be developed to allow new customers of the Creative Market site to register and obtain trial access. Users who have already registered will not be able to sign up again (through the longer form) and instead be redirected to another view.

### Project requirements
 - PHP 7+
 - MySQL 5.7.2

A full list of requirements can be found here https://laravel.com/docs/5.6/installation#server-requirements.

## Testing
This project was tested against the latest versions of Safari, Firefox, Chrome and Edge.
Mobile testing was done on an android mobile device. Due to the lack of tools available, I was not able to test with older versions of Internet Explorer or Apple devices.

### Project setup
- First run `composer install`.
- Add your .env file to the project's root folder. Replace the site name and database information with the appropriate environment info.
- Then run `php artisan key:generate`
- Create and migrate the database. You may run the command `php artisan migrate` or import the latest SQL dump from the "/database/dumps" folder.
- Test away. In order to test the form, there needs to be existing users in the database.
- Finally, report any bugs and then hire the developer because you made him feel bad.

### Video preview of the site
https://vimeo.com/287007273

### Tasks
- Create the frontend view and form.
- Frontend validation 
- Set up the backend.
    - Routing
    - Controller (includes validation)
    - Model
    - Database setup (See below for schema)
- Interactive animations
    
### Datbase schema for users

**USERS**
- id | int, primary, unsigned, autoincrements, length = 10
- email | varchar, length = 255
- password | varchar, length = 255
- created_at | timestamp, nullable
- updated_at | timestamp, nullable
- trial_expires | timestamp, nullable
- plan_ends_at | timestamp, nullable

### Notes about form validation
The form checks for a valid domain and a valid email. It then checks the database to see if a record already exists.
The database dump is seeded with 4 user records. Those records belong to employees of The Creative Market. I promise to remove this repository when the Creative Market team is done reviewing. 
