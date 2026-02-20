<?php include __DIR__ . "/partials/header.php"; ?>
<?php include __DIR__ . "/partials/flash.php"; ?>


<form method="POST">


<div class="auth-page">
  <section class="auth-card">
    <h2 class="auth-card-title">Welcome Back!</h2>
    <p class="auth-subtitle">Sign in to manage your students!</p>

    <form method="POST">
      <div class="field">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="you@example.com" required>
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter your password" required>
      </div>

      <button class="btn btn-full" type="submit">Login</button>
    </form>

    <p class="auth-footer">
      Don't have an account yet?
      <a href="register.php">Register Now!</a>
    </p>
  </section>
</div>

