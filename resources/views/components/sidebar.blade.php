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
                        <div
                            class="text-gray-300 hover:bg-gray-700 rounded-md px-4 cursor-pointer py-2 flex items-center">
                            <i class="fa-solid fa-chalkboard-user  pr-3"></i>Users
                            <select id="roleSelect"
                                class="block cursor-pointer mt-1  border-none focus:border-gray-800 border-inherit text-gray-400 focus:border-inherit bg-inherit rounded-md shadow-sm">
                                <option class="bg-gray-800 text-white font-bold" hidden selected
                                    value=""></option>
                                <option class="bg-gray-800 text-white font-bold text-md "
                                    value="{{ route('student.index') }}">Student</option>
                                <option class="bg-gray-800 text-white font-bold text-md "
                                    value="{{ route('teacher.index') }}">Teacher</option>

                            </select>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('researchMyDepartment')}}"
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
