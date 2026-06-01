# CreateMyResume

CreateMyResume is a PHP-based Job Seeker Profiling and Resume Builder System developed as a student web application project. The system allows users to register, login, complete their career profile, generate a resume, view recommended jobs, apply for jobs, and monitor application activities through an interactive dashboard.

The system is inspired by modern career platforms such as MyFutureJobs, JobStreet, LinkedIn Jobs, and online resume builder platforms. It is designed as a simplified student-level prototype focusing on PHP logic, user flow, dashboard analytics, profile management, resume generation, and job application tracking.

---

# Features

* User Login & Registration
* Profile Management
* Resume Builder
* Upload Profile Image
* Recommended Jobs Page
* Job Application Tracking
* Interactive Dashboard Charts
* Responsive User Interface
* PHP Session-Based Data Handling
* JavaScript-Based Job Search Filter
* Print / Export Resume as PDF

---

# Technologies Used

* PHP
* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* Chart.js
* XAMPP
* Visual Studio Code

---

# System Modules

## 1. Landing Page

The landing page introduces the CreateMyResume system and provides navigation to the Login and Register pages.

## 2. Login & Registration

The Login and Registration modules allow users to access the system.

Current demo login credentials:

```txt
Username: demo
Password: 12345
```

The system uses PHP session handling to simulate user authentication.

## 3. Dashboard

The dashboard displays the user’s career profile overview and analytics.

Dashboard includes:

* Resume Completion Percentage
* Applications Submitted
* Profile Completion Chart
* Resume Content Chart
* Skills Overview Chart
* Profile Strength Radar Chart
* Application Overview Chart

The charts are generated using Chart.js and are affected by the information entered in the Profile module.

## 4. Profile Module

Users can update their resume profile information.

Profile fields include:

* Full Name
* Job Title
* Phone Number
* Email
* Website / Portfolio
* Address
* About Me
* Education
* Experience
* Skills
* Language
* References
* Profile Picture Upload

The entered profile data is used to generate the resume preview and update dashboard charts.

## 5. Resume Builder

The Resume Builder dynamically generates a resume based on the information entered in the Profile module.

Resume features:

* Profile image display
* Name and job title
* Contact information
* About Me section
* Education section
* Skills section
* Language section
* Experience section
* References section
* Print / Export PDF button

## 6. Jobs Module

The Jobs module displays recommended job opportunities.

Users can:

* View available jobs
* Search jobs using JavaScript filter
* Apply for selected jobs

## 7. Applications Module

The Applications module displays jobs applied by the user.

It shows:

* Job title
* Company name
* Location
* Required skills
* Application status

---
# Login Instructions

Use the demo account below:

```txt
Username: demo
Password: 12345
```

After login, the user will be redirected to:

```txt
dashboard.php
```

---

# Register Instructions

1. Open the Register page.
2. Fill in the registration form.
3. Click the Register button.
4. A success message will appear.
5. Go to the Login page and use the demo login credentials to access the system.

Note: The registration page currently works as a prototype form and does not save data into MySQL yet.

---

# Recommended Demo Flow

To demonstrate the system properly, follow this flow:

```txt
Landing Page
↓
Register Page
↓
Login Page
↓
Dashboard
↓
Profile Page
↓
Resume Page
↓
Jobs Page
↓
Applications Page
↓
Dashboard
```

---

# How to Test Dashboard Charts

The dashboard charts are connected to the Profile module.

## Step 1: Login

Login using:

```txt
Username: demo
Password: 12345
```

## Step 2: Complete Profile

Go to the Profile page and fill in details such as:

```txt
Full Name
Job Title
Email
Phone
Education
Skills
Experience
Language
References
```

## Step 3: Save Profile

Click:

```txt
Save Profile
```

## Step 4: View Dashboard

Return to the Dashboard page.

The charts will update based on the profile data entered.

---

# Chart Explanation

## 1. Resume Completion Chart

This chart shows how complete the user’s profile is.

It is calculated based on filled fields such as:

* Full Name
* Email
* Phone
* Education
* Skills
* Experience
* About Me
* Language
* References

More completed fields will increase the resume completion percentage.

## 2. Resume Content Chart

This chart analyses the amount of resume content entered by the user.

It reads information from:

* Education
* Skills
* Experience
* Language

## 3. Skills Overview Chart

This chart visualizes the user’s skills and career readiness information.

More skills entered in the Profile page will increase the skills value in the dashboard chart.

## 4. Profile Strength Radar Chart

This chart displays the strength of the user profile based on:

* Education
* Experience
* Skills
* Language
* References

## 5. Application Overview Chart

This chart shows job application activity.

When a user applies for a job from the Jobs page, the application data appears in the Applications page and affects the dashboard application count.

---

# How Profile Data Affects Resume

The Resume page is dynamically generated from the Profile page.

Example:

If the user enters this in Profile:

```txt
Full Name: Aina Sofia
Job Title: Junior Web Developer
Skills: HTML, CSS, PHP, Communication
```

The Resume page will display the same information automatically.

This shows that the Profile module and Resume module are connected using PHP session data.

---

# How Job Application Works

1. Go to the Jobs page.
2. View recommended jobs.
3. Click Apply Job.
4. The selected job will be stored in the Applications page.
5. Dashboard application statistics will update based on the applied jobs.

---

# Project Scope

This project focuses on building a functional PHP-based prototype for a job seeker profiling and resume builder system.

Current prototype includes:

* Landing Page
* Register Page
* Login Page
* Dashboard Analytics
* Profile Management
* Resume Generator
* Profile Image Upload
* Recommended Jobs
* Job Application Tracking
* JavaScript Search Filter
* PHP Session Handling
* Responsive Design

---

# Limitations

* Data is stored using PHP session only.
* Data will reset after logout.
* MySQL database is not yet connected.
* Registration does not permanently store new users.
* Job data is currently predefined in PHP array.
* Applications are stored temporarily during the active session.

---

# Conclusion

CreateMyResume demonstrates how a PHP-based web application can support job seeker profiling, resume generation, job application tracking, and dashboard analytics. Although the current version is a prototype, the system structure is designed to be expandable into a more advanced career platform with database integration, recruiter access, admin management, and business-ready SaaS features.
