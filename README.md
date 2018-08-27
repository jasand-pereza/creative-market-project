# Free Trial email verification tool – Scope Document

## Project Summary.
This document outlines the scope for this project. It will breakdown highlevel tasks by including a description and estimate for each item.
An email sign up form will be developed to allow new customers of the Creative Market site to register and obtain trial access. User who have already registered will not be able to sign up again and instead be redirected to another view.

### Tasks
- Create the frontend view and form. This will include the following fields. (1.5 hours)
- Frontend validation (0.5 hours)
- Set up the backend. (2 hours)
    - Routing
    - Controller (includes validation)
    - Model
    - Database setup (See below for schema)
    
### Datbase Schema for users

**USERS**
id | int, primary, unsigned, autoincrements, length = 10
username | varchar, length = 255, nullable
email | varchar, length = 255
password | varchar, length = 255
created_at | timestamp, nullable
updated_at | timestamp, nullable
trial_expires | timestamp, nullable
plan_ends_at | timestamp, nullable
