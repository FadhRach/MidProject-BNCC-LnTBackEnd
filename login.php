<?php
  session_start();
  include "backend/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management | LNT BackEnd</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
          <div
            class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
          </div>
          <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <?php
              if(isset($_POST['username'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $query = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' and password='$password' ");

                if(mysqli_num_rows($query) > 0){
                  $data = mysqli_fetch_array($query);
                  $_SESSION['user'] = $data;
                  echo '<script>alert("Selamat Datang, '.$data['username'].'"); location.href="dashboard.php";</script>';
                } else {
                  echo '<script>alert("Username/Password tidak sesuai"); location.href="dashboard.php";</script>';
                }
              }
            ?>
            <form action="login.php" method="post">
            <div class="max-w-md mx-auto">
              <div>
                <h1 class="text-2xl font-semibold">Login</h1>
              </div>
              <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                  <div class="relative">
                    <input autocomplete="off" id="username" name="username" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Username" required 
                    oninvalid="this.setCustomValidity('Username harus diisi!')"
                    oninput="this.setCustomValidity('')"/>
                    <label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                  </div>
                  <div class="relative">
                    <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" placeholder="Password" minlength="8" required
                    oninvalid="this.setCustomValidity(this.value.length < 8 ? 'Password harus minimal 8 karakter!' : 'Password harus diisi!')"
                    oninput="this.setCustomValidity('')"/>
                    <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                  </div>
                  <div class="relative">
                    <div class="text-sm">
                        <p>don't have account? <a class="text-sky-600 hover:text-cyan-500" href="register.php">register here</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="w-full flex justify-center">
                <button class="flex items-center bg-white border border-gray-300 rounded-lg shadow-md px-12 py-2 text-sm font-medium text-gray-800 hover:bg-cyan-400 hover:text-white focus:outline-none focus:bg-sky-500 focus:text-white">
                  <span>Login</span>
                </button>
            </div>
            </form>
          </div>
        </div>
      </div>
</body>
</html>