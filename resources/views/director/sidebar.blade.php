<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">

            <p>Меню</p>
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="/allpersonal"><i class="fa fa-users"></i> <span>Персонал</span></a></li>
                <li><a href="/addUser"><i class="fa fa-user-plus"></i> <span>Додати користувача</span></a></li>
                <li><a href="/settings"><i class="fa fa-bar-chart"></i> <span>Налаштування</span></a></li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-unlock"></i>
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </section>
</aside>