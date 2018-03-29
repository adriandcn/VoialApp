<?php
//pruebas
Route::get('/test', ['as' => 'publico', 'uses' => 'pruebasCtrl@test']);
//Lenguaje
Route::get('language', 'HomeController@language');
//Login
Route::get('auth/loginr', 'Auth\AuthController@postLoginr');
//login Facebook
Route::get('/redirect/{typeAction}', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
//--Home--
Route::get('/', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);
// Tendencias
Route::get('/getTend/{idCatalogo}', ['as' => 'clicsTendencias', 'uses' => 'tendenciasController@getTendencias']);
Route::post('/clicTend', ['as' => 'clicsTendencias', 'uses' => 'tendenciasController@saveClickTendencias']);
Route::get('/getLastServicesCreated', ['as' => 'publico', 'uses' => 'HomePublicController@getLastServicesCreated']);
//--Search--
Route::get('Search', ['as' => 'min-search', 'uses' => 'SearchController@getSearchTotal']);
Route::get('searchMap', ['as' => 'map-search', 'uses' => 'SearchController@getViewSearchMap']);
Route::post('searchAllInMap', ['as' => 'map-search', 'uses' => 'SearchController@searchAllInMap']);
Route::get('tendenciasSearch/{idTendencia}', ['as' => 'tendencias-search', 'uses' => 'SearchController@getTendenciasView']);
// Auth
Route::get('/login', ['as' => 'publico', 'uses' => 'HomePublicController@getLoginTemplate']);
Route::get('/Register', ['as' => 'publico', 'uses' => 'HomePublicController@getRegisterTemplate']);
Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController', ]);
Route::get('/confirm/{confirmation_code}', ['uses' => 'HomeController@getConfirm']);
Route::post('/sendRestorePassword', 'HomePublicController@sendEmailRestorePassword');
Route::get('/viewRestorePassword/{codeRestore}', 'HomePublicController@viewRestorePassword');
Route::post('/restorePassword', 'HomePublicController@restorePassword');
// --Imagenes--
Route::get('/image', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' => 'ImageController@postUpload']);
Route::post('uploadEvent', ['as' => 'upload-event', 'uses' => 'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' => 'ImageController@deleteUpload']);
Route::post('promotionImages/{idpromotion}', ['as' => 'images-promotion', 'uses' => 'ImageController@promotionImages']);

// --Servicios--
Route::get('/serviciosres', ['as' => 'detailres', 'uses' => 'UsuarioServiciosController@tablaServiciosRes', 'middleware' => 'notAuth']);
Route::get('/edicionServicios', ['uses' => 'ServicioController@edicionServicios', 'middleware' => 'notAuth']);
Route::get('/editServicios/{id_usuario_op}', ['as' => 'detail', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::post('servicios/DetalleOperador', ['as' => 'upload-postDetalleOperador', 'uses' => 'UsuarioServiciosController@postDetalle']);
Route::get('/editServicios/{id_usuario_servicio}', ['as' => 'detailServicio', 'uses' => 'UsuarioServiciosController@tablaServicios']);
Route::post('servicios/serviciosoperadormini1', ['as' => 'upload-postusuarioserviciosmini1', 'uses' => 'ServicioController@postUsuarioServiciosMini1', 'middleware' => 'notAuth']);
Route::get('servicios/serviciooperador1/{id}/{id_catalogo}', ['as' => 'details.showres1', 'uses' => 'ServicioController@step4crear', 'middleware' => 'notAuth']);
Route::get('/updateServicioActivo/{id_usuario_servicio}', ['uses' => 'ServicioController@uploadServiciosActivo', 'as' => 'getPermanete', 'middleware' => 'notAuth']);
Route::post('/uploadServiciosRes1', ['as' => 'upload-serviciosres1', 'uses' => 'ServicioController@uploadServiciosRes1', 'middleware' => 'notAuth']);
// --Imagenes--
Route::get('/imagenesAjaxDescription1/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImagesDescription1', 'middleware' => 'notAuth']);
Route::get('/getImagesServicio/{tipo}/{idtipo}', ['as' => 'getimages', 'uses' => 'UsuarioServiciosController@getImagesServicio']);
Route::post('/delete/image/{id}', ['as' => 'delete-image', 'uses' => 'ImageController@postDeleteImage']);
Route::post('/delete/image1/{id}', ['as' => 'delete-image1', 'uses' => 'ImageController@postDeleteImage1']);
// --Operadores--
Route::post('/nuevoOperador', ['as' => 'upload-postoperador1', 'uses' => 'ServicioController@postOperadores1', 'middleware' => 'notAuth']);
Route::get('createOperador', ['as' => 'createOperador', 'uses' => 'ServicioController@step2res', 'middleware' => 'notAuth']);
Route::get('/catalogoServ/{idCatalogo}', ['as' => 'getcatalogoServ', 'uses' => 'ServicioController@getServiciosByCatalogo']);
Route::get('/catalogoServ/{idCatalogo}/{idSubCatalogo}', ['as' => 'getcatalogoServ', 'uses' => 'ServicioController@getServiciosByChildcatalogo']);
Route::get('/tokenDz$rip/{id_catalogo}', ['as' => 'searchCat', 'uses' => 'HomePublicController@getSearchHomeCatalogo']);
Route::post('filterParameters', ['as' => 'filtersCategoria', 'uses' => 'HomePublicController@postFiltersCategoria']);
Route::get('servicesOf/{id_operador}', ['as' => 'getServiciosByOperador', 'uses' => 'ServicioController@getServiciosByOperador']);
Route::post('/filterService', ['as' => 'filterService', 'uses' => 'ServicioController@applyServicesFilter']);
// ********************************************************//
//    PARA LAS PROVINCIAS, CANTONES Y PARROQUIAS          //
// ********************************************************//
Route::get('/getProvincias1/{id_provincia}/{id_canton}/{id_parroquia}', ['as' => 'provincia1', 'uses' => 'UsuarioServiciosController@getProvincias1']);
Route::get('/getCantones1/{id}/{id_canton}/{id_parroquia}', ['as' => 'cantones1', 'uses' => 'UsuarioServiciosController@getCantones1']);
Route::get('/getParroquias1/{id}/{id_parroquia}', ['as' => 'parroquias1', 'uses' => 'UsuarioServiciosController@getParroquias1']);
// -- Busqueda--
Route::get('/Search', ['as' => 'SearchIndex', 'uses' => 'SearchController@getTotalSearchInside']);

// Save Horario
Route::post('/saveHorario', ['as' => 'SearchIndex', 'uses' => 'horarioController@store', 'middleware' => 'notAuth']);
//Eventos y promociones
Route::get('/eventPromotionsAdmin/{idServicio}', ['as' => 'eventspromotionsAdmin', 'uses' => 'UsuarioServiciosController@getEventos', 'middleware' => 'notAuth']);
Route::post('/addEventPomotions', ['as' => 'AddEventstPromotions', 'uses' => 'UsuarioServiciosController@store', 'middleware' => 'notAuth']);
Route::get('/addEvent/{idUsuarioServicio}', ['as' => 'getEventsByService', 'uses' => 'UsuarioServiciosController@getViewAdd', 'middleware' => 'notAuth']);
Route::get('/editEvent/{idPromotion}', ['as' => 'getEventData', 'uses' => 'UsuarioServiciosController@getViewEdit', 'middleware' => 'notAuth']);
Route::post('/updateEvent', ['as' => 'AddEventst', 'uses' => 'UsuarioServiciosController@postPromocion', 'middleware' => 'notAuth']);
Route::get('/detailPromotion/{idPromotion?}', ['as' => 'AddEventst', 'uses' => 'HomePublicController@getDetailPromotion']);
//blog
Route::get('/Blog/{idArticle?}', ['as' => 'AddEventst', 'uses' => 'HomePublicController@getViewArticles']);

//MISION VISION POLITICAS
Route::get('/contacts', ['as' => 'about-us', 'uses' => 'HomePublicController@getViewAboutUs']);
Route::get('/termsConditions', ['as' => 'about-us', 'uses' => 'HomePublicController@getViewTerms']);