<div class="h-screen flex overflow-hidden bg-gray-100">
    <!-- Sidebar -->
    <div class="bg-gray-800 shadow-xl">
        <!-- Sidebar Content -->
        <div class="flex flex-col h-screen">
            <!-- Sidebar Header -->
            <div class="bg-gray-900 p-4">
                <h1 class="text-white text-2xl font-semibold">Admin Panel</h1>
            </div>
            <!-- Sidebar Links -->
            <nav class="flex-1 bg-gray-800 overflow-y-auto">
                <ul class="p-2">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-300 hover:bg-gray-700 rounded-md px-4 py-2 flex items-center">
                            <i class="fa-solid fa-chart-line pr-3 "></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="relative inline-block text-left">
                            <button id="dropdown-button"
                                class="bg-inherit  hover:bg-gray-700 text-gray-300  py-2 px-4 rounded-md flex items-center">
                                <span>
                                    <i class="fa-solid fa-chevron-down pr-2"></i>
                                    Users
                                </span>
                            </button>
                            <div id="dropdown-menu"
                                class="hidden absolute z-50 mt-2 w-32 py-2 bg-white border border-gray-300 rounded-lg shadow-lg">
                                <a href="{{ route('student.index') }}"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                                        class="fa-solid fa-graduation-cap mr-2"></i> Student</a>
                                <a href="{{ route('teacher.index') }}"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-200"><i
                                        class="fa-solid fa-chalkboard-user mr-2"></i> Teacher</a>
                            </div>
                        </div>

                    </li>
                    <li>
                        <a href="{{ route('researchMyDepartment') }}"
                            class="text-gray-300 hover:bg-gray-700 rounded-md px-4 py-2 flex items-center">
                            <i class="fa-solid fa-book-open pr-2"></i>
                            Research
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- Sidebar Footer -->
            <div class="bg-gray-900 p-4">
                <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white">Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
