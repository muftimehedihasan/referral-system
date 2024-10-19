# Referral Feature Application

This is a Laravel application that implements a referral feature allowing users to invite others via email, track successful registrations, and manage referrals through an admin panel.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Routes](#routes)
- [Contributing](#contributing)
- [License](#license)

## Features

- User registration and login.
- Referral creation through a form.
- Email notifications sent to invited users with a registration link.
- Tracking of successful registrations with referrals.
- Admin panel to view all referrals, including referrer, email referred, date, and status.
- Users can only send a limited number of referral invitations (maximum of 10).
- Invited users cannot be invited again, and existing users cannot be invited.

## Installation

Follow these steps to get your application running locally:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/your-repo-name.git
   cd your-repo-name
2. **Install PHP dependencies:**
Make sure you have Composer installed, then run:
     ```bash
    composer install

3. **Copy the environment file:**
   ```bash
    cp .env.example .env

4. **Generate an application key:**
   ```bash
   php artisan key:generate

5. **Configure the database:**
Open the .env file and set your database connection details. For example:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

6. **Run migrations:**


