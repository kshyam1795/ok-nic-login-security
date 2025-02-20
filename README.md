# Secure Login and OWASP Security Package

This package offers secure login with **email OTP**, **role/permission management**, **profile management**, **SEO settings**, **audit logging**, **backup management**, and **end-to-end encryption** for Laravel applications.

## Features

- **Email OTP Authentication** for secure login.
- **Role and Permission Management** using Spatie's package.
- **Profile Management** for users and admin.
- **Audit Logs** for all significant actions.
- **Toaster Notifications** for error/success feedback.
- **SEO & Settings Management** for better control.
- **Database and Source Code Backup** support.
- **Payload End-to-End Encryption** for security.

## Installation

```bash
composer require growats/ok-nic-login-security


##Configuration
Publish config file:
 
php artisan vendor:publish --provider="Growats\OkNicOwaspSecurity\OkNicOwaspSecurityServiceProvider"
Configure settings in .env file for security keys, etc.



##Key Features
User Registration/Login with Email OTP:

##Sends OTP to email for login and registration.
Verifies OTP for authentication.
Role and Permission Management:

##Admin can manage user roles and permissions.
Uses Policies to manage access.
Profile Management:

##Users can manage their profiles.
Admin can update roles, permissions, etc.
Audit Logging:

##Logs actions such as login attempts, profile updates, and changes in settings.
Error Handling (Toaster):

##Displays errors, success, and info messages with toast notifications.
SEO & Settings:

##Manages SEO configurations and general settings (site name, meta description, etc.).
Backup Management:

##Database backup and Source code backup.
Security Features:

##Encrypted form data for login, registration, and profile update (End-to-End Encryption).
Ability to enable/disable security features (e.g., OTP, encryption).

##Notifications on security breaches.
Laravel Upgrade Notifications:

Admin receives notifications for any available Laravel updates.
