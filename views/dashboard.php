<?php include __DIR__ . "/partials/header.php"; ?>
<?php include __DIR__ . "/partials/navigation.php"; ?>
<?php include __DIR__ . "/partials/flash.php"; ?>

<div class="page">

  <h2 class="page-header">
    Welcome, <?= htmlspecialchars($_SESSION["username"] ?? "") ?>
  </h2>

  <div class="grid">

    <section class="card">
      <div class="card-title">Add Student</div>

      <form method="POST" action="student_create.php">
        <div class="field">
          <label>Student ID</label>
          <input type="text" name="student_id" required>
        </div>

        <div class="field">
          <label>Name</label>
          <input type="text" name="name" placeholder="Name" required>
        </div>

        <div class="field">
          <label>Email</label>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <button class="btn btn-full" type="submit">Add</button>
      </form>
    </section>

    <section class="card">
      <div class="card-title">Students</div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Student ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php if (!isset($students) || !$students): ?>
              <tr><td colspan="4">No students found.</td></tr>
            <?php else: ?>
              <?php while ($row = $students->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row["student_id"]) ?></td>
                  <td><?= htmlspecialchars($row["name"]) ?></td>
                  <td><?= htmlspecialchars($row["email"]) ?></td>
                  <td class="action">
                    <a href="student_delete.php?id=<?= (int)$row["id"] ?>"
                       onclick="return confirm('Delete this student?')">
                      Delete
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </section>

  </div>
</div>
