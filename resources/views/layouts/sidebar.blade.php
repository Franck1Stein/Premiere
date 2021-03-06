<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">

            <router-link :to="{ name: 'Dashboard' }" class="nav-link" active-class="active" exact>
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                    Dashboard
                </p>
            </router-link>

        </li>

        <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog green"></i>
                <p>
                    Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <router-link :to="{ name: 'Users' }" class="nav-link" exact>
                        <i class="fas fa-users nav-icon"></i>
                        <p>Users</p>
                    </router-link>
                </li>

            </ul>

        </li>

        <li class="nav-item">

            <router-link :to="{ name: 'Developer' }" tag="a" class="nav-link" active-class="active" exact>
                <i class="nav-icon fas fa-cogs profile orange"></i>
                <p>Developer</p>
            </router-link>

            <router-link :to="{ name: 'Profile' }" tag="a" class="nav-link" active-class="active" exact>
                <i class="nav-icon fas fa-user profile orange"></i>
                <p>Profile</p>
            </router-link>

        </li>

        <li class="nav-item">

            <div class="nav-link" aria-labelledby="navbarDropdown">

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off red"></i>
                    <p> {{ __('logout') }} </p>

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>

            </div>

        </li>

    </ul>
</nav>
