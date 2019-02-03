<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">

                <p>Меню</p>
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="/personal"><i class="fa fa-credit-card"></i> <span>Переглянути мої рахунки</span></a></li>
                    <li><a href="/personal/create"><i class="fa fa-hand-o-right"></i> <span>Провести розрахунок</span></a></li>
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