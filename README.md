# Food Ordering System

## Description
This is a Food Ordering System developed by Salman Ansari. It allows users to browse restaurants, view menus, place orders for delivery or take-out, and receive personalized dish recommendations based on their preferences and order history. The system also includes an admin panel for managing categories, menus, restaurants, orders, and users.

## Features

### User Features
- Browse a variety of restaurants by category
- View popular dishes and recommended dishes personalized to user preferences
- Place orders for delivery or take-out
- User registration and login
- View order history and status

### Admin Features
- Manage restaurant categories
- Add, update, and delete restaurants and menus
- View and update orders
- Manage users
- Admin login and dashboard

## Technologies Used
- PHP (Recommended versions: 5.6, 7.4)
- MySQL (Database: onlinefoodphp)
- Bootstrap for responsive UI
- FontAwesome for icons
- Custom CSS and JavaScript for styling and interactivity

## Installation

### Requirements
- PHP 5.6 or 7.4
- MySQL Server
- Web server (e.g., Apache)

### Setup Steps
1. Clone or download the project files to your web server root directory (e.g., `htdocs` for XAMPP).
2. Import the database:
   - Use phpMyAdmin or MySQL CLI to import the SQL file located at `DATABASE FILE/onlinefoodphp.sql`.
3. Configure database connection if needed:
   - The default database connection settings are in `connection/connect.php`:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "onlinefoodphp";
     ```
   - Update these settings if your environment differs.
4. Ensure your web server is running and supports the required PHP version.
5. Access the application via your browser at `http://localhost/food-ordering-system/`.

## Usage

### Default Admin Login
- Username: `admin`
- Password: `codeastro`

### User Access
- Users can register and login via the website.
- After login, users can browse restaurants, view dishes, and place orders.
- Personalized dish recommendations are available based on user preferences.

## File Structure Overview
- `index.php` - Main user-facing homepage with restaurant and dish listings.
- `recommender.php` - Contains the dish recommendation logic.
- `connection/connect.php` - Database connection setup.
- `admin/` - Admin panel files for managing the system.
- `css/`, `js/`, `images/` - Frontend assets.
- `DATABASE FILE/onlinefoodphp.sql` - Database schema and sample data.
- Other PHP files handle user registration, login, orders, and restaurant/dish details.

## Author
Developed by Frankline Omari.

## License
This project is provided as-is without any warranty. Use and modify as needed.

---

