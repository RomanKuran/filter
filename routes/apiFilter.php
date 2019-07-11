<?php
  Route::post('/search', 'ApiFilterController@search')->name('filter.search');
  Route::post('/getAll', 'ApiFilterController@getAll')->name('filter.getAll');
