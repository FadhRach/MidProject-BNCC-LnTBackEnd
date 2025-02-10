<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('location:login.php');
    }

    include "backend/koneksi.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($konek, "SELECT * FROM book WHERE id_book = '$id'");
        if(!$result){
            die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)){
            echo "<script>alert('Data tidak ditemukan pada tabel!'); window.location=dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Masukan ID yang ingin di edit!'); window.location=dashboard.php';</script>";
    }

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
                <form method="post" action="backend/editbook.php" enctype="multipart/form-data">
                    <div class="font-bold text-lg text-center mb-5">
                        Edit Book
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-black">
                            Book Name
                        </label>
                        <input type="text" name="name" id="name" placeholder="Book Name" required value="<?php echo $data['name'] ?>"
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="author" class="mb-3 block text-base font-medium text-black">
                            Author
                        </label>
                        <input type="text" name="author" id="author" placeholder="Author" required value="<?php echo $data['author'] ?>"
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="publisher" class="mb-3 block text-base font-medium text-black">
                            Publisher
                        </label>
                        <input type="text" name="publisher" id="publisher" placeholder="Publisher" required value="<?php echo $data['publisher'] ?>"
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="page" class="mb-3 block text-base font-medium text-black">
                            page
                        </label>
                        <input type="text" name="number_of_page" id="page" placeholder="page" required value="<?php echo $data['number_of_page'] ?>"
                            class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <input type="text" name="id_book" id="id_book" value="<?php echo $data['id_book'] ?>" class="hidden">
                    <input type="text" name="id_user" id="id_user" value="<?php echo $_SESSION['user']['id'] ?>" class="hidden">
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="image" class="mb-3 block text-base font-medium text-black">
                                    Image
                                </label>
                                <input type="file" name="image" id="image" value="<?php echo $data['image'] ?>"
                                class="w-full rounded-md border border-gray-200 bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                <p class="text-red-600">"Diamkan jika tidak merubah gambar!"</p>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="number_of_page" class="mb-3 block text-base font-medium text-black">
                                </label>
                                <div class="flex items-center">
                                    <img class="h-100 w-100 rounded-xl" src="image/<?php echo $data['image'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-center mt-5">
                        <button type="submit" 
                            class="hover:shadow-form w-80 rounded-md bg-blue-500 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Edit Book
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