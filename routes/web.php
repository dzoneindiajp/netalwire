<?php
use App\SignIn;
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
Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect('/')->with('cache','System Cache Has Been Removed.');
  });
Route::get('/admin/login', function () {
    return view('superadminlogin');
});
Route::get('/adminlogin', function () {
    return view('login');
});
Route::get('/cache',function(){
   Artisan::call('cache:clear');
   // Artisan::call('config:cache');
   Artisan::call('config:clear'); 
});
Route::get('/signin', function () {
    $data = SignIn::where('status','1')->first();
    return view('signin',compact('data'));
});
// Route::get('/testing', 'FrontController@testing');
Route::post('superadminlogin', 'Auth\LoginController@superadminlogin')->name('superadminlogin');
Route::get('/', 'FrontController@index')->name('home');
Route::post('/search', 'FrontController@search_data')->name('search');
Route::get('/pages/{slug}', 'FrontController@pagedata')->name('pagedata');
Route::get('/news/list', 'FrontController@news')->name('news_list');
Route::get('/news-detail/{id}', 'FrontController@news_detail')->name('news_detail');
//Route::get('/processing/{slug}', 'FrontController@processing')->name('processing');

Route::post('/send-enquiry', 'FrontController@sendenquiry')->name('sendenquiry');

Route::get('/blogs', 'FrontController@blogs')->name('blogs');
Route::get('/blog-detail/{slug}', 'FrontController@blog_detail')->name('blog_detail');

Route::get('/job', 'FrontController@search')->name('job');
Route::post('/job', 'FrontController@search')->name('jobserch');
Route::post('/filter', 'FrontController@filterjob')->name('filterjob');
Route::get('/job-details/{slug}', 'FrontController@search_detail')->name('search_detail');
Route::post('/job-details', 'FrontController@search_detail')->name('search_detail');
Route::get('/contact-us', 'FrontController@contact')->name('contact');
Route::post('/save_contact3_process', 'FrontController@saveContact3Process')->name('save_contact3_process');
Route::post('/save_sales_contact_process', 'FrontController@saveSalesContactProcess')->name('save_sales_contact_process');
Route::post('/contact-option', 'FrontController@getContactOption');

Route::post('/job-apply', 'FrontController@applyjob')->name('applyjob');
Route::get('/job-applied/{slug}', 'FrontController@applied')->name('job-applied');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/blog-news-search', 'HomeController@getBlogNews')->name('home');
Route::get('/home-block', 'HomeController@block1')->name('block1');

Route::get('/edit-homeblock/{id}', 'HomeController@editblock1')->name('edit-block1');

Route::post('/save-slider-text', 'HomeController@save_slider_text')->name('save-slider-text');
Route::post('/update-slider-text', 'HomeController@save_slider_text')->name('update-slider-text');

Route::get('/company-function', 'HomeController@company_function')->name('company-function');

Route::get('/edit-function/{id}', 'HomeController@edit_function')->name('edit-function');

Route::post('/save-function', 'HomeController@save_function')->name('save-function');

Route::post('/update-function', 'HomeController@update_function')->name('update-function');

Route::get('/delete-function/{id}', 'HomeController@delete_function')->name('delete-function');
Route::get('/level-master', 'HomeController@level_master')->name('level-master');

Route::get('/edit-level/{id}', 'HomeController@edit_level')->name('edit-level');
Route::get('/delete-level/{id}', 'HomeController@delete_level')->name('delete-level');


Route::post('/save-level', 'HomeController@level_save')->name('save-level');
Route::post('/update-level', 'HomeController@update_level')->name('update-level');



Route::get('/about-block', 'HomeController@block2')->name('block2');    
Route::get('/our-block', 'HomeController@block3')->name('block3');
Route::get('/block', 'HomeController@block4')->name('block4');


Route::get('/update-block-four-status/{status}/{id}', 'HomeController@update_bloc_four_status')->name('update-block-four-status');

Route::get('/update-product-status/{status}/{id}', 'HomeController@update_product_status')->name('update-block-four-status');

