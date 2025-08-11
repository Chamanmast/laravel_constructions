 <div class="sidebar-wrapper sidebar-theme">

     <nav id="sidebar">

         <div class="navbar-nav theme-brand flex-row  text-center">
             <div class="nav-logo">
                 <div class="nav-item theme-logos">
                     <a href="{{ route('admin.dashboard') }}">
                         <img src="{{ asset(App\Models\SiteSetting::select('favicon')->find(1)->favicon) }}"
                             alt="logo">
                     </a>
                 </div>
                 <div class="nav-item theme-text">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link"> Admin Panel</a>
                 </div>
             </div>
             <div class="nav-item sidebar-toggle">
                 <div class="btn-toggle sidebarCollapse">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevrons-left">
                         <polyline points="11 17 6 12 11 7"></polyline>
                         <polyline points="18 17 13 12 18 7"></polyline>
                     </svg>
                 </div>
             </div>
         </div>
         <div class="shadow-bottom"></div>
         <ul class="list-unstyled menu-categories" id="accordionExample">
             <li class="menu active">
                 <a href="{{ route('admin.dashboard') }}" aria-expanded="{{ is_active_route('admin/dashboard') }}"
                     class="dropdown-toggle">
                     <div class="">
                         <i data-feather="home"></i>
                         <span>Dashboard</span>
                     </div>
                     {{-- <div>
                         <i data-feather="chevron-right"></i>
                     </div> --}}
                 </a>

             </li>


             <li class="menu menu-heading">
                 <div class="heading">

                     <i data-feather="minus"></i>
                     <span>APPLICATIONS</span>
                 </div>
             </li>


             <x-backend.backend_component.side-menu-item permission="menus.menu" routeId="menus" icon="menu"
                 label="Menu" :submenu="[
                     ['route' => 'menus.create', 'label' => 'Add Menus', 'permission' => 'menus.create'],
                     ['route' => 'menus.index', 'label' => 'Show Menus', 'permission' => 'menus.index'],
                     ['route' => 'menugroup.create', 'label' => 'Add Menu Group', 'permission' => 'menugroup.create'],
                     ['route' => 'menugroup.index', 'label' => 'Show Menu Group', 'permission' => 'menugroup.index'],

                     ['route' => 'megamenu.create', 'label' => 'Add Menu Group', 'permission' => 'megamenu.create'],
                     ['route' => 'megamenu.index', 'label' => 'Show Menu Group', 'permission' => 'megamenu.index'],
                 ]" :activeRoutes="['admin/menus', 'admin/menugroup', 'admin/megamenu']" />

             <x-backend.backend_component.side-menu-item permission="pages.menu" routeId="pages" icon="menu"
                 label="CMS Pages" :submenu="[
                     ['route' => 'pages.create', 'label' => 'Add Pages', 'permission' => 'pages.create'],
                     ['route' => 'pages.index', 'label' => 'Show Pages', 'permission' => 'pages.index'],
                 ]" :activeRoutes="['admin/pages']" />





             <x-backend.backend_component.side-menu-item permission="image_preset.menu" routeId="image" icon="menu"
                 label="Image Preset" :submenu="[
                     [
                         'route' => 'image_preset.create',
                         'label' => 'Add Image Preset',
                         'permission' => 'image_preset.create',
                     ],
                     [
                         'route' => 'image_preset.index',
                         'label' => 'Show Image Preset',
                         'permission' => 'image_preset.index',
                     ],
                 ]" :activeRoutes="['admin/image_preset']" />

             <x-backend.backend_component.side-menu-item permission="module.menu" routeId="module" icon="menu"
                 label="Module" :submenu="[
                     ['route' => 'modules.create', 'label' => 'Add Module', 'permission' => 'module.create'],
                     ['route' => 'modules.index', 'label' => 'Show Module', 'permission' => 'module.index'],
                 ]" :activeRoutes="['admin/module']" />

              <x-backend.backend_component.side-menu-item permission="slider.menu" routeId="slider" icon="menu"
                 label="Slider" :submenu="[
                     ['route' => 'slider.create', 'label' => 'Add Slider', 'permission' => 'slider.create'],
                     ['route' => 'slider.index', 'label' => 'Show Slider', 'permission' => 'slider.index'],
                 ]" :activeRoutes="['admin/slider']" />


             <x-backend.backend_component.side-menu-item permission="category.menu" routeId="category" icon="menu"
                 label="Product" :submenu="[
                     ['route' => 'category.create', 'label' => 'Add Category', 'permission' => 'category.create'],
                     ['route' => 'category.index', 'label' => 'Show Category', 'permission' => 'category.index'],
                 ]" :activeRoutes="['admin/category']" />
             <x-backend.backend_component.side-menu-item permission="blog.menu" routeId="blog" icon="menu"
                 label="Blog" :submenu="[
                     ['route' => 'blog.create', 'label' => 'Add Blog', 'permission' => 'blog.create'],
                     ['route' => 'blog.index', 'label' => 'Show Blog', 'permission' => 'blog.index'],
                     [
                         'route' => 'blogcategory.create',
                         'label' => 'Add Blog Category',
                         'permission' => 'blogcategory.create',
                     ],
                     [
                         'route' => 'blogcategory.index',
                         'label' => 'Show Blog Category',
                         'permission' => 'blogcategory.index',
                     ],
                     ['route' => 'tag.create', 'label' => 'Add Blog Tag', 'permission' => 'tag.create'],
                     ['route' => 'tag.index', 'label' => 'Show Blog Tag', 'permission' => 'tag.index'],
                 ]" :activeRoutes="['admin/blog', 'admin/post']" />



             <x-backend.backend_component.side-menu-item permission="role.menu" routeId="roles" icon="menu"
                 label="Role & Permission" :submenu="[
                     ['route' => 'permission.index', 'label' => 'All Permission', 'permission' => 'permission.index'],
                     ['route' => 'roles.index', 'label' => 'All Roles', 'permission' => 'role.index'],
                     [
                         'route' => 'add.roles.permission',
                         'label' => 'Role in Permission',
                         'permission' => 'add.roles.permission',
                     ],
                     [
                         'route' => 'all.roles.permission',
                         'label' => 'All Role in Permission',
                         'permission' => 'all.roles.permission',
                     ],
                 ]" :activeRoutes="['admin/roles', 'admin/permission', 'admin/add/roles/permission']" :expandedRoutes="['admin/roles', 'admin/permission', 'admin/add/roles/permission']" />

             <x-backend.backend_component.side-menu-item permission="admin.menu" routeId="admin" icon="menu"
                 label="Manage Users" :submenu="[
                     ['route' => 'add.admin', 'label' => 'Add User', 'permission' => 'add.admin'],
                     ['route' => 'all.admin', 'label' => 'Show Admin Users', 'permission' => 'all.admin'],
                     //  ['route' => 'all.users', 'label' => 'Show Users', 'permission' => 'all.users'],
                 ]" :activeRoutes="['admin/add/admin', 'admin/all/admin', 'admin/users']" :expandedRoutes="['admin/add/admin']" />

             <x-backend.backend_component.side-menu-item permission="smtp.menu" routeId="smtp.setting" icon="send"
                 label="SMTP Settings" :submenu="[]" :activeRoutes="[]" :expandedRoutes="[]" />
             <x-backend.backend_component.side-menu-item permission="site.menu" routeId="site.setting"
                 icon="settings" label="Settings" :submenu="[]" :activeRoutes="[]" :expandedRoutes="[]" />


         </ul>

     </nav>

 </div>
