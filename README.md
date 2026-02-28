<h1 align="center"><img width="100" height="100" alt="image" src="https://github.com/user-attachments/assets/ce719170-4c69-4f4d-b738-ef6c98a581c8" />
 Student Information Management App</h1>

<p align="center">
  A PHP MVC-based web application for managing students with authentication and secure database configuration.
</p>

<hr>

<h2>:floppy_disk: Project Overview</h2>

<p>
This project is a Student Information Management system built using pure PHP with an MVC architecture.
It allows authenticated users to manage student records securely.
</p>

<ul>
  <li>User registration & login system</li>
  <li>Session-based authentication</li>
  <li>Student CRUD operations</li>
  <li>Environment-based database configuration using <strong>dotenv</strong></li>
  <li>Secure MySQL connection via XAMPP</li>
</ul>

<hr>

<h2>🔧 Tech Stack</h2>

<ul>
  <li><strong>PHP 8+</strong></li>
  <li><strong>MySQL</strong></li>
  <li><strong>XAMPP</strong></li>
  <li><strong>Composer</strong></li>
  <li><strong>vlucas/phpdotenv</strong></li>
  <li>MVC Architecture</li>
</ul>

<hr>
<h2 align="center"> Application Preview</h2>

<p align="center">
  A preview of the main application interfaces.
</p>

<br>

<table align="center">
  <tr>
    <td align="center">
      <strong>🏠 Home</strong><br>
      <img src="assets/screenshots/home.png" width="450">
    </td>
    <td align="center">
      <strong>🔐 Login</strong><br>
      <img src="assets/screenshots/login.png" width="450">
    </td>
  </tr>
  <tr>
    <td align="center">
      <strong>📝 Register</strong><br>
      <img src="assets/screenshots/register.png" width="450">
    </td>
    <td align="center">
      <strong>📊 Dashboard</strong><br>
      <img src="assets/screenshots/dashboard.png" width="450">
    </td>
  </tr>
</table>

<br>
<hr>
<h2 align="center"> Application Demo</h2>
 
 
https://github.com/user-attachments/assets/f9490c15-0f2f-42ef-a54d-c01e664691b4

<hr>

<h2>:open_file_folder: Project Structure</h2>

<pre>
StudentsApp/
│
├── config/
│   ├── Database.php
│   └── bootstrap.php
│
├── controllers/
├── models/
├── views/
├── helpers/
├── public/
│
├── .env.example
├── composer.json
└── README.md
</pre>

<hr>

<h2>:gear: Environment Configuration</h2>

<p>
This project uses environment variables to securely manage database credentials.
</p>

<h3>1️⃣ Create a .env file in the root directory:</h3>

<pre>
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=studentapp
DB_USER=root
DB_PASS=
</pre>

<h3>2️⃣ Install dependencies:</h3>

<pre>
composer install
</pre>

<hr>

<h2>💡 How to Run Locally</h2>

<ol>
  <li>Clone the repository</li>
  <li>Move the project into your <code>htdocs</code> folder</li>
  <li>Start Apache and MySQL via XAMPP</li>
  <li>Create a database named <strong>studentapp</strong></li>
  <li>Import required tables (users, students)</li>
  <li>Access the application:</li>
</ol>

<pre>
http://localhost/StudentsApp/public/login.php
</pre>

<hr>

<h2>🔐 Authentication Flow</h2>

<ul>
  <li>Secure password hashing</li>
  <li>Session management</li>
  <li>Protected routes via middleware-like helpers</li>
  <li>Logout via session destruction</li>
</ul>

<hr>

<h2>📈 Learning Objectives</h2>

<ul>
  <li>Understanding MVC architecture in PHP</li>
  <li>Secure credential management with dotenv</li>
  <li>Database connection handling</li>
  <li>Session-based authentication</li>
  <li>Professional Git & GitHub workflow</li>
</ul>

<hr>

<h2><img width="100" height="100" alt="image" src="https://github.com/user-attachments/assets/7c684339-47b4-406d-b2e5-eef5688885bf" />
 Author</h2>

<p>
<strong>Leiziane Trevisan Dardin</strong><br>
Software Development Student<br>
Bow Valley College – Calgary, Canada
</p>

<hr>

<p align="center">
Built with :heart: using PHP & MySQL
</p>