Route::get('/update-news-status/{status}/{id}', 'HomeController@update_news_status')->name('update-news-status');
Route::get('/update-article-status/{status}/{id}', 'HomeController@update_article_status')->name('update-article-status');
Route::get('/update-job-status/{status}/{id}', 'HomeController@update_job_status')->name('update-job-status');
Route::get('/update-blog-status/{status}/{id}', 'HomeController@update_blog_status')->name('update-blog-status');


Route::get('/ourproduct', 'HomeController@ourproduct')->name('ourproduct');


Route::post('/saveourblock', 'HomeController@saveourblock')->name('saveourblock');
Route::get('/update-block-two-status/{status}/{id}', 'HomeController@blocktwostatus')->name('update-block-two-status');


Route::get('/view-pages', 'HomeController@view_pages')->name('view_pages');
Route::get('/editpagett/{id}', 'HomeController@editpg')->name('editpg');
Route::post('/update_template_one', 'HomeController@save_editpg')->name('save_editpg');
Route::get('/update-page-status/{id}/{id2}', 'HomeController@update_page_status')->name('update-page-status');


Route::get('/article', 'HomeController@article')->name('article');
Route::get('/media', 'HomeController@media')->name('media');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/jobs', 'HomeController@jobs')->name('jobs');
Route::get('/post-blog', 'HomeController@blogs')->name('post-blog');
Route::get('/edit-blog/{slug}', 'HomeController@edit_blogs')->name('edit-blog');
Route::get('/delete-blog/{slug}', 'HomeController@deleteblog')->name('delete-blog');
Route::get('/view-blog', 'HomeController@view_blogs')->name('view-blog');
Route::post('/post-blog', 'HomeController@save_blogs')->name('save-blog');
Route::post('/update-blog', 'HomeController@updateblog')->name('update-blog');
Route::get('/updateslugs', 'HomeController@updateslugs')->name('updateslugs');
Route::post('/save_template_one', 'HomeController@save_template_one')->name('save_template_one');
Route::post('/save_template_two', 'HomeController@save_template_two')->name('save_template_two');
Route::get('/menu-manager', 'HomeController@menu_manager')->name('menu-manager');
Route::get('/footer-menu-manager/', 'HomeController@footer_menu_manager')->name('footer-menu-manager');
Route::get('/footer-menu-manager/{id}', 'HomeController@footer_menu_manager')->name('footer-menu-manager');
Route::get('/delete-footer-menu/{id}', 'HomeController@deletefooter_menu')->name('delete-footer-menu');
Route::post('/save-menu', 'HomeController@save_menu')->name('save-menu');
Route::post('/save-footer-menu', 'HomeController@save_footer_menu')->name('save-footer-menu');

Route::get('/editcontact/{id}', 'HomeController@editcontact')->name('editcontact');
Route::post('contact/save', 'HomeController@savecontact')->name('savecontact');
Route::post('contact/updatecontact', 'HomeController@updatecontact')->name('updatecontact');
Route::get('news', 'HomeController@news')->name('news');
Route::post('savenews', 'HomeController@savenews')->name('savenews'); 
Route::post('savearticle', 'HomeController@savearticle')->name('savearticle'); 
Route::post('savehomeblock', 'HomeController@savehomeblock')->name('savehomeblock'); 
Route::post('saveaboutblock', 'HomeController@saveaboutblock')->name('saveaboutblock');
Route::post('saveweblock', 'HomeController@saveweblock')->name('saveweblock');


Route::get('update-block-three-status/{status}/{id}', 'HomeController@update_block_three_status')->name('update-block-three-status');



