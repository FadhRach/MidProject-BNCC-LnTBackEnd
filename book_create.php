<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }

    include "backend/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management | LNT BackEnd</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen w-full bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <!-- Navbar -->
        <header class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-3 md:rounded-3xl lg:max-w-screen-xl">
            <div class="px-4">
                <div class="flex items-center justify-between">
                    <div class="flex shrink-0">
                        <a aria-current="page" class="flex items-center" href="dashboard.php">
                            <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                            </svg>                              
                            <p class="text-black font-semibold ml-1">Book</p>
                        </a>
                    </div>

                    <div class="hidden md:flex md:items-center md:gap-5">
                        <a href="dashboard.php" class="text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-500 px-2 py-1 rounded-lg">Main menu</a>
                        <a href="book_create.php" class="text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-500 px-2 py-1 rounded-lg">Create book list</a>
                    </div>

                    <div class="flex items-center gap-3">
                        <button id="mobileMenuButton" class="md:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>

                        <button id="userMenuButton" class="flex items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:shadow  cursor-pointer">
                            <?php echo $_SESSION['user']['username'] ?>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden absolute inset-x-0 top-full bg-white border-b border-gray-100 shadow-md transition-all duration-300 ease-out">
                <div class="px-4 py-2">
                    <a href="dashboard.php" class="block py-2 px-2 text-sm text-gray-900 hover:bg-gray-100 rounded-lg">Main menu</a>
                    <a href="book_create.php" class="block py-2 px-2 text-sm text-gray-900 hover:bg-gray-100 rounded-lg">Create book list</a>
                </div>
            </div>

            <!-- User Dropdown Menu -->
            <div id="userDropdown" class="hidden absolute right-2 mr-3 transition-all duration-300 ease-out">
                <div class="py-1">
                    <a href="backend/logout.php" class="block rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">Logout</a>
                </div>
            </div>
        </header>

        

        <!-- FORM VIEW -->
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-screen-xl bg-white p-10 rounded-xl">
                <form method="post" action="backend/createbook.php" enctype="multipart/form-data">
                    <div class="font-bold text-lg text-center mb-5">
                        Create Book
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-black">
                            Book Name
                        </label>
                        <input type="text" name="name" id="name" placeholder="Book Name" required 
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="author" class="mb-3 block text-base font-medium text-black">
                            Author
                        </label>
                        <input type="text" name="author" id="author" placeholder="Author" required
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="publisher" class="mb-3 block text-base font-medium text-black">
                            Publisher
                        </label>
                        <input type="text" name="publisher" id="publisher" placeholder="Publisher" required
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="number_of_page" class="mb-3 block text-base font-medium text-black">
                                    Page
                                </label>
                                <input type="text" name="number_of_page" id="number_of_page" placeholder="Enter number of page" required
                                    class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                <input type="text" name="id_user" id="id_user" value="<?php echo $_SESSION['user']['id'] ?>" class="hidden">
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="image" class="mb-3 block text-base font-medium text-black">
                                    Image
                                </label>
                                <input type="file" name="image" id="image" required
                                    class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-center mt-5">
                        <button type="submit" 
                            class="hover:shadow-form w-80 rounded-md bg-blue-500 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const userMenuButton = document.getElementById('userMenuButton');
        const userDropdown = document.getElementById('userDropdown');

        mobileMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            mobileMenu.classList.toggle('hidden');
            userDropdown.classList.add('hidden');
        });
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
            mobileMenu.classList.add('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
            if (!userDropdown.contains(e.target) && !userMenuButton.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>