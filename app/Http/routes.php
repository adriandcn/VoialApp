<?php
// pruebas
Route::get('/test', ['as' => 'publico', 'uses' => 'pruebasCtrl@test']);
// Lenguaje
Route::get('language', 'HomeController@language');
// Login
Route::get('auth/loginr', 'Auth\AuthController@postLoginr');
// login Facebook
Route::get('/redirect/{typeAction}', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
// --Home--
Route::get('/', ['as' => 'publico', 'uses' => 'HomePublicController@getHome']);
// Tendencias
Route::get('/getTend/{idCatalogo}', ['as' => 'clicsTendencias', 'uses' => 'tendenciasController@getTendencias']);
Route::post('/clicTend', ['as' => 'clicsTendencias', 'uses' => 'tendenciasController@saveClickTendencias']);
Route::get('/getLastServicesCreated', ['as' => 'publico', 'uses' => 'HomePublicController@getLastServicesCreated']);
// --Search--
Route::get('Search', ['as' => 'min-search', 'uses' => 'SearchController@getSearchTotal']);
Route::get('searchMap', ['as' => 'map-search', 'uses' => 'SearchController@getViewSearchMap']);
Route::post('searchAllInMap', ['as' => 'map-search', 'uses' => 'SearchController@searchAllInMap']);
Route::post('searchAllInMapTendencias', ['as' => 'map-search', 'uses' => 'SearchController@searchAllInMapTendencias']);
Route::get('busqueda-por-tendencia/{idTendencia}', ['as' => 'tendencias-search', 'uses' => 'SearchController@getTendenciasView']);
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
Route::get('/mis-servicios', ['as' => 'detailres', 'uses' => 'UsuarioServiciosController@tablaServiciosRes', 'middleware' => 'notAuth']);
Route::get('/crear-editar-servicio', ['uses' => 'ServicioController@edicionServicios', 'middleware' => 'notAuth']);
Route::post('/moveServTouser', ['uses' => 'ServicioController@moveServTouser', 'middleware' => 'notAuth']);
Route::post('/cleanSeguros/{idService}', ['uses' => 'ServicioController@cleanSeguros', 'middleware' => 'notAuth']);
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
Route::get('datos-de-operador', ['as' => 'createOperador', 'uses' => 'ServicioController@step2res', 'middleware' => 'notAuth']);
Route::get('/catalogo-de-servicios/{idCatalogo}', ['as' => 'getcatalogoServ', 'uses' => 'ServicioController@getServiciosByCatalogo']);
Route::post('/loadMoreCatalogo', ['as' => 'getcatalogoServ', 'uses' => 'ServicioController@loadMoreCatalogo']);
Route::get('/catalogo-de-servicios/{idCatalogo}/{idSubCatalogo}', ['as' => 'getcatalogoServ', 'uses' => 'ServicioController@getServiciosByChildcatalogo']);
Route::get('/detalles-de-servicio/{id_catalogo}', ['as' => 'searchCat', 'uses' => 'HomePublicController@getSearchHomeCatalogo']);
Route::post('filterParameters', ['as' => 'filtersCategoria', 'uses' => 'HomePublicController@postFiltersCategoria']);
Route::get('servicesOf/{id_operador}', ['as' => 'getServiciosByOperador', 'uses' => 'ServicioController@getServiciosByOperador']);
Route::post('/filterService', ['as' => 'filterService', 'uses' => 'ServicioController@applyServicesFilter']);
Route::post('/catalogoNews', ['as' => 'catalogoNews', 'uses' => 'NewsController@getNewByCatalog']);
Route::post('/registerUserToNews', ['as' => 'registerUserToNews', 'uses' => 'NewsController@registerUserToNews']);
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
// Eventos y promociones
Route::get('/administracion-de-promociones/{idServicio}', ['as' => 'eventspromotionsAdmin', 'uses' => 'UsuarioServiciosController@getEventos', 'middleware' => 'notAuth']);
Route::post('/addEventPomotions', ['as' => 'AddEventstPromotions', 'uses' => 'UsuarioServiciosController@store', 'middleware' => 'notAuth']);
Route::get('/crear-editar-promocion/{idUsuarioServicio}/{typeAdd?}', ['as' => 'getEventsByService', 'uses' => 'UsuarioServiciosController@getViewAdd', 'middleware' => 'notAuth']);
Route::get('/crear-editar-promocion/{idPromotion}/{typeAdd?}', ['as' => 'getEventData', 'uses' => 'UsuarioServiciosController@getViewEdit', 'middleware' => 'notAuth']);
Route::post('/updateEvent', ['as' => 'AddEventst', 'uses' => 'UsuarioServiciosController@postPromocion', 'middleware' => 'notAuth']);
Route::get('/detalles-de-promocion/{idPromotion?}', ['as' => 'AddEventst', 'uses' => 'HomePublicController@getDetailPromotion']);
Route::get('/getMorePromotions/{idSubCatalogo}', ['as' => 'getMorePromotions', 'uses' => 'HomePublicController@getMorePromotions']);
Route::post('/getPromotion/{idPromotion}', ['as' => 'getPromotion', 'uses' => 'HomePublicController@getPromotion']);
// blog
Route::get('/Blog/{idArticle?}', ['as' => 'AddEventst', 'uses' => 'HomePublicController@getViewArticles']);
// MISION VISION POLITICAS
Route::get('/contacts', ['as' => 'about-us', 'uses' => 'HomePublicController@getViewAboutUs']);
Route::get('/termsConditions', ['as' => 'about-us', 'uses' => 'HomePublicController@getViewTerms']);
Route::get('sitemap', ['as' => 'site-map', 'uses' => 'siteMapController@genSiteMap']);

//Posts
Route::get('/postList/{idUsuarioServicio}/{idCatalogo}', ['as' => 'postList', 'uses' => 'UsuarioServiciosController@getPostList', 'middleware' => 'notAuth']);
Route::post('/addEditPost', ['as' => 'addEditPost', 'uses' => 'UsuarioServiciosController@addEditPost', 'middleware' => 'notAuth']);
Route::post('/addPostRedactor', ['as' => 'addPostRedactor', 'uses' => 'UsuarioServiciosController@addPostRedactor', 'middleware' => 'notAuth']);
Route::get('/detalles-de-post/{idPost}', ['as' => 'detalles-de-post', 'uses' => 'UsuarioServiciosController@getPostDetails']);
Route::post('/getLastPostCreated/{idUserServ?}', ['as' => 'detalles-de-post', 'uses' => 'UsuarioServiciosController@getLastPostCreated']);
Route::post('/getPopularPost/{idUserServ}', ['as' => 'detalles-de-post', 'uses' => 'UsuarioServiciosController@getPopularPosts']);
Route::post('/saveEditPost', ['as' => 'saveEditPost', 'uses' => 'UsuarioServiciosController@saveEditPost', 'middleware' => 'notAuth']);
Route::get('/listado-de-post', ['as' => 'listado-post', 'uses' => 'UsuarioServiciosController@addEditPost', 'middleware' => 'notAuth']);
Route::get('/lastPostsList', ['as' => 'listado-last-post', 'uses' => 'UsuarioServiciosController@getLastPostCreatedCarousel']);
Route::get('/crear-editar-post/{idUsuarioServ}/{idPost?}', ['as' => 'crear-editar-post', 'uses' => 'UsuarioServiciosController@getViewaddEditPost', 'middleware' => 'notAuth']);