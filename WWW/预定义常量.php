<?php
//文件的名字是自己起的不一定对
namespace ssss;
echo __FILE__;// 显示文件的完整路径
echo '<br/>';
echo __DIR__;//显示文件的路径
echo '<br/>';
echo __LINE__;//显示当前的行数
echo '<br/>';
echo __FUNCTION__;//显示所在函数的名字
echo '<br/>';
echo __CLASS__;//显示说在类的名字
echo '<br/>';
echo __NAMESPACE__;//显示所在命名空间
echo '<br/>';
>>>>>>> 0655847831cd1401285da55c0deacdd34c53bb4b



<<<<<<< HEAD
Route::get("/Admin/Attribute/BrandList", 'Admin\AttributeController@getBrandList')->name('AdminAttributeBrandList');
Route::any("/Admin/Attribute/AddBrand", 'Admin\AttributeController@addBrand')->name('AdminAttributeAddBrand');
Route::any("/Admin/Attribute/SaveBrand", 'Admin\AttributeController@saveBrand')->name('AdminAttributeSaveBrand');
Route::any("/Admin/Attribute/DelBrand", 'Admin\AttributeController@delBrand')->name('AdminAttributeDelBrand');
Route::any("/Admin/Attribute/UpdBrand", 'Admin\AttributeController@updBrand')->name('AdminAttributeupdBrand');



Route::get("/Admin/Attribute/ModelList", 'Admin\AttributeController@getModelList')->name('AdminAttributeModelList');
Route::get("/Admin/Attribute/SeriesList", 'Admin\AttributeController@getSeriesList')->name('AdminAttributeSeriesList');
Route::any("/Admin/Attribute/SaveBrand", 'Admin\AttributeController@saveBrand')->name('AdminAttributeSaveBrand');
=======




<<<<<<< HEAD
Route::get("/Admin/Attribute/BrandList", 'Admin\AttributeController@getBrandList')->name('AdminAttributeBrandList');
Route::any("/Admin/Attribute/AddBrand", 'Admin\AttributeController@addBrand')->name('AdminAttributeAddBrand');
Route::any("/Admin/Attribute/SaveBrand", 'Admin\AttributeController@saveBrand')->name('AdminAttributeSaveBrand');
Route::any("/Admin/Attribute/DelBrand", 'Admin\AttributeController@delBrand')->name('AdminAttributeDelBrand');
Route::any("/Admin/Attribute/UpdBrand", 'Admin\AttributeController@updBrand')->name('AdminAttributeupdBrand');



Route::get("/Admin/Attribute/ModelList", 'Admin\AttributeController@getModelList')->name('AdminAttributeModelList');
Route::get("/Admin/Attribute/SeriesList", 'Admin\AttributeController@getSeriesList')->name('AdminAttributeSeriesList');
Route::any("/Admin/Attribute/SaveBrand", 'Admin\AttributeController@saveBrand')->name('AdminAttributeSaveBrand');
=======
Route::get("/Admin/Series/List", 'Admin\SeriesController@getList')->name('AdminSeriesList');
>>>>>>> 0655847831cd1401285da55c0deacdd34c53bb4b