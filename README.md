# BrightPath

A comprehensive educational management system designed to streamline faculty-student interactions and academic course management.

## Features

- **Faculty Management**: Manage faculty profiles, availability, and course assignments
- **Student Management**: Track student information, enrollment, and conformations
- **Attendance Tracking**: Monitor and manage student attendance records
- **Course Management**: Create, update, and organize courses with detailed information
- **Class Management**: Manage classes, course details, and student-faculty relationships
- **User Authentication**: Secure login system with role-based access control
- **Dashboard**: Interactive dashboards for different user roles (Faculty, HOD, Admin)

## Project Structure

```
BrightPath/
├── faculty/              # Faculty-related pages and functionality
├── hod/                  # Head of Department management features
├── coursesmatereal/      # Course materials storage
├── css/                  # Global stylesheets
├── js/                   # Global JavaScript files
├── img/                  # Image assets
├── php/                  # Core PHP backend files
├── index.php             # Main entry point
└── README.md             # This file
```

## User Roles

1. **Faculty**: Can view attendance, manage student records, and access course materials
2. **HOD (Head of Department)**: Full management capabilities for faculty, students, courses, and classes
3. **Admin**: System-level administration

## Core Features by Role

### Faculty
- View student attendance
- Access student lists
- Manage attendance records
- View and update profile information

### HOD
- Add/update/remove faculty members
- Add/update/remove students
- Manage courses and course details
- Manage classes and class assignments
- Course conformations and validations
- Faculty availability management

## Database

The system uses a MySQL database. Database configuration can be found in connection files:
- `php/conn.php` - Main database connection
- `faculty/php/conn.php` - Faculty module connection
- `hod/php/conn.php` - HOD module connection

Database schema: `brightpath_9.sql`

## Installation

1. Place the project in your web server's document root (typically `htdocs` for XAMPP/WAMP)
2. Import `brightpath_9.sql` into your MySQL database
3. Update database connection credentials in the `conn.php` files
4. Access the application through your browser at `http://localhost/BrightPath/`

## Getting Started

1. Navigate to the login page (`index.php`)
2. Enter your credentials
3. You'll be redirected to your role-specific dashboard
4. Access features through the navigation menu

## System Requirements

- PHP 7.0 or higher
- MySQL 5.7 or higher
- Web Server (Apache/Nginx)
- Modern web browser with JavaScript enabled

## File Descriptions

- **index.php** - Application entry point and login handler
- **php/login.php** - Login processing
- **php/session.php** - Session management
- **php/conn.php** - Database connection

## License

This project is proprietary software. All rights reserved.

## Support

For issues or questions, please contact the development team or your system administrator.

---

**Last Updated**: November 25, 2025
