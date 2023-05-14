<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="adminhome.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-bed" aria-hidden="true"></i></i></div>
                                Hotel Room
                            </a>

                            <a class="nav-link" href="addroom.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus-circle" aria-hidden="true"></i></i></div>
                                Add Room
                            </a>

                            <a class="nav-link" href="categorylist.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-folder" aria-hidden="true"></i></i></div>
                                Categories
                            </a>
                            
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="register.php">Register</a>
                                    <a class="nav-link" href="adminlist.php">Web Admin List</a>
                                    <a class="nav-link" href="guestlist.php">Guest User List</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa fa-address-book" aria-hidden="true"></i></i></div>
                                Booking Appointment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <a class="nav-link" href="bookingroom.php">Booking</a>
                                    <a class="nav-link" href="approvedbooking.php">Approved Bookings </a>
                                    <a class="nav-link" href="checkoutroom.php">Checkout Room </a>
                                    <a class="nav-link" href="recordroombookings.php">Record RoomBookings</a>   
                                </nav>
                            </div>
                        

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                                <div class="sb-nav-link-icon"><i class="fa fa-cutlery" aria-hidden="true"></i></i></div>
                                Foods
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages1" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages1">
                                    
                                    <a class="nav-link" href="addfood.php">Add Food</a>
                                    <a class="nav-link" href="adminfoodlists.php">List of Food</a>   
                                </nav>
                            </div>
                            

                            <a class="nav-link" href="reviewedroom.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-comment" aria-hidden="true"></i></i></div>
                                Reviews
                            </a>


                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Web Admin
                    </div>
                </nav>
            </div>