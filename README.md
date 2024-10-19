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
## 2. Install PHP dependencies:
Make sure you have Composer installed, then run:
     ```bash
    composer install

## Copy the environment file:
   ```bash
    cp .env.example .env

