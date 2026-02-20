<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!empty($_SESSION["message"])) :
  $type = $_SESSION["message_type"] ?? "success";
?>
  <div id="flash-message" class="flash-toast <?= htmlspecialchars($type) ?>">
    <?= htmlspecialchars($_SESSION["message"]) ?>
  </div>

   <!-- used Chatgpt to help with some animations -->
  <script>
    requestAnimationFrame(() => {
      const flash = document.getElementById("flash-message");
      if (flash) flash.classList.add("show");
    });


    setTimeout(() => {
      const flash = document.getElementById("flash-message");
      if (!flash) return;

      flash.classList.remove("show"); //returns to the top
      flash.classList.add("hide");    // fade out

      setTimeout(() => flash.remove(), 600);
    }, 3000);
  </script>
<?php
  unset($_SESSION["message"], $_SESSION["message_type"]);
endif;
?>
