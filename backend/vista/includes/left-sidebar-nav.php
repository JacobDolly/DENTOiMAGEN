<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="vista/images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown-nav" class="dropdown-content">
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">face</i> Profile</a>
                        </li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">settings</i> Settings</a>
                        </li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">live_help</i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">lock_outline</i> Lock</a>
                        </li>
                        <li>
                            <a href="index.php?action=cerrar-sesion" class="grey-text text-darken-1">
                                <i class="material-icons">keyboard_tab</i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo $_SESSION["username"] ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $_SESSION["rol"] ?></p>
                </div>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                    <a href="index.php" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="index.php?action=tratamientos" class="waves-effect waves-cyan">
                        <i class="material-icons">assignment_ind</i>
                        <span class="nav-text">Tratamientos</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="index.php?action=clientes" class="waves-effect waves-cyan">
                        <i class="material-icons">perm_identity</i>
                        <span class="nav-text">Clientes</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="index.php?action=controles" class="waves-effect waves-cyan">
                        <i class="material-icons">event</i>
                        <span class="nav-text">Controles</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="index.php?action=dentistas" class="waves-effect waves-cyan">
                        <i class="material-icons">person</i>
                        <span class="nav-text">Dentistas</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="index.php?action=consultas" class="waves-effect waves-cyan">
                        <i class="material-icons">event_note</i>
                        <span class="nav-text">Consultas</span>
                    </a>
                </li>
                <div class="divider"></div>
                <li class="bold">
                    <a href="index.php?action=consultas-solicitadas" class="waves-effect waves-cyan">
                        <i class="material-icons">assignment</i>
                        <span class="nav-text">Solicitudes de consultas</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
        <i class="material-icons">menu</i>
    </a>
</aside>