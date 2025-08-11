<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Insert roles
        $roles = [
            ['id' => 1, 'name' => 'SuperAdmin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Editor', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insert($roles);

        // Insert permissions
        $permissions = [
            ['name' => 'smtp.menu', 'guard_name' => 'web', 'group_name' => 'smtp', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'smtp.setting', 'guard_name' => 'web', 'group_name' => 'smtp', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'site.menu', 'guard_name' => 'web', 'group_name' => 'site', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'site.setting', 'guard_name' => 'web', 'group_name' => 'site', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role.menu', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role.index', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role.create', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role.edit', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'role.delete', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission.index', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission.create', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission.edit', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'permission.delete', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'add.roles.permission', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'all.roles.permission', 'guard_name' => 'web', 'group_name' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin.menu', 'guard_name' => 'web', 'group_name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'all.admin', 'guard_name' => 'web', 'group_name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'add.admin', 'guard_name' => 'web', 'group_name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'all.users', 'guard_name' => 'web', 'group_name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.menu', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.index', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.create', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.edit', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.status', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'image_preset.delete', 'guard_name' => 'web', 'group_name' => 'image_preset', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'module.menu', 'guard_name' => 'web', 'group_name' => 'module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'module.index', 'guard_name' => 'web', 'group_name' => 'module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'module.create', 'guard_name' => 'web', 'group_name' => 'module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'module.delete', 'guard_name' => 'web', 'group_name' => 'module', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.menu', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.create', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.index', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.edit', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.status', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'pages.delete', 'guard_name' => 'web', 'group_name' => 'pages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blog.menu', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blog.index', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blog.create', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blog.edit', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blog.delete', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tag.menu', 'guard_name' => 'web', 'group_name' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tag.index', 'guard_name' => 'web', 'group_name' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tag.create', 'guard_name' => 'web', 'group_name' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tag.edit', 'guard_name' => 'web', 'group_name' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'tag.delete', 'guard_name' => 'web', 'group_name' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.menu', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.index', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.create', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.edit', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.delete', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menus.status', 'guard_name' => 'web', 'group_name' => 'menus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menugroup.menu', 'guard_name' => 'web', 'group_name' => 'menugroup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menugroup.index', 'guard_name' => 'web', 'group_name' => 'menugroup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menugroup.create', 'guard_name' => 'web', 'group_name' => 'menugroup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menugroup.edit', 'guard_name' => 'web', 'group_name' => 'menugroup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'menugroup.delete', 'guard_name' => 'web', 'group_name' => 'menugroup', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.menu', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.create', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.index', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.edit', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.delete', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'blogcategory.status', 'guard_name' => 'web', 'group_name' => 'blogcategory', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category.menu', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category.index', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category.create', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category.edit', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'category.delete', 'guard_name' => 'web', 'group_name' => 'post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'megamenu.index', 'guard_name' => 'web', 'group_name' => 'megamenu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'megamenu.create', 'guard_name' => 'web', 'group_name' => 'megamenu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'megamenu.edit', 'guard_name' => 'web', 'group_name' => 'megamenu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'megamenu.delete', 'guard_name' => 'web', 'group_name' => 'megamenu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'megamenu.status', 'guard_name' => 'web', 'group_name' => 'megamenu', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('permissions')->insert($permissions);

        // Optional: Assign all permissions to SuperAdmin
        $superAdmin = Role::find(1);

        $superAdmin->syncPermissions(Permission::all());
        // Optional: Assign specific permissions to Editor
        $user = User::find(1);
        if ($user) {
            $user->assignRole($superAdmin);
        }
    }
}
