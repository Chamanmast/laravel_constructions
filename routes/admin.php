<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Backend\BlogcategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BlogtagController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ImagePresetsController;
use App\Http\Controllers\Backend\MegaMenuController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenugroupController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

// Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Admin Dashboard All Routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'AdminDashboard')->name('admin.dashboard');
        // Admin User All Route
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/user/ajax_load', 'Ajax_Load')->name('users.ajax_load');
        Route::get('/all/users', 'AllUsers')->name('all.users');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::put('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::post('/delete/admin', 'DeleteAdmin')->name('delete.admin');
    });
    // Menu All Routes
    Route::resource('menugroup', MenugroupController::class)->middleware('can:menugroup.index, menugroup.create, menugroup.update');
    Route::post('/menugroup/delete', [MenugroupController::class, 'Delete'])->middleware('can:menugroup.delete')->name('menugroup.delete');
    // Menu All Routes
    Route::resource('menus', MenuController::class)->middleware('can:menus.index, menus.create, menus.update');
    Route::post('/menus/status', [MenuController::class, 'StatusUpdate'])->middleware('can:menus.status')->name('menus.status');
    Route::post('/menus/delete', [MenuController::class, 'Delete'])->middleware('can:menus.delete')->name('menus.delete');

    // Mega Menu All Routes
    Route::resource('megamenu', MegaMenuController::class)->middleware('can:megamenu.index, megamenu.create, megamenu.update');
    Route::post('/megamenu/status', [MegaMenuController::class, 'StatusUpdate'])->middleware('can:megamenu.status')->name('megamenu.status');
    Route::post('/megamenu/delete', [MegaMenuController::class, 'Delete'])->middleware('can:megamenu.delete')->name('megamenu.delete');

    // Pages All Routes
    Route::resource('pages', PageController::class)->middleware('can:pages.index, pages.create, pages.update');
    Route::post('/pages/status', [PageController::class, 'StatusUpdate'])->middleware('can:pages.status')->name('pages.status');
    Route::post('/pages/delete', [PageController::class, 'DeletewithImage'])->middleware('can:pages.delete')->name('pages.delete');

    // Module All Routes
    Route::resource('modules', ModuleController::class)->middleware('can:module.index, module.create, module.update');
    Route::post('/modules/status', [ModuleController::class, 'StatusUpdate'])->middleware('can:module.status')->name('modules.status');
    Route::post('/modules/delete', [ModuleController::class, 'DeletewithImage'])->middleware('can:module.delete')->name('modules.delete');

    // Blog All Routes
    Route::resource('blog', BlogController::class)->middleware('can:blog.index, blog.create, blog.update');
    Route::post('/blog/status', [BlogController::class, 'StatusUpdate'])->middleware('can:blog.index')->name('blog.status');
    Route::post('/blog/delete', [BlogController::class, 'BlogDelete'])->middleware('can:blog.delete')->name('blog.delete');

    // Blog Categories All Routes
    Route::resource('post/blogcategory', BlogcategoryController::class)->middleware('can:blogcategory.index, blogcategory.create, blogcategory.update');
    Route::post('post/blogcategory/delete', [BlogcategoryController::class, 'Delete'])->middleware('can:blogcategory.delete')->name('blogcategory.delete');
    Route::resource('post/tag', BlogtagController::class)->middleware('can:tag.index, tag.create, tag.update');
    Route::post('post/tag/delete', [BlogtagController::class, 'Delete'])->middleware('can:tag.delete')->name('tag.delete');

    // Image Preset All Routes
    Route::resource('image_preset', ImagePresetsController::class)->middleware('can:image_preset.index, image_preset.create, image_preset.update');
    Route::post('/image_preset/status', [ImagePresetsController::class, 'StatusUpdate'])->middleware('can:image_preset.status')->name('image_preset.status');
    Route::post('/image_preset/delete', [ImagePresetsController::class, 'Delete'])->middleware('can:image_preset.delete')->name('image_preset.delete');

    // Slider All Routes
    Route::resource('slider', SliderController::class)->middleware('can:slider.index, slider.create, slider.update');
    Route::post('/slider/status', [SliderController::class, 'StatusUpdate'])->middleware('can:slider.status')->name('slider.status');
    Route::post('/slider/delete', [SliderController::class, 'DeletewithImage'])->middleware('can:slider.delete')->name('slider.delete');

    // Category All Routes
    Route::resource('category', CategoryController::class)->middleware('can:category.index, category.create, category.update');
    Route::post('/category/status', [CategoryController::class, 'StatusUpdate'])->middleware('can:category.status')->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'Delete'])->middleware('can:category.delete')->name('category.delete');

    // SMTP and Site Setting  All Route
    Route::controller(SettingController::class)->group(function () {
        Route::get('/site/setting', 'SiteSetting')->middleware('can:site.setting')->name('site.setting');
        Route::patch('/update/site/setting/{id}', 'UpdateSiteSetting')->name('update.site.setting');
        Route::get('/smtp/setting', 'SmtpSetting')->middleware('can:smtp.setting')->name('smtp.setting');
        Route::patch('/update/smpt/setting/{id}', 'UpdateSmtpSetting')->name('update.smpt.setting');
    });
    // Permission All Route
    Route::resource('permission', RoleController::class)->middleware('can:permission.index, permission.create, permission.update');
    Route::post('/permission/delete', [RoleController::class, 'Delete'])->middleware('permission.delete')->name('permission.delete');

    Route::resource('roles', UserRoleController::class)->middleware('can:role.index, role.create, role.update');
    Route::post('/roles/delete', [UserRoleController::class, 'Delete'])->middleware('can:role.delete')->name('roles.delete');

    Route::controller(RoleController::class)->group(function () {
        Route::get('/import/permission/ajax_load', 'Ajax_Data')->name('permission.ajax_load');
        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::patch('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::post('/admin/delete', 'AdminDeleteRoles')->name('admin.delete.roles');
    });
    Route::controller(UserController::class)->group(function () {
        // User All Routes
        Route::get('/users', 'AllUsers')->name('admin.users');
        Route::get('/users/add', 'UserAdd')->name('admin.user_add');
        Route::post('/users/store', 'UserStore')->name('admin.user_store');
        Route::get('/users/edit/{id}', 'UserEdit')->name('admin.user_edit');
        Route::put('/users/update', 'UserUpdate')->name('admin.user_update');
        Route::put('/users/status', 'UserStatusUpdate')->name('admin.user_status');
        Route::delete('/users/delete/{id}', 'UserDelete')->name('admin.user_delete');
    });
});

// Admin Group Middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
// End Group Admin Middleware
