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
        <?php include "component/header.php"; ?>

        

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
                            Create Book
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