
#   resetful api + jwt
###   路由说明，支持多版本（/route/route.php）
  
  //某条记录 如：curl -X get http://localhost/v1/users/2  
  Route::get(':version/:controller/:id', 'api/:version.:controller/read');

//列表 如：curl -X get http://localhost/v1/users  
Route::get(':version/:controller', 'api/:version.:controller/index');

//新增 如：curl -X post http://localhost/v1/users -d 'users[username]=ant&users[password]=123456&users[email]=123456@qq.com'  
Route::post(':version/:controller', 'api/:version.:controller/create');

//更新 如：curl -X put http://localhost/v1/users/2 -d 'users[nickname]=ant&users[email]=123@qq.com'  
Route::put(':version/:controller/:id', 'api/:version.:controller/update');

//删除某条记录 如：curl -X delete http://localhost/v1/users/2  
Route::delete(':version/:controller/:id', 'api/:version.:controller/delete');


###   模块client，简单的一个客户端测试

  
  http://localhost/client/login/index