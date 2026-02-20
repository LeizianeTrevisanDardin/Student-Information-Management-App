<?php
require_once __DIR__ . "/../views/partials/header.php";
require_once __DIR__ . "/../views/partials/navigation.php";
require_once __DIR__ . '/../config/bootstrap.php';
?>

<div class="page">
  <section class="card">
    <div class="home-hero">
      <h1>Student Information Management App</h1>
      <p>
        This application is a server-side PHP web application built with Apache and MySQL.
        It allows users to register, log in, and manage student records in a secure and structured way.
      </p>
    </div>

    <h2 style="text-align:center; margin-top: 10px;">After creating an account and logging in, users can:</h2>

    <ul class="features">
      <li><span class="dot"></span> View all student records (student ID, name, and email)</li>
      <li><span class="dot"></span> Add new students to the database</li>
      <li><span class="dot"></span> Delete students they no longer need</li>
    </ul>

    <p class="home-note">
      The system uses two database tables (users and students) and follows the MVC architecture to separate business logic, data handling, and user interface.
    </p>
  </section>
</div>


<?php 

require_once __DIR__ . "/../views/partials/footer.php";

?>