Route::post('saveourproduct', 'HomeController@saveourproduct')->name('saveourproduct');
Route::get('/editblock2/{id}', 'HomeController@editblock2')->name('editblock2');
Route::get('/editblock4/{id}', 'HomeController@editblock4')->name('editblock4');
Route::get('/editblock3/{id}', 'HomeController@editblock3')->name('editblock3');
Route::get('/editourproduct/{id}', 'HomeController@editourproduct')->name('editourproduct');
Route::get('/editarticle/{id}', 'HomeController@editarticle')->name('editarticle');
Route::get('/editnew/{id}', 'HomeController@editnew')->name('editnew');
Route::post('updateourblock', 'HomeController@updateourblock')->name('updateourblock');
Route::post('updateweblock', 'HomeController@updateweblock')->name('updateweblock');
Route::post('updateaboutblock', 'HomeController@updateaboutblock')->name('updateaboutblock');
Route::post('updateourproduct', 'HomeController@updateourproduct')->name('updateourproduct');
Route::post('updatenew', 'HomeController@updatenew')->name('updatenew');
Route::post('updatearticle', 'HomeController@updatearticle')->name('updatearticle');
Route::get('/updatehomeblock/{id}/{id2}', 'HomeController@updatehomeblock')->name('updatehomeblock');
Route::get('/deletehomeblock/{id}', 'HomeController@deletehomeblock')->name('deletehomeblock');
Route::get('/deleteaboutblock/{id}', 'HomeController@deleteaboutblock')->name('deleteaboutblock');
Route::get('/deleteourblock/{id}', 'HomeController@deleteourblock')->name('deleteourblock');
Route::get('/deleteblock/{id}', 'HomeController@deleteblock')->name('deleteblock');
Route::get('/deleteproduct/{id}', 'HomeController@deleteproduct')->name('deleteproduct');
Route::get('/deletenew/{id}', 'HomeController@deletenew')->name('deletenew');
Route::get('/deletearticle/{id}', 'HomeController@deletearticle')->name('deletearticle');
Route::get('/deletecontact/{id}', 'HomeController@deletecontact')->name('deletecontact');


Route::get('/page-title', 'HomeController@templatepage')->name('page-title');
Route::get('/templatetwo', 'HomeController@templatetwo')->name('templatetwo');
Route::post('cms/updatepage', 'HomeController@updatepage')->name('updatepage');
Route::get('/add-links', 'HomeController@addlinks')->name('addlinks');
Route::post('links/savelinks', 'HomeController@savelinks')->name('savelinks');
Route::post('links/updatelinks', 'HomeController@updatelinks')->name('updatelinks');
Route::get('/editpage/{id}', 'HomeController@editpage')->name('editpage');
Route::get('/edit-links/{id}', 'HomeController@editlinks')->name('editlinks');
Route::get('/videogallery', 'HomeController@videogallery')->name('videogallery'); 
Route::get('/photogallery', 'HomeController@photogallery')->name('photogallery');
Route::get('/delete-links/{id}', 'HomeController@deletelinks')->name('deletelinks');
Route::post('/savevideogallery', 'HomeController@savevideogallery')->name('savevideogallery');
Route::post('/savephotogallery', 'HomeController@savephotogallery')->name('savephotogallery');
Route::get('/editvideogallery/{id}', 'HomeController@editvideogallery')->name('editvideogallery');
Route::get('/deletevideogalllery/{id}', 'HomeController@deletevideogalllery')->name('deletevideogalllery');
Route::post('/updatevideogallery', 'HomeController@updatevideogallery')->name('updatevideogallery');
Route::post('/updatephotogallery', 'HomeController@updatephotogallery')->name('updatephotogallery');
Route::get('/editphotogallery/{id}', 'HomeController@editphotogallery')->name('editphotogallery');
Route::get('/deletephotogallery/{id}', 'HomeController@deletephotogallery')->name('deletephotogallery');
Route::get('/deletepage/{id}', 'HomeController@deletepage')->name('deletepage');
Route::get('/deletejob/{id}', 'HomeController@deletejob')->name('deletejob');
Route::post('savejob', 'HomeController@savejob')->name('savejob');
Route::get('/viewjob', 'HomeController@viewjob')->name('viewjob');
Route::get('/editjob/{slug}', 'HomeController@editjob')->name('editjob');
Route::post('/updatejob', 'HomeController@updatejob')->name('updatejob');
Route::get('/viewapplyjob', 'HomeController@viewapplyjob')->name('viewapplyjob');
Route::get('/deleteapplyjob/{id}', 'HomeController@deleteapplyjob')->name('deleteapplyjob');

Route::get('/view-contact-us-form3', 'HomeController@viewcontactform3')->name('view-contact-us-form3');
Route::get('/delet-contact-us-form3/{id}', 'HomeController@deleteContactForm3');
Route::get('/view-sales-contact-us-form', 'HomeController@viewSalescontactform')->name('view-sales-contact-us-form');
Route::get('/delete-sales-contact-us-form/{id}', 'HomeController@deleteSalescontactform');
Route::get('/social-link-settings', 'HomeController@socialMediaLink')->name('social-link-settings'); 
Route::post('/update-social-link-settings','HomeController@updateSocialMediaLink')->name('update-social-link-settings'); 


