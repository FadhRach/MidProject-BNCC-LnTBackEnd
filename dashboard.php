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
        <header class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-3 md:rounded-3xl lg:max-w-screen-xl">
            <div class="px-4">
                <div class="flex items-center justify-between">
                    <div class="flex shrink-0">
                        <a aria-current="page" class="flex items-center" href="/">
                            <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                            </svg>                              
                            <p class="text-black font-semibold ml-1">Book</p>
                        </a>
                    </div>

                    <div class="hidden md:flex md:items-center md:gap-5">
                        <a href="#" class="text-sm font-medium text-gray-900 hover:bg-gray-100 px-2 py-1 rounded-lg">Main menu</a>
                        <a href="#" class="text-sm font-medium text-gray-900 hover:bg-gray-100 px-2 py-1 rounded-lg">Create book list</a>
                    </div>

                    <div class="flex items-center gap-3">
                        <button id="mobileMenuButton" class="md:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>

                        <button id="userMenuButton" class="flex items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            User
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden absolute inset-x-0 top-full bg-white border-b border-gray-100 shadow-md transition-all duration-300 ease-out">
                <div class="px-4 py-2">
                    <a href="#" class="block py-2 px-2 text-sm text-gray-900 hover:bg-gray-100 rounded-lg">Main menu</a>
                    <a href="#" class="block py-2 px-2 text-sm text-gray-900 hover:bg-gray-100 rounded-lg">Create book list</a>
                </div>
            </div>

            <!-- User Dropdown Menu -->
            <div id="userDropdown" class="hidden absolute right-2 mr-3 transition-all duration-300 ease-out">
                <div class="py-1">
                    <a href="#" class="block rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">Logout</a>
                </div>
            </div>
        </header>

        <div class="max-w-screen-xl text-center p-10 bg-white shadow-md rounded-xl justify-center items-center">
            <h1 class="font-bold text-4xl mb-4">Book Management</h1>
            <h1 class="text-lg">Mid Project LnT Back End</h1>
        </div>

        <section class="max-w-screen-xl mx-auto grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-10 gap-x-10 mt-10 mb-5">

            <!-- card -->
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="#">
                    <img src="image/pyschologyofmoney.jpg"
                        alt="Product" class="h-60 w-72 object-cover rounded-t-xl" />
                    <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 text-xs">author</span>
                        <p class="text-xl font-bold text-black truncate block capitalize">Book Name</p>
                        <p class="text-sm text-black">published</p>
                        <div class="flex items-center">
                            <p class="text-md my-3">149 Page</p>
                            <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg></div>
                        </div>
                    </div>
                </a>
            </div>
        </section>

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