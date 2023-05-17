# adminapprovel
User Registration Admin Approval
This project is a user registration admin approval system implemented using PHP and MySQL. It allows an administrator to view and manage user registrations by approving, editing, or deleting user records.

Features
Display a list of pending user registrations.
Approve user registrations to change their status to "approved".
Edit user information, including username, email address, and password.
Delete user records from the system.
Responsive user interface for easy navigation and interaction.
Prerequisites
Before running this project, make sure you have the following prerequisites installed:

PHP
MySQL
Web server (000Webhost)
Installation
Clone the repository to your local machine or web server:

bash
Copy code
git clone [https://github.com/your-username/user-registration-admin-approval.git](https://github.com/Shkkhwaja/adminapprovel)
Import the database schema by executing the SQL script database.sql provided in the sql folder. This will create the necessary tables for storing user information.

Update the connection.php file with your MySQL database credentials. Modify the following lines:

php
Copy code
$host = 'localhost';
$username = 'your-username';
$password = 'your-password';
$database = 'your-database';
Start your web server and access the project through your web browser.

Usage
Upon accessing the project, you will see a list of pending user registrations.
To approve a user, click the "Approve" button. The user's status will change to "approved."
To edit a user's information, click the "Edit" button. This will scroll the page to the edit form where you can modify the user's details.
To delete a user, click the "Delete" button. The user's record will be removed from the system.
To update a user's information, make changes in the edit form and click the "Update" button. The user's details will be updated in the database.
You will receive a success message or an error message after performing each action.
Contributing
Contributions are welcome! If you have any ideas, suggestions, or improvements, please submit a pull request.

test our website :

user-Register-Login = https://newphpproject.000webhostapp.com/register.php .

Admin-Approvel = https://newphpproject.000webhostapp.com/admin-approvel.php .


