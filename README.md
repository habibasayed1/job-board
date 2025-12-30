# HireHub System
<p> HireHub is a full-featured job posting and application platform designed to streamline the process of discovering, posting, managing, and applying for jobs.
The system allows job seekers to browse available job listings, apply to positions, and manage their applications, while employers (company representatives) can create, edit, and delete job postings.<p/> 

## User Roles
### 1. Guest (Unauthenticated User)
 - Browse all job listings
 - View individual job details
 - Cannot apply to jobs (prompted to sign in or create account)
### 2. Job Seeker (Authenticated User)
 - Browse and view jobs.
 - Apply to any job.
 - View personal list of applied jobs ("My Applications").
 - Access profile and logout.

### 2. Employer / Company Representative 
 - All Job Seeker capabilities.
 - Create new job postings.
 - View list of own posted jobs ("My Jobs").
 - Edit or delete own job postings.
 - No ability to view or manage incoming applications (current scope limitation).

## Key Features 
- Job Browsing & Discovery: Any visitor can view job listings with details such as title, location, salary, company, experience level, category, and description.
- Job Application Management: Registered job seekers can apply to jobs, view their application history, track applied positions, and delete any job application.
- Employer Job Management: Registered users can designate themselves as company employees/representatives and post new jobs, edit existing ones, or delete them.
- User Authentication & Roles: Secure sign-up, login, logout, and role-based access (job seeker vs. employer).
-Administrative Tools: Employers have full control over their own job postings (create/edit/delete), but cannot directly accept/reject applicants (no built-in hiring decision workflow in current version).

## Architecture Diagram
![Job offers frrom specific page](https://github.com/user-attachments/assets/eefdb31a-19a9-4c9f-813e-8549fb88d071)

## Database Schema
<img width="870" height="940" alt="Blank diagram (3)" src="https://github.com/user-attachments/assets/4a882898-f11a-4c95-addb-41c0a9515254" />

## Sequence diagram 1
### Browse Jobs as a Guest
<img width="1019" height="923" alt="Blank diagram (2)" src="https://github.com/user-attachments/assets/415a601b-9bd9-4250-95f4-3ee96e4bc1f0" />

## Sequence diagram 2
### Apply to a Job
<img width="1540" height="953" alt="Blank diagram (4)" src="https://github.com/user-attachments/assets/c28c22c0-24b7-41af-af94-d6000c51bb43" />


## API Endpoints
### Authentication 
- `POST/api/register` - Register new user
- `POST/api/login` - Login user and get JWT/token
- `POST /api/logout` - Logout user
  
### Jobs (Public Browsing)
- `GET/api/jobs` - Get list of all active jobs
- `GET/api/jobs/{id}` - Get single job details
  
### Job Management (Employer Only)
- `POST/api/jobs` - Create a new job posting
- `GET/api/my-jobs` - Get list of jobs posted
- `PATCH/api/jobs/{id}` - Update own job
- `DELETE/api/jobs/{id}` - Delete job offer

### Application
- `POST/api/jobs/{id}/apply` - apply Apply to a job
- `GET/api/my-applications` - Get list of jobs the user has applied to

### Employer Profile
- `POST/api/employer` - Create or link employer profile (company) for the user`
- `GET /api/employer/me` - Get current user's employer profile

## Screenshots
### 1. Home Page 
### 1.1 Home page
![Home page](https://github.com/user-attachments/assets/33e5219a-8a0a-4fd0-8421-c007661e41a2)
### 1.2 Home page
![Home page 2](https://github.com/user-attachments/assets/e5386d62-7068-446e-aac3-f50deb4cb364)

## 2. Log in page
![Login page](https://github.com/user-attachments/assets/a45318d2-7eff-495f-9457-55e803afc8bc)

## 3. Applying for a job
### 3.1. Warning to log in first
![warning for logining in](https://github.com/user-attachments/assets/e0126bfc-4967-43f5-9b77-a88059a0a4bd)

### 3.2. Applying for a job
![Applyin for job 1](https://github.com/user-attachments/assets/a6af051c-5b07-4f5a-abab-5aafa348b0dc)
### 3.3. Applying for a job
![Applying for job 2](https://github.com/user-attachments/assets/5eab6ff5-fff8-4aee-affb-8a22a0c511cc)

### 3.4. Applying for a job
![Successfully applied](https://github.com/user-attachments/assets/ebe08a9a-4842-4824-bcff-548da2f68bdd)

## 4. My Applications
![Jobs I applied to](https://github.com/user-attachments/assets/78add386-012b-4fc3-8035-b260ba17189e)

## 5. Job offers from specific company
![Job offers frrom specific page](https://github.com/user-attachments/assets/abb2875a-0934-4975-ae55-640f6de4cc4b)

## Create Job offers 
### 6.1.Create Job offers 
![Create job as an employer](https://github.com/user-attachments/assets/7eb63c0b-aa1d-4e16-8fc8-bbc9b673c921)
### 6.2.Create Job offers 
![Create job as an employer2](https://github.com/user-attachments/assets/fef9383b-59ba-4da4-9cb1-08fe2b4d8948)

