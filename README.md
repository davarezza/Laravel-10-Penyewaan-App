<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Mining Vehicle Rental Website User Guide

The Mining Vehicle Rental Application is a platform designed to facilitate the rental process and management of mining vehicles. With a user-friendly interface and various powerful features, this application enables users to perform various tasks, from vehicle management to order processing.

# Key Features
- Multi-User Login
- CRUD Vehicles and Orders (Admin)
- Approve or Reject Orders (Approver)
- Vehicle Usage Graphs
- Excel Export for Orders
- Activity Logs
- Logout Account

# Application Usage Guide

- Visit the provided GitHub link. Then, find the 'Code' button at the top right of the repository. Click on that button, and from the dropdown options that appear, select 'Download ZIP'. - Once you select this option, a ZIP archive containing the entire project source code will be downloaded to your device.
- Extract the ZIP file and open the folder in a code editor like VSCode.
- Open the terminal and type the command composer install.
- Configure the .env file as needed.
- In the terminal, run the command php artisan migrate --seed and php artisan db:seed --class=RoleUsersSeeder to automatically populate data for orders, vehicles, and users.
- Start XAMPP with Apache and MySQL, then run the serve using the command php artisan serve.
- Please log in first to access the rental application.
- As an Admin, you have full access to all features of this application, except for the approval feature. As an Approver, you can access the approval feature and other features, but you 
  do not have access to CRUD features for Vehicles and Orders.
