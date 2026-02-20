<?php include __DIR__ . "/partials/header.php"; ?>
<?php include __DIR__ . "/partials/flash.php"; ?>



<form method="POST">

<div class="auth-page">
    <section class="auth-card">
        <h2 class="auth-card-title"> Create your account</h2>
        <p class="auth-subtitle"> Register to start managing your students.</p>

<div class="field">
    <label for="usarname"> Username</label>
    <input id="username" type="text" name="username" placeholder="Enter your username" required>
</div>

<div class="field">
    <label for="email"> Email</label>
    <input id="email" type="email" name="email" type="email" placeholder="you@example.com" required>
</div>

<div class="field">
    <label for="password"> Password </label>
    <input id="password" type="password" name="password" placeholder="Enter your password" required>
</div>

<div class="field">
 <label for="confirm_password"> Confirm Password </label>
    <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" required>
</div>

    <button class="btn btn-full" type="submit">Create account</button>

<p class="auth-footer">
    Already have an account?
    <a href="login.php">Login here</a>
</p>
</form>
</section>
</div>
