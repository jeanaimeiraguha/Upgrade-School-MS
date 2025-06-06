<?php
session_start();

// Example: check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];  // get username from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GIKONKO TSS Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <script>
    function toggleMenu() {
      document.getElementById("mobile-menu").classList.toggle("hidden");
    }
  </script>
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1601933470928-c37b3d639ad3?auto=format&fit=crop&w=1950&q=80');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      position: relative;
    }
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }
  </style>
</head>
<body class="font-sans text-white">

  <!-- Navbar -->
  <nav class="bg-white bg-opacity-90 shadow-md sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center space-x-8">
          <div class="flex-shrink-0 flex items-center text-xl font-bold text-blue-600">
            <i class="fas fa-school mr-2"></i> GIKONKO TSS
          </div>
          <div class="hidden sm:flex sm:space-x-6">
            <a href="index.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-marker"></i>
              <span>Marks</span>
            </a>
            <a href="../modules/index.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-book"></i>
              <span>Modules</span>
            </a>
            <a href="../trade/index.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-briefcase"></i>
              <span>Trade</span>
            </a>
            <a href="../trainees/index.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-users"></i>
              <span>Trainees</span>
            </a>
            <a href="select_user.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-user-cog"></i>
              <span>Users</span>
            </a>
            <a href="report.php" class="flex items-center space-x-1 text-gray-900 hover:text-blue-600 font-medium">
              <i class="fas fa-file-alt"></i>
              <span>Report</span>
            </a>
          </div>
        </div>

        <div class="flex items-center space-x-4">
          <span class="hidden sm:block text-gray-700 font-semibold">
            Welcome, <?php echo htmlspecialchars($username); ?>
          </span>
          <form action="logout.php" method="post">
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white font-semibold">
              Logout
            </button>
          </form>

          <!-- Mobile menu button -->
          <div class="sm:hidden">
            <button
              onclick="toggleMenu()"
              class="bg-white p-2 rounded-md text-gray-400 hover:text-gray-500"
            >
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="sm:hidden hidden bg-white bg-opacity-90">
      <div class="pt-2 pb-3 space-y-1 px-4">
        <a href="index.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-marker"></i>
          <span>Marks</span>
        </a>
        <a href="../modules/index.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-book"></i>
          <span>Modules</span>
        </a>
        <a href="../trade/index.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-briefcase"></i>
          <span>Trade</span>
        </a>
        <a href="../trainees/index.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-users"></i>
          <span>Trainees</span>
        </a>
        <a href="select_user.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-user-cog"></i>
          <span>Users</span>
        </a>
        <a href="report.php" class="flex items-center space-x-2 text-gray-700 hover:bg-blue-100 rounded px-3 py-2 font-medium">
          <i class="fas fa-file-alt"></i>
          <span>Report</span>
        </a>
        <form action="logout.php" method="post" class="mt-3">
          <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-3 py-2 rounded text-white font-semibold">
            Logout
          </button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <main class="max-w-4xl mx-auto mt-20 px-6 text-center">
    <h1 class="text-5xl font-extrabold mb-4">
      Welcome, <?php echo htmlspecialchars($username); ?>!
    </h1>
    <p class="text-xl text-gray-200 mb-10">
      Glad to see you at GIKONKO Technical Secondary School.
    </p>
  </main>
</body>
</html>
