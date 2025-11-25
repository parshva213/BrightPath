# BrightPath - Educational Management System

## Overview
BrightPath is a comprehensive web-based educational management system that facilitates interaction between faculty members and students while providing administrative controls for department heads (HOD).

## Key Stakeholders
- **Faculty Members**: Teach courses and manage attendance
- **Head of Department (HOD)**: Administrative oversight and management
- **Students**: Enrolled in courses and track attendance

## Current Features
- User authentication with role-based access
- Faculty and student management
- Attendance tracking and reporting
- Course and class management
- User profiles and dashboard

## Tech Stack
- **Backend**: PHP 7.0+
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx

## Module Descriptions
- `faculty/` - Faculty-specific pages and functionality
- `hod/` - Head of Department management interface
- `coursesmatereal/` - Course materials and resources
- `php/` - Core backend logic and database operations
- `css/` - Styling
- `js/` - Client-side scripting

## Contributing Guidelines
- Follow existing code structure and naming conventions
- Test changes before committing
- Keep commits focused and meaningful
- Update documentation when adding features

## Development Notes
- Database schema is defined in `brightpath_9.sql`
- Connection parameters are in `conn.php` files
- Session management is handled in `php/session.php`
