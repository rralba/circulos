<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/propuesta', 'PropuestaController@index')->name('propuesta');

Route::post('/propuesta/getEmployees/','PropuestaController@getEmployees')->name('propuesta.getEmployees');
Route::POST('/propuesta/store','PropuestaController@store')->name('propuesta.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas

Route::middleware(['auth'])->group(function() {
//Rutas de Sistema
//Roles
Route::post('roles/store', 'RoleController@store')->name('roles.store')
->middleware('permission:roles.create');
Route::get('roles', 'RoleController@index')->name('roles.index')
->middleware('permission:roles.index');
Route::get('roles/create', 'RoleController@create')->name('roles.create')
->middleware('permission:roles.create');
Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
->middleware('permission:roles.edit');
Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
->middleware('permission:roles.show');
Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
->middleware('permission:roles.destroy');
Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
->middleware('permission:roles.edit');
//Users
Route::get('users', 'UserController@index')->name('users.index')
->middleware('permission:users.index');
Route::put('users/{user}', 'UserController@update')->name('users.update')
->middleware('permission:users.edit');
Route::get('users/{user}', 'UserController@show')->name('users.show')
->middleware('permission:users.show');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
->middleware('permission:users.destroy');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
->middleware('permission:users.edit');

//Rutas de Proyectos
//Proyects
Route::post('proyects/store', 'ProyectController@store')->name('proyects.store')
->middleware('permission:proyects.create');
Route::get('proyects', 'ProyectController@index')->name('proyects.index')
->middleware('permission:proyects.index');
Route::get('proyects_finished', 'ProyectController@terminado')->name('proyects.finished')
->middleware('permission:proyects.finished');
Route::post('proyects/update', 'ProyectController@update')->name('proyects.update')
->middleware('permission:proyects.edit');
Route::get('proyects/{proyect}', 'ProyectController@show')->name('proyects.show')
->middleware('permission:proyects.show');
Route::get('proyects/{proyect}/rcr', 'ProyectController@rcr')->name('proyects.rcr')
->middleware('permission:proyects.show');
Route::get('proyects/registro/{proyect}', 'ProyectController@registro')->name('proyects.registro')
->middleware('permission:proyects.show');
Route::get('proyects/{proyect}/edit', 'ProyectController@edit')->name('proyects.edit')
->middleware('permission:proyects.edit');
Route::get('proyects/{proyect}/editm', 'ProyectController@editm')->name('proyects.editm')
->middleware('permission:proyects.edit');

//integrantes
Route::post('proyect', 'ProyectController@delete')->name('integrants.delete')
->middleware('permission:integrants.edit');
Route::post('proyects', 'ProyectController@save')->name('integrants.save')
->middleware('permission:integrants.edit');
Route::post('proyects/editinteg', 'ProyectController@add')->name('integrants.store')
->middleware('permission:integrants.create');
Route::post('proyect/beneficio', 'ProyectController@benedit')->name('beneficios.edit')
->middleware('permission:beneficios.edit');
Route::post('proyects/beneficio', 'ProyectController@benupdate')->name('beneficios.update')
->middleware('permission:beneficios.edit');
//beneficios
Route::get('proyects/{proyect}/beneficios', 'ProyectController@beneindex')->name('beneficios.index')
->middleware('permission:beneficios.index');
Route::POST('proyects/beneficios', 'ProyectController@addbenef')->name('beneficios.store')
->middleware('permission:beneficios.create');
Route::get('beneficios/{beneficio}', 'BeneficioController@show')->name('beneficios.show')
->middleware('permission:beneficios.show');
Route::post('proyectss', 'ProyectController@benefdestroy')->name('beneficios.destroy')
->middleware('permission:beneficios.destroy');
//cancelados
Route::get('cancelados', 'ProyectController@cancelados')->name('cancelados.index')
->middleware('permission:cancelados.index');
Route::get('cancelados/{cancelado}', 'CanceladoController@show')->name('cancelados.show')
->middleware('permission:cancelados.show');
Route::get('master', 'ProyectController@master')->name('cancelados.edit')
->middleware('permission:cancelados.edit');
//empleados
Route::get('empleados/create', 'EmpleadoController@create')->name('empleados.create')
->middleware('permission:empleados.create');
Route::get('empleados/{empleado}', 'EmpleadoController@show')->name('empleados.show')
->middleware('permission:empleados.show');
//reconocimientos
Route::get('proyects/{proyect}/reconocimientos', 'ProyectController@recoindex')->name('reconocimientos.index')
->middleware('permission:reconocimientos.index');
Route::get('reconocimientos/{fol}', 'ProyectController@printpago')->name('reconocimientos.printpago')
->middleware('permission:reconocimientos.index');
Route::post('proyects/reconocimientos', 'ProyectController@recupdate')->name('reconocimientos.update')
->middleware('permission:reconocimientos.edit');
//proceso
Route::get('proyects-proceso', 'ProyectController@procesosindex')->name('procesos.index')
->middleware('permission:procesos.index');
Route::post('proyects-procesob', 'ProyectController@procesosindexbenef')->name('procesos.indexb')
->middleware('permission:procesos.index');
Route::post('proyects-procesos', 'ProyectController@procesosdest')->name('procesos.destroy')
->middleware('permission:procesos.destroy');
Route::post('proyects-process', 'ProyectController@procesospago')->name('procesos.create')
->middleware('permission:procesos.create');
Route::post('proyects-save', 'ProyectController@procesosave')->name('procesos.store')
->middleware('permission:procesos.create');
Route::post('proyects-procesoprint', 'ProyectController@procesosprint')->name('procesos.print')
->middleware('permission:procesos.index');
//descuentos
Route::post('proyects/{proyect}/beneficios/descuentos', 'ProyectController@desceuntoscrear')->name('descuentos.create')
->middleware('permission:descuentos.create');
Route::post('proyects/{proyect}/beneficios/descuento', 'ProyectController@descuentostore')->name('descuentos.edit')
->middleware('permission:descuentos.edit');

//Rutas de Mejoras Rapidas
//mejoras rapidas
Route::get('mejorarapida', 'MejorasrapidasController@index')->name('mr.index')
->middleware('permission:mr.index');
Route::get('mejorarapida/finished', 'MejorasrapidasController@terminadas')->name('mr.finished')
->middleware('permission:mr.finished');
Route::get('mejorarapida/pagadas', 'MejorasrapidasController@pagadas')->name('mrprocesos.index')
->middleware('permission:mr.index');
Route::get('mejorarapida/canceladas', 'MejorasrapidasController@canceladas')->name('mr.destroy')
->middleware('permission:mr.destroy');
Route::get('mejorarapidas/procesopago', 'MejorasrapidasController@procesopago')->name('mrprocesos.create')
->middleware('permission:mrprocesos.create');
Route::get('mejorarapidas/ejecutarpago', 'MejorasrapidasController@ejecutarpago')->name('mejoras.procesopago')
->middleware('permission:mrprocesos.create');
Route::get('mejorarapidas/pago/{gpgo}', 'MejorasrapidasController@mr')->name('mejoras.mrpago')
->middleware('permission:mrprocesos.create');
Route::post('mejorarapidas/reporte/', 'MejorasrapidasController@mreport')->name('mejoras.report')
->middleware('permission:mrprocesos.create');
Route::POST('mejorarapidas', 'MejorasrapidasController@store')->name('mr.store')
->middleware('permission:mr.create');
Route::get('mejorarapida/create', 'MejorasrapidasController@create')->name('mr.create')
->middleware('permission:mr.create');
Route::get('mejorarapidas/print/{mejora}', 'MejorasrapidasController@print')->name('mejoras.print')
->middleware('permission:mr.index');
Route::get('mejorarapidas/printreco/{mejora}', 'MejorasrapidasController@printreco')->name('mejoras.printreco')
->middleware('permission:mr.index');
Route::get('mejorarapidas/edit/{mejora}', 'MejorasrapidasController@edit')->name('mejoras.edit')
->middleware('permission:mr.edit');
Route::get('mejorarapidas/validar/{mejora}', 'MejorasrapidasController@validar')->name('mejoras.validar')
->middleware('permission:mr.edit');
Route::get('mejorarapidas/evaluar/{mejora}', 'MejorasrapidasController@evaluar')->name('mejoras.evaluar')
->middleware('permission:mr.edit');
Route::get('mejorarapidas/aterm/{mejora}', 'MejorasrapidasController@aterm')->name('mejoras.aterm')
->middleware('permission:mr.edit');
Route::get('mejorarapidas/update', 'MejorasrapidasController@update')->name('mejoras.update')
->middleware('permission:mr.edit');
Route::post('mejorarapidas/eval', 'MejorasrapidasController@eval')->name('mr.evaluar')
->middleware('permission:mr.edit');

//Propuestas
Route::get('propuestas/index1', 'PropuestaController@list1')->name('propuesta1.index')
->middleware('permission:propuestas.edit');
Route::get('propuestas/index2', 'PropuestaController@list2')->name('propuesta2.index')
->middleware('permission:propuestas.edit');
Route::get('propuestas/index3', 'PropuestaController@list3')->name('propuesta3.index')
->middleware('permission:propuestas.index');
Route::get('propuestas/index4', 'PropuestaController@list4')->name('propuesta4.index')
->middleware('permission:propuestas.index');
Route::get('propuestas/update/{propuesta}', 'PropuestaController@update')->name('propuesta.update')
->middleware('permission:propuestas.update');
Route::post('propuestas/edit', 'PropuestaController@edit')->name('propuesta.edit')
->middleware('permission:propuestas.update');
Route::get('propuestas/validate/{propuesta}', 'PropuestaController@validat')->name('propuesta.validate')
->middleware('permission:propuestas.update');
Route::post('propuestas/accept', 'MejorasrapidasController@accept')->name('propuesta.accept')
->middleware('permission:propuestas.update');
Route::get('propuestas/resumen/{propuesta}', 'PropuestaController@resumen')->name('propuesta.resumen')
->middleware('permission:propuestas.edit');

//reportes
Route::get('reportes/index', 'ReportController@index')->name('reportes.index')
->middleware('permission:proyects.export');
Route::get('reportes/semanal', 'ReportController@semanal')->name('reportes.semanal')
->middleware('permission:proyects.export');
Route::post('reportes/data', 'ReportController@data')->name('reportes.data')
->middleware('permission:proyects.export');
Route::post('proyects-activos-excel', 'ReportController@proyectexcel')->name('reportes.proyectexcel')
->middleware('permission:proyects.export');
Route::post('mejoras-activos-excel', 'ReportController@mejorasexcel')->name('reportes.mejorasexcel')
->middleware('permission:proyects.export');


//mantenimiento y actualizaciones

Route::get('/mantenimiento', function () {
    return view('mantenimiento');
});
// borrar caché de la aplicación
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return redirect()->back()->with('info', 'Application cache cleared');
})->name('cache');

 // borrar caché de ruta
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:clear');
    return redirect()->back()->with('info', 'Routes cache cleared');
})->name('routes');

// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:clear');
    return redirect()->back()->with('info', 'Config cache cleared');
})->name('config'); 

// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return redirect()->back()->with('info', 'View cache cleared');
})->name('view');
});