# build mulit authentication using Spatie roles and permissions
## The main idea of Role-Based Access Control (RBAC) in the context of multi-authentication in Laravel is to manage access to resources and actions within an application based on the roles assigned to users.
## How to implement (RBAC)??????
### USING GUARDS
### GATES AND POLICIES
### USING ROLE-BASED ACCESS CONTROL (RBAC) BACKAGES
#### 1.	LARAVEL RBAC PACKAGE BY ITSTRUCTURE
#### 2.	BOUNCER
#### 3.	WNIKK LARAVEL ACCESS RULES
#### 4.	LARAVEL SPATIE BACKAGE ROLES AND PERMISSIONS
#### 5.	USING CUSTOM MIDDLEWARE
in this repo i will solve the mullti auth using 
USING SPATIE :)



## Appendix
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','role:superadmin|admin']],function(){
Route::resource('permission',PermissionController::class);
Route::resource('role',RoleController::class);
Route::get('role/{roleidalolaaa}/add/permission',[Rolecontroller::class,'addpermission'])
->name("role.addpermission");
Route::put('role/{roleid}/add/permission',[Rolecontroller::class,'updatepermission'])
->name("role.givepermission");
Route::resource('users',UserController::class);
});
![alt text](https://as1.ftcdn.net/v2/jpg/05/47/33/06/1000_F_547330682_ZIaIyw71gtdxlxZ9N2UyTAHHCrlEgj9c.jpg)