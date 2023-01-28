<section class="side_menu">
        <div class="menu_content">
            <ul>
                <li>
                    <a href="index.php"><i class="fa-solid fa-chart-line"></i><span>Deshboard</span></a>
                </li>
                <li class="mt-3">
                    <a href="#" onclick="busSideMenu('bus_info', '100px')"><i class="fa-solid fa-bus"></i><span>Bus <i class="fa-solid fa-chevron-down"></i></span></a>
                    <div class="bus_info" id="bus_info">
                        <ul>
                            <li><a href="bus_category.php"><i class="fa-solid fa-circle"></i> Bus Category</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Bus Station</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Add New Bus</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mt-3">
                    <a href="#" onclick="busSideMenu('train_info', '100px')"><i class="fa-solid fa-train-subway"></i><span>Train <i class="fa-solid fa-chevron-down"></i></span></a>
                    <div class="bus_info" id="train_info">
                        <ul>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Train Name</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Train Stops</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Add New Train</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mt-3">
                    <a href="#" onclick="busSideMenu('flight_info', '100px')"><i class="fa-solid fa-plane-departure"></i><span>Flight <i class="fa-solid fa-chevron-down"></i></span></a>
                    <div class="bus_info" id="flight_info">
                        <ul>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Flight Name</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Airports</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Add New Flight</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mt-3">
                    <a href="#" onclick="busSideMenu('user_info', '70px')"><i class="fa-solid fa-user"></i><span>Users <i class="fa-solid fa-chevron-down"></i></span></a>
                    <div class="bus_info" id="user_info">
                        <ul>
                            <li><a href=""><i class="fa-solid fa-circle"></i> Add New User</a></li>
                            <li><a href=""><i class="fa-solid fa-circle"></i> View All Users</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mt-3">
                    <a href=""><i class="fa-regular fa-flag"></i><span>Reports</span></a>
                </li>
                <li class="mt-3">
                    <a href=""><i class="fa-brands fa-themeco"></i><span>Theme Options</span></a>
                </li>
                <li class="mt-3 log_out">
                    <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i><span>LogOut</span></a>
                </li>
            </ul>
        </div>
    </section>