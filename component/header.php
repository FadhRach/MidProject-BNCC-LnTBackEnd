<header class="fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white py-3 shadow backdrop-blur-lg md:top-3 md:rounded-3xl lg:max-w-screen-xl">
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

                <button id="userMenuButton" class="flex items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-400 hover:shadow cursor-pointer">
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