Route::get('/footer-text-settings', 'HomeController@FooterTextSetting')->name('footer-text-settings'); 
Route::post('/update-footer-text-settings','HomeController@updateFooterTextSetting')->name('update-footer-text-settings'); 

Route::get('/email-settings', 'HomeController@emailConfigrationSetting')->name('email-settings'); 
Route::post('/update-email-settings','HomeController@updateEmailConfigrationSetting')->name('update-email-settings');
Route::get('/email-content-settings', 'HomeController@emailContentSetting')->name('email-content-settings'); 
Route::post('/update-email-content-settings','HomeController@updateEmailContentSetting')->name('update-email-content-settings');

Route::get('/add-banner-images', 'HomeController@getBannerImage')->name('add-banner-images'); 
Route::post('update-banner-images','HomeController@updateBannerImage')->name('update-banner-images'); 
Route::group(['prefix'=>'contact-form-option'],function(){
	Route::get('/', 'HomeController@getContactFormOption');
	Route::get('detail/{id}', 'HomeController@getSubContactFormOption'); 
	Route::any('/edit','HomeController@editContactFormOption');
	Route::post('/save', 'HomeController@saveContactFormOptionu');
	Route::get('/delete/{id}','HomeController@deleteContactFormOption');
});
// Route::get('/add-contact-form-option', 'HomeController@getContactFormOption')->name('add-contact-form-option'); 
// Route::get('/add-contact-form-option/{id}','HomeController@getContactFormOption');
// Route::post('/save-contact-form-option', 'HomeController@saveContactFormOptionu')->name('save-contact-form-option');
// Route::get('/delete-contact-form-option/{id}','HomeController@deleteContactFormOption')->name('delete-contact-form-option');


Route::get('/add-country', 'HomeController@getCountry')->name('add-country'); 
Route::get('/add-country/{id}','HomeController@getCountry');
Route::post('/save-country', 'HomeController@saveCountry')->name('save-country');
Route::get('/delete-country/{id}','HomeController@deleteCountry')->name('delete-country');


Route::get('/add-position', 'HomeController@getPosition')->name('add-position'); 
Route::get('/add-position/{id}','HomeController@getPosition');
Route::post('/save-position', 'HomeController@savePosition')->name('save-position');
Route::get('/delete-position/{id}','HomeController@deletePosition')->name('delete-position');

// Caption Manager
Route::get('/caption_manager','HomeController@caption_manager')->name('caption.manager');
Route::post('/caption_manager','HomeController@add_caption')->name('add.caption');
Route::get('/delete_caption/{id}','HomeController@delete_caption')->name('delete.caption');
Route::get('/edit_caption/{id}','HomeController@edit_caption')->name('edit.caption');
Route::post('/update_caption/{id}','HomeController@update_caption')->name('update.caption');
Route::get('/active_caption/{id}','HomeController@active_caption');
Route::get('/deactive_caption/{id}','HomeController@deactive_caption');
Route::get('/title_manager','HomeController@title_manager');
Route::post('/title_manager','HomeController@create_title_manager');
Route::post('/update_title/{id}','HomeController@update_title');
Route::get('/delete_title/{id}','HomeController@delete_title');
Route::get('/edit_title/{id}','HomeController@edit_title');
Route::get('/active_title/{id}','HomeController@active_title');
Route::get('/deactive_title/{id}','HomeController@deactive_title');


// Sign In Page 

Route::get('/signin_page_manager','HomeController@singin_form');
Route::post('/signform_template','HomeController@signform_template');
Route::get('/edit_singin/{id}','HomeController@edit_singin');
Route::post('/update_signin/{id}','HomeController@update_signin');
Route::get('/delete_singin/{id}','HomeController@delete_singin');
Route::get('/active_singin/{id}','HomeController@active_singin');
Route::get('/deactive_singin/{id}','HomeController@deactive_singin');


// End Sign in PAGE

	





