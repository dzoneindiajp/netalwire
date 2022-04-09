<?php

namespace App\Providers;
use DB;
use App\CMS;
use App\Dragmenu;
use App\Blog;
use App\Block2;
use App\FooterMenu;
use App\Contact;
use App\SocialMediaLink;
use App\footerMenuText;
use App\emailConfigurationSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($settings){
			$cms=CMS::all();
			$settings->with('pagecms',$cms);
			
			
			$block2content=Block2::where('status',1)->first();
			if($block2content)
			{
			$aboutcontent=$block2content->about_content;
			
			$settings->with('aboutcontent',$aboutcontent);
			}
			$contactcontent=Contact::first();
			$settings->with('contactcontent',$contactcontent); 
			
			//$allblogs=Blog::all();
			$allblogs = Blog::where('status', '1')->orderBy('id','DESC')->take(6)->get();
			$settings->with('allblog',$allblogs); 
			
			$fm=FooterMenu::all();
			$settings->with('fm',$fm);
			
		   	$menu=Dragmenu::where('parent_id','0')->where('status','1')->get();
			$settings->with('menu',$menu);
			 
			 /*$menu=  Dragmenu::join('cms','menu.url_menu','=','cms.slug')
				   ->select('menu.*','cms.slug','cms.title')
				   ->where('menu.parent_id','0')->where('menu.status','1')->get();
			   $settings->with('menu',$menu);*/
			   //dd($menu);
			 
			 
			$SocialMediaLink = SocialMediaLink::where("id", '!=','')->first();
                 $settings->with('SocialMediaLink', $SocialMediaLink);
                 
                 	$footerMenuText = footerMenuText::where("id", '!=','')->first();
                 $settings->with('footerMenuText', $footerMenuText);
                 
                 $email_setting_arr = emailConfigurationSetting::where("id", '!=','')->first();
                 $settings->with('email_setting_arr', $email_setting_arr);
                 
                 $site_logo = DB::table('banner_images')->where('id','!=','')->first();
                 $settings->with('site_logo', $site_logo);
		});
    }
}
