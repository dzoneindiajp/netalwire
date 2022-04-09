<?php
namespace App\Http\Controllers;
use DB;
use App\Block1;
use App\SignIn;
use App\Title;
use App\Caption;
use App\Block2;
use App\FooterMenu;
use App\Block3;
use App\Block4;
use App\Slidertext;
use App\Dragmenu;
use App\ImagesPath;
use App\OurProducts;
use App\CompanyFunctions;
use App\LevelMaster;
use App\News;
use App\Articles;
use App\VideoGallery;
use App\Photogallery;
use App\Contact;
use App\Job;
use App\Jobapply;
use App\CMS;
use App\Links;
use App\Blog;
use Image;
use App\User;
use App\SocialMediaLink;
use App\footerMenuText;
use App\ContactFormOption;
use App\Country;
use App\Position;
use App\emailConfigurationSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
	
	public function block1()
	{
		 $data = DB::table('block1')->get();
		 $slider=Slidertext::all();
		 return view('admin.home',['data'=>$data,'slider'=>$slider]);
	}
	public function editblock1($id)
	{
		 $data = DB::table('block1')->where('home_id',$id)->first();
		 $slider=Slidertext::all();
		
		 return view('admin.edithome',['data'=>$data,'slider'=>$slider]);
	}
	public function company_function()
	{
		 $data = DB::table('company_function')->get();
		
		 return view('admin.company_function',['data'=>$data]);
	}
	
	public function level_master()
	{
		 $data = DB::table('level_master')->get();		
		 return view('admin.level_master',['data'=>$data]);
	}
		
	public function edit_level($id)
	{
		 $data = DB::table('level_master')->where('id',$id)->first();		
		 return view('admin.edit_level_master',['data'=>$data]);
	}
	
	public function save_function(Request $request)
	{
		$fun=new CompanyFunctions();
		$fun->company_function=$request->name;
		$fun->save();
		return redirect()->back();
		
		
	}
	
	public function save_slider_text(Request $request)
	{
		DB::table('slider_text')->delete();
		foreach($request->banner_text as $bt)
		{
			if($bt!='')
			{
		$st=new Slidertext();
		$st->slider_text=$bt;
		$st->save();
			}
		}
		
		return redirect()->back();
		
	}
	public function level_save(Request $request)
	{
		$fun=new LevelMaster();
		$fun->level_name=$request->name;
		$fun->save();
		return redirect()->back();
		
		
	}
	public function update_level(Request $request)
	{
		$fun=LevelMaster::find($request->id);
		$fun->level_name=$request->name;
		$fun->save();
		return redirect()->back();
		
		
	}
	public function delete_level($id)
	{
		$fun=LevelMaster::find($id);
		
		$fun->delete();
		return redirect()->back();
		
		
	}
	public function update_function(Request $request)
	{
		$fun=CompanyFunctions::find($request->id);
		$fun->company_function=$request->name;
		$fun->save();
		return redirect()->back();
		
		
	}
	public function delete_function($id)
	{
		$fun=CompanyFunctions::find($id);
		
		$fun->delete();
		return redirect()->back();
		
		
	}
	
	
	public function edit_function($id)
	{
		$data = DB::table('company_function')->where('id',$id)->first();
		
		 return view('admin.editcompany_function',['data'=>$data]);
		
		
	}
	
	public function savehomeblock(request $request)
	{
		
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		//$file='';
		if($video_chk){
		 $file = $request->file('text_video');   
		}
		if($image_chk){
		$file = $request->file('image');
		}
           DB::table('block1')->update(['status' => '0']);
		if(isset($file) ){
				
            //$filename = $file->getClientOriginalName();
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = './image/';
			$file->move($path, $filename);
            ////////////////////////////////////////////////
            /*$image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif','jpg'])){ 
            //$filename = $file->getClientOriginalName();
            $filename = $image_name;
            $path = './image/';
            $file->move($path, $filename);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $filename=$image_name;*/
            
            ///////////////////////////////////////////////////
		    }else{
		       $filename=$request->video_link??'';
		    }
			
			/* echo ' file '.$filename; die; */
			$hm=new Block1();	
			$hm->type_name=$request->type_name;
			$hm->home_image=$filename??'';
	       	$hm->video_link=$request->video_link??'';
			$hm->status='0';
			$hm->save();
			
			$path=new ImagesPath();
		    $path->foldername="Home";
			$path->path=$filename??'';
			$path->save();
			return redirect("home-block");
           
       

		
	}
	public function menu_manager()
	{
		 $cms = DB::table('cms')->where('status','1')->get();
		
		 return view('admin.menu_manager',['cms'=>$cms]);
	}
	public function footer_menu_manager($id ='')
	{
		 $cms = DB::table('cms')->where('status','1')->get();
		 $footer_menu_text = DB::table('footer_menu_text')->where('id',1)->first();
         
         
        $fm=DB::table("footer_menu")->get();
        $nfm = [];
         if(!empty($id)){
			 
            $nfm=DB::table("footer_menu")->where('id',$id)->first(); 
         }  
		 return view('admin.footer_menu_manager',['cms'=>$cms,'fm'=>$fm,'nfm'=>$nfm,'footer_menu_text'=>$footer_menu_text]);
	}
	
	public function save_footer_menu(Request $request)
	{
		if($request->id)
		{
			$str=explode("~",$request->page);
		$fm=FooterMenu::find($request->id);
		$fm->position=$request->position;
		$fm->link_title=$str[0];
		$fm->link=$str[1];
		$fm->save();
			
			
		}
		else{
			
		$str=explode("~",$request->page);
		$fm=new FooterMenu();
		$fm->position=$request->position;
		$fm->link_title=$str[0];
		$fm->link=$str[1];
		$fm->save();
		}
		return redirect()->back();
		
	}
		
	public function deletefooter_menu($id)
	{
		
		$fm=FooterMenu::find($id);
		
		$fm->delete();
		return redirect()->back();
		
	}
        //Start  Caption 	
	public function caption_manager(){
	     $caption = Caption::all();
	      return view('admin.caption',compact('caption'));
	}
	public function add_caption(Request $request){
	   $data = new Caption();
	   $data->caption_name = $request->caption_name;
	   $data->status = "0";
	   $data->save();
	   $caption = Caption::all();
	   return redirect('/caption_manager');
	}
	
	public function delete_caption($id){
	    $data = Caption::find($id);
	    $data->delete();
	    return redirect('/caption_manager');
	}
	
	public function edit_caption($id){
	   $data = Caption::find($id);
	   return view('admin.edit_caption',compact('data'));
	}
	
	public function update_caption(Request $request,$id){
	    $data = Caption::find($id);
	    $data->caption_name = $request->caption_name;
	    $data->update();
	    return redirect('/caption_manager');
	}
	
	public function active_caption($id){
	    $caption_data = Caption::all();
	    
	    foreach($caption_data as $cap){
	        
	        $cap->status = "0";
	        $cap->update();
	       
	    }
	    $data = Caption::find($id);
	    $data->status = "1";
	    $data->update();
	     return redirect('/caption_manager');
	}
	public function deactive_caption($id){
	    
	    $data = Caption::find($id);
	    $data->status = "0";
	    $data->update();
	     return redirect('/caption_manager');
	}
   // End Caption 	
	public function blogs(){
		 return view('admin.blogs');
	}
	public function view_blogs(){
		$blogs=Blog::all();
		 return view('admin.viewblogs',['blogs'=>$blogs]);
	}
	public function edit_blogs($slug){
		$blogs=Blog::where("id",$slug)->first();
		 return view('admin.editblog',['blogs'=>$blogs]);
	}
	public function save_blogs(Request $request){
		  $image = $request->file('image');
		  
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}   
		
    		$vido_img = "";
		if(isset($image))
		{
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
            $destinationPath = public_path('../thumbnail');
            $resize_image = Image::make($image->getRealPath());
    		
    		 $resize_image->resize(500,400, function($constraint){
    		  $constraint->aspectRatio();
    		 })->save($destinationPath . '/' . $image_name);
            }
    
    		$destinationPath = public_path('../uploads');
    
    		$image->move($destinationPath, $image_name);
    		$icon=$image_name;
			$vido_img = $icon;
			
    		if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
    			$path=new ImagesPath();
    		    $path->foldername="Blogs";
    			$path->path=$icon;
    			$path->save();
    		}
		}
		
		$image1 = $request->file('image1');
		if(isset($image1))
		{
        $image_name = time() . 'img_1.' . $image1->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image1->getRealPath());

		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image1->move($destinationPath, $image_name);
		$icon=$image_name;
		} 
		$cms=new Blog();
		
		$cms->banner_image=$icon??'';
		$cms->title=$request->title;
		$cms->is_home=$request->is_home??0;
		$cms->description=$request->description;
		$cms->metakeywords=$request->metakeywords;
		$cms->metadescription=$request->metadescription; 
		
		$cms->type_name=$request->type;
		$cms->video_link=$request->video_link;
		 
	    if(isset($image)) {
    		 if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
    		    $cms->image=$icon; 
    		 }else{
				if(trim($vido_img ) != ""){
					$cms->image=$vido_img;
				}
			 }
	    }
		
		$cms->slug=strtolower(str_replace(" ","-",$request->title));
		$cms->status=$request->status;
		
		$cms->save();
		
		
		return redirect()->back()->with("success","Post has been submitted successfully!");
		
	}
	public function updateblog(Request $request)
	  {
		   /* $image = $request->file('image'); */
		   
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}   
		
		$vido_img = "";
		if(isset($image))
		{
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('../thumbnail');
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
                $resize_image = Image::make($image->getRealPath());
        		
        		 $resize_image->resize(500,400, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
            }
    
    		$destinationPath = public_path('../uploads');
    
    		$image->move($destinationPath, $image_name);
    		$icon=$image_name;
			
			$vido_img = $icon;
		}
		else{
			$icon=$request->oldimage;
			$vido_img = $icon;
		}
		
		
		$image1 = $request->file('image1');

		if($image1)
		{

        $image_name = time() . '_img.' . $image1->getClientOriginalExtension();
        	 if(in_array($image1->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image1->getRealPath());

        		 $resize_image->resize(600, 600, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
    		 }

		   $destinationPath = public_path('../uploads');
    		$image1->move($destinationPath, $image_name);
    		$icon=$image_name;
		}
		else
		{
		 $icon=$request->oldimg1;

		}
		
		 /* dd($request->all()); */
		 
		 $cms=Blog::find($request->id);
		$cms->banner_image=$icon??'';
		$cms->title=$request->title;
		$cms->type_name=$request->type;
		$cms->is_home=$request->is_home??0;
		 if(trim($request->video_link) != ""){
			 
			$cms->video_link=$request->video_link;
		 }
		
		if(trim($vido_img ) != ""){
			 
			$cms->image=$vido_img;
		 }
		
		$cms->description=$request->description;
		$cms->metakeywords=$request->metakeywords;
		$cms->metadescription=$request->metadescription; 
		$cms->slug=strtolower(str_replace(" ","-",$request->title));
		$cms->status=$request->status;
		
		$cms->save();
		
		
		//return redirect()->back()->with("success","Post has been updated successfully!");
		 return redirect("view-blog")->with("success","Post has been updated successfully!");
		
	}
	public function deleteblog(Request $request,$slug)
	  {
		$cms=Blog::find($slug);
		
		
		$cms->delete();
		
		
		return redirect()->back()->with("success","Post has been deleted successfully!");
		
	}
	public function save_menu(Request $request)
	{
		$menu =json_decode($_POST['menu'], true);
		Dragmenu::truncate();
		$this->savemenu($menu);
        return redirect("menu-manager")->with("success","Menu Updated");
		
	}
	
	public function savemenu($menu,$parent=0)
	{
		
         $array_menu =$menu ;
		
		
		
		 foreach ($array_menu as $value) {
            
            $label = $value['label'];
            $url = (empty($value['url'])) ? '#' : $value['url'];
  
            $dm=new Dragmenu();
			$dm->label_menu=$label;
			$dm->url_menu=$url;
			$dm->parent_id=$parent;
            $dm->save();
           
            $id = $dm->id;

            if (array_key_exists('children', $value))
			{
			/* echo "<pre>";
			print_r($value); */
                $this->savemenu($value['children'],$id);
			}
            
        }
		
		
	}
	
	public function block2()
	{
		 $data = DB::table('block2')->get();
		  //dd($data);
		 return view('admin.block2',['data'=>$data]);
	}
	
	public function blocktwostatus($status,$id)
	{
		DB::table('block2')
              ->where('id',$id)
              ->update(['status' => $status]);
		return redirect()->back();
		
	}
	public function editblock2(Request $request,$id)
	{
		 $data = DB::table('block2')->where('id',$id)->first();
		   //dd($data->type_name);
		 return view('admin.editblock2',['data'=>$data]);
	}
	
	public function block3()
	{
		 $data = DB::table('block3')->get();
		
		 return view('admin.block3',['data'=>$data,]);
	}
	
	public function editblock3(Request $request,$id)
	{
		  $data = DB::table('block3')->where('ob_id',$id)->first();
		
		
		 return view('admin.editblock3',['data'=>$data]);
	}
	
	public function block4()
	{
		$block = DB::table('block4')->get();
		
		 return view('admin.block4',['block'=>$block]);
	}
	public function editblock4(Request $request,$id)
	{
		$blocks = DB::table('block4')->where('id',$id)->first();
		
		
		 return view('admin.editblock4',['data'=>$blocks]);
	}
	public function media(Request $request)
	{
		$images = DB::table('images_path')->get();
		
		
		 return view('admin.media',['images'=>$images]);
	}
	
	public function deletehomeblock(Request $request,$id)
	{
		
		DB::table('block1')->where('home_id',$id)->delete();
		return redirect("home-block");
	}	
	public function deleteaboutblock(Request $request,$id)
	{
		
		DB::table('block2')->where('id',$id)->delete();
		return redirect("about-block");
	}
	
	public function deleteourblock(Request $request,$id)
	{
		
		DB::table('block3')->where('ob_id',$id)->delete();
		return redirect("our-block");
	}
	public function deleteblock(Request $request,$id)
	{
		
		DB::table('block4')->where('id',$id)->delete();
		return redirect("block"); 
	}
	
	public function updatehomeblock(Request $request,$id,$id2)
	{
	    
		//DB::table('block1')->update(['status' => '0']);
		/* $query=DB::table('block1')->where('home_id',$id2)->first(); */
		//dd($query->type_name);
// 		if($query->home_id!=$id2){
		 /* DB::table('block1')->update(['status' => '0']);    */
// 		}

		DB::table('block1')
              ->where('home_id',$id2)
              ->update(['status' => $id]);
		
		return redirect("home-block");
	}
	
	public function saveaboutblock(Request $request)
	{
		//$image = $request->file('image');
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(300, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
            $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
    		
		}else{
		    $icon=$request->video_link??'';
		}		
		$path=new ImagesPath();
		    $path->foldername="Block2";
			$path->path=$icon??'';
			$path->save();
		DB::table('block2')->update(['status' => '0']);
		$sc=new Block2();
		$sc->type_name=$request->type_name;
		$sc->about_image=$icon??'';	
		$sc->redirection_url=$request->redirection_url??'';
		$sc->video_link=$request->video_link??'';
		$sc->title=$request->title;
		$sc->about_content=$request->about;
		$sc->status=1;
		$sc->save();

		return redirect("about-block");
		
	}
	
	public function updateaboutblock(Request $request)
	{
		$image = $request->file('image');
		if(isset($image))
		{
        /*$image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(550, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		  $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
		
		if(trim($request->video_link) != ""){
			DB::table('block2')
			->where('id',$request->id)
			->update([
				'type_name'=>$request->type_name,
				'about_image' =>$icon??'',
				'redirection_url' =>$request->redirection_url??'',
				'video_link'=>$request->video_link??'',
				'title' =>$request->title,		
				'about_content' =>$request->about,				
			]);
		}else{
			DB::table('block2')
			->where('id',$request->id)
			->update([
				'type_name'=>$request->type_name,
				'about_image' =>$icon??'',
				'redirection_url' =>$request->redirection_url??'',
				'title' =>$request->title,		
				'about_content' =>$request->about,				
			]);
		}
		
		
		return redirect("about-block");
		
	}
	public function saveourblock(Request $request)
	{
		//$image = $request->file('image');
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
		    
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(300, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		 $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		
		
		}
		
		$path=new ImagesPath();
		    $path->foldername="Block3";
			$path->path=$icon??'';
			$path->save();
			
			
		DB::table('block3')->update(['status' => '0']);
		$sc=new Block3();
		$sc->type_name=$request->type_name;
		$sc->image=$icon??'';
		$sc->redirection_url=$request->redirection_url??'';
		$sc->video_link=$request->video_link??'';
		$sc->about_content=$request->about;
		$sc->title=$request->title;
		$sc->status=1;
		$sc->save();

		return redirect("our-block");
		
	}
	
	
	public function updateourblock(Request $request)
	{
		//$image = $request->file('image');
		
		 $image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		if(isset($image))
		{
        /*$image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(550, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		
		$image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
		
		if(trim($request->video_link) != ""){
			DB::table('block3')
				->where('ob_id',$request->id)
				->update([
				'type_name'=>$request->type_name,
				'video_link'=>$request->video_link??'',
				'image' =>$icon??'',
				'redirection_url' =>$request->redirection_url??'',
				'title'=>$request->title,
				'about_content' =>$request->about,
			]);
		}else{
			DB::table('block3')
				->where('ob_id',$request->id)
				->update([
				'type_name'=>$request->type_name,
				'image' =>$icon??'',
				'redirection_url' =>$request->redirection_url??'',
				'title'=>$request->title,
				'about_content' =>$request->about,
			]);
		}
		
		return redirect("our-block");
		
	}
	
	
	public function update_block_three_status($status,$id)
	{
		
		DB::table('block3')
        ->where('ob_id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	
	public function saveweblock(Request $request)
	{
		
	    //$image = $request->file('image');
	    
	    $image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(300, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		$image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		
		}
			$path=new ImagesPath();
		    $path->foldername="Block4";
			$path->path=$icon??'';
			$path->save();
		/* DB::table('block4')->update(['status' => '0']); */
		
		$sc=new Block4();
		$sc->type_name=$request->type_name;
		$sc->image=$icon??'';
		$sc->redirection_url=$request->redirection_url??'';
		$sc->video_link=$request->video_link??'';
		/* $sc->position=$request->position; */
		$sc->title=$request->title;
		$sc->description=$request->about;
		$sc->status='0';
		$sc->save();

		return redirect("block");
		
	}
	
	public function update_bloc_four_status($status,$id)
	{
		DB::table('block4')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	public function update_product_status($status,$id)
	{
		DB::table('ourproduct')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	public function update_news_status($status,$id)
	{
		DB::table('news')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	public function update_article_status($status,$id)
	{
		DB::table('articles')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	public function update_job_status($status,$id)
	{
		DB::table('job')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	public function update_blog_status($status,$id)
	{
		DB::table('blogs')
        ->where('id',$id)
        ->update([
		'status' =>$status,
			]);
			
			return redirect()->back();
		
	}
	
	
	public function updateweblock(Request $request)
	{
		//$image = $request->file('image');
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(550, 550, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		$image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
 
		if(trim($request->video_link) != ""){
			DB::table('block4')
			->where('id',$request->id)
			->update([
			 'type_name'=>$request->type_name,
			'video_link'=>$request->video_link??'',
			'image' =>$icon??'',
			'redirection_url'=>$request->redirection_url??'',
			'title' =>$request->title, 
			'position' =>$request->position,
			'description' =>$request->about,			
			]);
		}else{
			DB::table('block4')
			->where('id',$request->id)
			->update([
			 'type_name'=>$request->type_name,
			'image' =>$icon??'',
			'redirection_url'=>$request->redirection_url??'',
			'title' =>$request->title, 
			'position' =>$request->position,
			'description' =>$request->about,			
			]);	
		}
		 
		return redirect("block");
		
	}
	
	public function ourproduct()
	{
		 $product = DB::table('ourproduct')->get();
		
		 return view('admin.ourproduct',["product"=>$product]);
	}
	
	public function saveourproduct(Request $request)
	{
		
	    //$image = $request->file('image');
	    $image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		if(isset($image))
		{
		    
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
			$image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		
		}
		$path=new ImagesPath();
		    $path->foldername="Our Products";
			$path->path=$icon??'';
			$path->save();
		///DB::table('ourproduct')->update(['status' => '0']);
		$sc=new OurProducts();
		$sc->type_name=$request->type_name;
		$sc->image=$icon??'';
		$sc->redirection_url=$request->redirection_url??'';
		$sc->video_link=$request->video_link??null;
		$sc->position=$request->position;
		$sc->title=$request->title;
		$sc->content=$request->content;
		$sc->status=1;
		$sc->save();

		return redirect("ourproduct");
		
	}
	
	public function editourproduct(Request $request,$id)
	{
		  $ourproduct = DB::table('ourproduct')->where('id',$id)->first();
		
		 return view('admin.editourproduct',['ourproduct'=>$ourproduct]);
	}
	
	public function updateourproduct(Request $request)
	{
		//$image = $request->file('image');
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
       /* $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;*/
		
		
		$image_name = time() . '.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
            
		
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
		
		
		if(trim($request->video_link) != ""){
			DB::table('ourproduct')
			->where('id',$request->id)
			->update([
			'type_name'=>$request->type_name,
			'video_link'=>$request->video_link??'',
			'image' =>$icon??'',
			'redirection_url'=>$request->redirection_url??'',
			'position' =>$request->position,
			'title' =>$request->title,
			'content' =>$request->content,
			
			]);
		}else{
			DB::table('ourproduct')
			->where('id',$request->id)
			->update([
			'type_name'=>$request->type_name,
			'image' =>$icon??'',
			'redirection_url'=>$request->redirection_url??'',
			'position' =>$request->position,
			'title' =>$request->title,
			'content' =>$request->content,
			
			]);
		}
		
		
		return redirect("ourproduct");
		
	}
	
	public function deleteproduct(Request $request,$id)
	{
		
		DB::table('ourproduct')->where('id',$id)->delete();
		return redirect("ourproduct"); 
	}
	
	public function news(){
		 $new = DB::table('news')->orderby('id','desc')->get();
		 return view('admin.news',["new"=>$new]);
	}
	
	public function savenews(Request $request){
	    /* $image = $request->file('image'); */
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}   
		
		if(isset($image))
		{
            $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            
            
    		if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
    		    $destinationPath = public_path('../thumbnail');
    		    $resize_image = Image::make($image->getRealPath());
        		 $resize_image->resize(600, 600, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
    		} 
    		$destinationPath = public_path('../uploads'); 
    		$image->move($destinationPath, $image_name);
    		$icon=$image_name;
		}
			if(isset($image))
		{
	    if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
			$path=new ImagesPath();
		    $path->foldername="News";
			$path->path=$icon;
			$path->save();
	    } 
		}
	    
		///DB::table('news')->update(['status' => '0']);
		/*  $sc=new News();
	     if(isset($image)) {
    		 if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
    		    $sc->image=$icon;
    		 } 
	    } */
		  
		/* $sc->type_name=$request->type;
		
		if(trim($request->video_link) != ""){
			$sc->video_link=$request->video_link;
		}
		
		$sc->title=$request->title;
		$sc->is_home=$request->is_home??0;
		$sc->description=$request->description;
		$sc->status=1;
		$sc->save(); */
		 
		$ins_data = array(
			'type_name' =>$request->type,
			'title' =>$request->title,
			'is_home' =>$request->is_home??0,
			'description' =>$request->description,
			'status' => 1,
		);
		 
		if(trim($request->video_link) != ""){
			$ins_data['video_link'] = $request->video_link;
		}
		
		if(isset($image)){    	 
			$ins_data['image'] = $icon;
	    }
		  
		  /* echo "<pre> ins_data "; print_r($ins_data); die; */
		DB::table('news')->insert($ins_data); 

		return redirect("news")->with('success','News Created!!');
		
	}
	
	public function editnew(Request $request,$id){
		$ournew = DB::table('news')->where('id',$id)->first();
		return view('admin.editnew',['ournew'=>$ournew]);
	}
	
	public function updatenew(Request $request)
	{
		$image = $request->file('image');
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        
    		 if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
        		
        		 $resize_image->resize(600, 600, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
    		 }

		$destinationPath = public_path('../uploads');
    
    		$image->move($destinationPath, $image_name);
    		$icon=$image_name;
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
		
		if(trim($request->video_link) != ""){
			DB::table('news')
				->where('id',$request->id)
				->update([
					'image' =>$icon,
					'type_name' =>$request->type,
					'video_link' =>$request->video_link,
					'title' =>$request->title,
					'is_home' =>$request->is_home??0,
					'description' =>$request->description,
				]);
		}else{
			DB::table('news')
				->where('id',$request->id)
				->update([
					'image' =>$icon,
					'type_name' =>$request->type,
					'title' =>$request->title,
					'is_home' =>$request->is_home??0,
					'description' =>$request->description,
				]);
		} 
		
		return redirect("news")->with('success','Updated Successfully!!');
		
	}
	
	public function deletenew(Request $request,$id)
	{
		
		DB::table('news')->where('id',$id)->delete();
		return redirect("news"); 
	}
	
	public function article()
	{
		 $article = DB::table('articles')->get();
		
		 return view('admin.articles',["article"=>$article]);
	}
	
	public function savearticle(Request $request)
	{
		
	    /* $image = $request->file('image'); */
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		//$file='';
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);
        }

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		
		if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
		$path=new ImagesPath();
		    $path->foldername="Article";
			$path->path=$icon;
			$path->save();
		}
		}
			
		DB::table('articles')->update(['status' => '0']);
		$ac=new Articles();
		if(isset($image)){
    		/* if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ */
    		    $ac->image=$icon;
    		/* } */
		}
		
		/* echo '$icon '.$icon; die; */
		$ac->short_description=$request->short_desc;
		$ac->title=$request->title;
		$ac->type_name=$request->type;
		if(trim($request->video_link) != ""){
			$ac->video_link=$request->video_link;
		}
		
		$ac->redirection_url=$request->redirection_url??'';
		$ac->content=$request->content;
		$ac->status=1;
		$ac->save();

		return redirect("article");
		
	}
	
	public function editarticle(Request $request,$id)
	{
		  $editarticle = DB::table('articles')->where('id',$id)->first();
		
		 return view('admin.editarticle',['editarticle'=>$editarticle]);
	}
	
	public function updatearticle(Request $request)
	{
		/* $image = $request->file('image'); */
		
		
		$image_chk = $request->file('image');
		$video_chk = $request->file('text_video');
		//$file='';
		if($video_chk){
		 $image = $request->file('text_video');   
		}
		if($image_chk){
		$image = $request->file('image');
		}
		
		
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);
        }

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		else
		{
		 $icon=$request->oldimg;	
			
		}
		
		$upd_data = array(
			'redirection_url' =>$request->redirection_url??'',
			'type_name'=>$request->type_name,
			'short_description' =>$request->short_desc,
			'title' =>$request->title,
			'content'=>$request->content,
		);
		
		if(trim($request->video_link) != ""){
			$upd_data['video_link'] = $request->video_link;
		}
		
		if(trim($icon) != ""){
			$upd_data['image'] = $icon;
		}
		 
		DB::table('articles')
			->where('id',$request->id)
			->update($upd_data); 
		
		return redirect("article");
		
	}
	
	public function deletearticle(Request $request,$id)
	{
		
		DB::table('articles')->where('id',$id)->delete();
		return redirect("article"); 
	}
	
	
	 public function contact(){
		 $con = DB::table('contact')->get();
		 return view('admin.contact',["con"=>$con]);
	}
	
	
	
	public function savecontact(Request $request)
	{
	   $image1 = $request->file('image1');
		if(isset($image1))
		{
        $image_name = time() . 'img_1.' . $image1->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image1->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image1->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		
       $image2 = $request->file('image2cont');
		if(isset($image2))
		{
        $image_name = time() . 'img_2.' . $image2->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image2->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image2->move($destinationPath, $image_name);
		$cont2image=$image_name;
		}
		
 
     $image3 = $request->file('image3cont');
		if(isset($image3))
		{
        $image_name = time() . 'img_3.' . $image3->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image3->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image3->move($destinationPath, $image_name);
		$cont3image=$image_name;
		}
		
		DB::table('contact');
		$co=new Contact();
		$co->image=$icon;
		$co->image2=$cont2image;
		$co->image3=$cont3image;
		$co->name=$request->name;
		$co->email=$request->email;
		$co->phone=$request->mobile;
		$co->address=$request->address;
		$co->day=$request->day;
		$co->time=$request->time;
		$co->googlemap=$request->googlemap;
		$co->copyright_text=$request->copyright_text;
		$co->contenttext=$request->contenttext;
		$co->contenttext2=$request->contenttext2;
		$co->contenttext3=$request->contenttext3;
		$co->main_heading_one = $request->main_heading_one??'';
		$co->main_heading_two = $request->main_heading_two??'';
		$co->main_heading_third = $request->main_heading_third??'';
		$co->main_heading_four = $request->main_heading_four??'';
		
		$co->save();
		
		return redirect("contact");
	}
	public function updatecontact(Request $r){
	    //dd($r->all());
		$image1 = $r->file('image');
		if(isset($image1) && !empty($image1) ){
		    
        $image_name = time() . '_img.' . $image1->getClientOriginalExtension();
        //dd($image_name);
        	 if(in_array($image1->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image1->getRealPath());
        		
        		 $resize_image->resize(600, 600, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
    		 }

		   $destinationPath = public_path('../uploads');
    		$image1->move($destinationPath, $image_name);
    		$icon=$image_name;
		}
		else
		{
		 $icon=$r->oldimg1;	
			
		}
		
		$image2 = $r->file('image2cont');
		if($image2)
		{
        $image_name2 = time() . '_img2.' . $image2->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image2->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name2);

		$destinationPath = public_path('../uploads');

		$image2->move($destinationPath, $image_name2);
		$icon2=$image_name2;
		}
		else
		{
		 $icon2=$r->oldimg2;	
			
		}
		
		$image3 = $r->file('image3cont');
		if($image3)
		{
        $image_name3 = time() . 'img_3.' . $image3->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image3->getRealPath());
		
		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name3);

		$destinationPath = public_path('../uploads');

		$image3->move($destinationPath, $image_name3);
		$icon3=$image_name3;
		}
		else
		{
		 $icon3=$r->oldimg3;	
			
		}
		//dd('icon',$icon,'icon2',$icon2,'icon3',$icon3);
		DB::table('contact')
        ->where('id',$r->id)
        ->update([
		'image' =>$icon,
		'image2' =>$icon2,
		'image3' =>$icon3,
		'name' =>$r->name,
		'phone' =>$r->mobile,
		'email' =>$r->email,
		'address'=>$r->address,
		'day'=>$r->day,
		'time'=>$r->time,
		'googlemap'=>$r->googlemap,
		'contenttext'=>$r->contenttext,
		'contenttext2'=>$r->contenttext2,
		'contenttext3'=>$r->contenttext3,
		'copyright_text'=>$r->copyright_text,
		'main_heading_one'=>$r->main_heading_one??'',
		'main_heading_two'=>$r->main_heading_two??'',
		'main_heading_third'=>$r->main_heading_third??'',
		'main_heading_four'=>$r->main_heading_four??'',
		'contact_form1_h1'=>$r->contact_form1_h1??'',
		'contact_form1_h2'=>$r->contact_form1_h2??'',
		'contact_form1_h3'=>$r->contact_form1_h3??'',
		'contact_form1_h4'=>$r->contact_form1_h4??'',
		'contact_form1_h5'=>$r->contact_form1_h5??'',
		'contact_form2_h1'=>$r->contact_form2_h1??'',
		'contact_form2_h2'=>$r->contact_form2_h2??'',
		'contact_form2_h3'=>$r->contact_form2_h3??'',
		'contact_form2_h4'=>$r->contact_form2_h4??'',
		]);
	
		
		return redirect("contact");
	}
	
	public function editcontact(Request $request,$id){
		 $contact = DB::table('contact')->where('id',$id)->first();
		 return view('admin.editcontact',['contact'=>$contact]);
	}
	public function deletecontact(Request $request,$id)
	{
		
		DB::table('contact')->where('id',$id)->delete();
		return redirect("contact");
	}
	
	///////CMS///////////
	
	public function templatepage(Request $request)
	{   
	    $template_one_pages=DB::table('cms')->where('templateone_content','!=','')->orderby('id','DESC')->get();
	    $blogs=Blog::where(['status'=>'1'])->get();
	    $news=News::where(['status'=>1])->get();
	    $data=['template_one_pages'=>$template_one_pages,'blogs'=>$blogs,'news'=>$news];
		return view('admin.templateone',$data);
	}
	public function templatetwo(Request $request)
	{
	    $template_two_pages=DB::table('cms')->whereNull('templateone_content')->orderby('id','DESC')->get();
	    $blogs=Blog::where(['status'=>'1'])->get();
	    $news=News::where(['status'=>1])->get();
	    $data=['template_two_pages'=>$template_two_pages,'blogs'=>$blogs,'news'=>$news];
		return view('admin.templatetwo',$data);
	}
	
	public function save_template_one(Request $r){
		$content=array();
		$counter=$r->counter;
		/* echo 'cntt ' .$counter=$r->counter; die; */
		
		$hero = $r->file('hero');
		
		if(isset($hero) && $hero){
			$image_name = time().'h.' . $hero->getClientOriginalExtension();
			$destinationPath = public_path('../uploads');
			/* $resize_image = Image::make($hero->getRealPath());
			$resize_image->resize(250, 250, function($constraint){
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$image_name);
			$destinationPath = public_path('../uploads'); */
			$hero->move($destinationPath, $image_name);
			$hero=$image_name;
			
		}else{			
			$hero = $r->file('text_video');
			if(isset($hero) && $hero){
				$video_name = time().'h.' . $hero->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$hero->move($destinationPath, $video_name);
				$hero = $video_name;
			}
		}
		
		/* echo ' hero '.$hero; */
			
		
		for($i=1;$i<=$counter;$i++){
			/* try{ */
			$image = $r->file('image'.$i);
			if(isset($image)){
				
				$image_name = time() .$i.'.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				/* $resize_image = Image::make($image->getRealPath());
				$resize_image->resize(250, 250, function($constraint){
				  $constraint->aspectRatio();
				 })->save($destinationPath.'/'.$image_name);
				$destinationPath = public_path('../uploads'); */
				$image->move($destinationPath, $image_name);
				$icon=$image_name;
			}else{			
			$hero = $r->file('text_video1');
			if(isset($hero) && $hero){
				$video_name = time().'h.' . $hero->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$hero->move($destinationPath, $video_name);
				$hero = $video_name;
			}
				
			}
			
			/* }catch(\Exception $e){
				echo ' getMessage '. $e->getMessage();
			}
			echo ' $icon '.$icon; */
			
			$path=new ImagesPath();
	    	$path->foldername="Template One CMS";
	    	/* $path->hero=$hero; */
			$path->path=$icon;
			$path->save();
			$content[]=array(
				"heading"=>$_POST['heading'.$i],
				"content"=>$_POST['content'.$i],
				"slug"=>str_slug($_POST['heading'.$i]),
				"url"=>$_POST['url'.$i]??'',
				"image"=>$icon
			);			
		}	
 		
		$cms=new CMS();
		$cms->title=$r->title;
		$cms->file_type=$r->type;
		if(isset($r->video_link)){
			$cms->video_link=$r->video_link;
		}
		$cms->template_flag=1;
		$cms->metakeywords=$r->metakeywords;
		$cms->metadescription=$r->metacontent;
		$cms->templateone_content=json_encode($content);

		$cms->blogs=json_encode($r->blogs);
		$cms->blog_status=$r->blog_status;
		$cms->news=json_encode($r->news); 
		$cms->news_status=$r->news_status;

		$cms->slug=str_slug($r->title);
		$cms->hero=$hero;
		$cms->save();
		$menu=new Dragmenu();
		$menu->label_menu=$r->title;
		$menu->parent_id=0;
		$menu->url_menu=str_slug($r->title);
		$menu->save();
		return redirect("page-title")->with('success','Page Saved!!');
	}
	
	public function editpg(Request $r, $id){
		$cms=CMS::where('id',$id)->first();
		if($cms->blog_status){
	   		$bids=json_decode($cms->blogs,true);
	   		if($bids){
	   			$data['bids']=$bids;
	   			$data['blogs']=Blog::whereIn('id',$bids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
	   	if($cms->news_status){
	   		$nids=json_decode($cms->news,true);
	   		if($nids){
	   			$data['nids']=$nids;
	   			$data['news']=News::whereIn('id',$nids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
	   	$data['blogs']=Blog::where(['status'=>'1'])->get();
	    $data['news']=News::where(['status'=>1])->get();
		$data['page']=$cms;
		// dd($data);
		return view('admin.editpg',$data);
	}
	
	
	
	
	public function save_editpg(Request $r){
		/* echo "<pre>"; print_r($r->all()); die; */
		
		
		$content=array();
		$counter=$r->counter;
		
		/* for($i=1;$i<=$counter;$i++){
			$image = $r->file('image'.$i);
			if(isset($image) && $image){
				$image_name = time() .$i.'.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$resize_image = Image::make($image->getRealPath());	
				$resize_image->resize(250, 250, function($constraint){
					$constraint->aspectRatio();
				})->save($destinationPath.'/'.$image_name);
				$destinationPath = public_path('../uploads');
				$image->move($destinationPath, $image_name);
				$icon=$image_name;
			}else{
				$icon=$_POST['oldimage'.$i];			
			}
			$hero = $r->file('hero');
			if(isset($hero) && $hero){
				$image_name = time().'h.' . $hero->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$resize_image = Image::make($hero->getRealPath());
				$resize_image->resize(250, 250, function($constraint){
				 	$constraint->aspectRatio();
				})->save($destinationPath.'/'.$image_name);
				$destinationPath = public_path('../uploads');
				$hero->move($destinationPath, $image_name);
				$hero=$image_name;
			}else{
				$hero=$r->oldimg; 
			}	
			$path=new ImagesPath();
		    $path->foldername="Template One CMS";
			$path->path=$icon;
			$path->save();
			$content[]=array(
				"heading"=>$_POST['heading'.$i],
				"content"=>$_POST['content'.$i],
				"slug"=>str_slug($_POST['heading'.$i]),
				"url"=>$_POST['url'.$i]??'',
				"image"=>$icon
			);					
		}	 */
		
	
		$hero = $r->file('hero');
		
		if(isset($hero) && $hero){
			$image_name = time().'h.' . $hero->getClientOriginalExtension();
			$destinationPath = public_path('../uploads');
			$hero->move($destinationPath, $image_name);
			$hero=$image_name;
		}else{
			$hero = $r->file('text_video');
			if(isset($hero) && $hero){
				$video_name = time().'h.' . $hero->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$hero->move($destinationPath, $video_name);
				$hero = $video_name;
			}
		}
		
		if($hero == ""){	
			$hero=$_POST['oldimg'];			
		}
		
		/* echo ' hero '.$hero;  */
		/* echo ' link '.$r->video_link; 
		
		die; */
			
		for($i=1;$i<=$counter;$i++){
			$image = $r->file('image'.$i);
			if(isset($image)){
				$image_name = time() .$i.'.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('../uploads');
				$image->move($destinationPath, $image_name);
				$icon=$image_name;	
			}else{
				$icon=$_POST['oldimage'.$i];
			}
			
			$path=new ImagesPath();
	    	$path->foldername="Template One CMS";
			$path->path=$icon;
			$path->save();
			$content[]=array(
				"heading"=>$_POST['heading'.$i],
				"content"=>$_POST['content'.$i],
				"slug"=>str_slug($_POST['heading'.$i]),
				"url"=>$_POST['url'.$i]??'',
				"image"=>$icon
			);			
		}
		 
		$cms=CMS::find($r->id);
		$cms->title=$r->title;
		$cms->file_type=$r->type??$cms->file_type;
		/* if($r->file_type=='youtube' || $r->file_type=='vimeo'){ */
		if($r->type=='youtube' || $r->type=='vimeo'){
			$cms->video_link=$r->video_link??'';
		}

		$cms->blogs=json_encode($r->blogs);
		$cms->blog_status=$r->blog_status;
		$cms->news=json_encode($r->news); 
		$cms->news_status=$r->news_status;

		$cms->hero=$hero??'';
		$cms->metakeywords=$r->metakeywords;
		$cms->metadescription=$r->metacontent;
		$cms->templateone_content=json_encode($content);
		try{
			$cms->save();
			return redirect("editpagett/".$r->id)->with('success','Updated Successfully!!');
		}catch(\Exception $e){
			return back()->with('error',$e->getMessage());
		}
		
	}
	public function save_template_two(Request $r){
		/* $hero = $r->file('hero'); */
		
			
		$image_chk = $r->file('hero');
		$video_chk = $r->file('text_video');
		//$file='';
		if($video_chk){
		 $hero = $r->file('text_video');   
		}
		if($image_chk){
		$hero = $r->file('hero');
		}
		
		if(isset($hero)){
			$image_name = time().'h.' . $hero->getClientOriginalExtension();
			$destinationPath = public_path('../uploads');
			if($image_chk){
				$resize_image = Image::make($hero->getRealPath());	
				$resize_image->resize(250, 250, function($constraint){
					$constraint->aspectRatio();
				})->save($destinationPath.'/'.$image_name);
				$destinationPath = public_path('../uploads');
			}
			$hero->move($destinationPath, $image_name);
			$hero=$image_name;
		}
		
		$cms=new CMS();
		$cms->title=$r->title;
		$cms->file_type=$r->type;
		if(isset($r->video_link)){
			$cms->video_link=$r->video_link;
		}
		$cms->template_flag=2;
		$cms->description=$r->description;
		$cms->metakeywords=$r->metakeywords;
		$cms->metadescription=$r->metadescription; 


		$cms->blogs=json_encode($r->blogs);
		$cms->blog_status=$r->blog_status;
		$cms->news=json_encode($r->news); 
		$cms->news_status=$r->news_status;

		$cms->slug=str_slug($r->title);
		$cms->status=$r->status;
		$cms->hero=$hero;
		$cms->save();
		$menu=new Dragmenu();
		$menu->label_menu=$r->title;
		$menu->parent_id=0;
		$menu->url_menu=str_slug($r->title);
		$menu->save();
		return redirect("templatetwo")->with('success','Page Saved!!');
	}
	
	
	public function updateslugs()
	{
		$cms=CMS::all();
		foreach($cms as $cm)
		{
			$title=$cm->title;
			$cmd=CMS::find($cm->id); 
			$cmd->slug=strtolower(implode("-",explode(" ",$title)));
			$cmd->save();
			
		}
		
		
		
	}
	
  	public function updatepage(Request $r){
        /* $hero = $r->file('hero'); */
		
			
		$image_chk = $r->file('hero');
		$video_chk = $r->file('text_video');
		if($video_chk){
		 $hero = $r->file('text_video');   
		}
		if($image_chk){
		$hero = $r->file('hero');
		}
		
        if(isset($hero) && $hero){
        	$image_name = time().'h.' . $hero->getClientOriginalExtension();
        	$destinationPath = public_path('../uploads');
			if($image_chk){
				$resize_image = Image::make($hero->getRealPath());
				$resize_image->resize(250, 250, function($constraint){
					$constraint->aspectRatio();
				})->save($destinationPath.'/'.$image_name);
				$destinationPath = public_path('../uploads');
			}
        	$hero->move($destinationPath, $image_name);
        	$hero=$image_name;
        }else{
	      	$hero=$r->oldimg;
        }
		$cms=CMS::find($r->id);
		$cms->title=$r->title;
		$cms->file_type=$r->type??$cms->file_type;
		if($r->file_type=='youtube' || $r->file_type=='vimeo'){
			$cms->video_link=$r->video_link??'';
		}
		$cms->description=$r->description;
		$cms->metakeywords=$r->metakeywords;
		$cms->hero=$hero??'';
		$cms->metadescription=$r->metadescription; 

		$cms->blogs=json_encode($r->blogs);
		$cms->blog_status=$r->blog_status;
		$cms->news=json_encode($r->news); 
		$cms->news_status=$r->news_status;

		// $cms->slug=str_slug($r->title);
		$cms->status=$r->status;
		try{
			$cms->save();
			return redirect("editpage/".$r->id)->with('success','Updated Successfully!!');
		}catch(\Exception $e){
			return back()->with('error',$e->getMessage());
		}		
	}
	
	public function update_page_status($id,$id2)
	{
		if($id==1)
		{
			$status='1';
		}
		else{
			$status='0';
		}
		$cms=CMS::find($id2); 		
		$cms->status=$status;
		$cms->save();
		
		$menu=CMS::where('id',$id2)->first();
		$slug=$menu->slug;
		
		Dragmenu::where('url_menu',$slug)
       ->update([
           'status' =>$id
        ]);
		return redirect()->back()->with("success","Page Status has been changed.");
		
	}
		
	public function view_pages(Request $request)
	{ 
		$pages=DB::table('cms')->get();
		return view('admin.viewpages',['pages'=>$pages]);
	}
		
	public function editpage(Request $request,$id){
		$cms=CMS::where('id',$id)->first();
		$contact_arr=json_decode($cms->templateone_content);
		if($cms->blog_status){
	   		$bids=json_decode($cms->blogs,true);
	   		if($bids){
	   			$data['bids']=$bids;
	   			$data['blogs']=Blog::whereIn('id',$bids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
	   	if($cms->news_status){
	   		$nids=json_decode($cms->news,true);
	   		if($nids){
	   			$data['nids']=$nids;
	   			$data['news']=News::whereIn('id',$nids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
		$data['page']=$cms;
		$data['contact_arr']=$contact_arr;
		$data['blogs']=Blog::where(['status'=>'1'])->get();
	    $data['news']=News::where(['status'=>1])->get();
		return view('admin.editpage',$data);
	}
		
	public function addlinks(Request $request)
	{
		$page=DB::table('links')->get();
		return view('admin.addlinks',['links'=>$page]);
	}
		
	public function editlinks(Request $request,$id)
	{
		$page=DB::table('links')->where('id',$id)->first();
		return view('admin.editlinks',['links'=>$page]);
	}

   public function videogallery(Request $request)
	{
		
		$vg=DB::table('videogallery')->get();
              
		return view("admin.videogallery",['vg'=>$vg]);
	}  
	public function editvideogallery(Request $request,$id)
	{
		
		$vg=DB::table('videogallery')->where('id',$id)->first();
              
		
		return view("admin.editvideogallery",['vg'=>$vg]);   
	}
	public function photogallery(Request $request)
	{
		
		$pg=DB::table('photogallery')->get();
              
		
		return view("admin.photogallery",['pg'=>$pg]);
	}
	public function editphotogallery(Request $request,$id)
	{
		
		$pg=DB::table('photogallery')->where('id',$id)->first();
              
		
		return view("admin.editphotogallery",['pg'=>$pg]);
	}

	public function savevideogallery(Request $request)
	{
		$in=new VideoGallery();
		
		$in->video=$request->youtube;
		
			$in->caption=$request->caption;
		
		$in->save();
		return redirect("videogallery");
		
		
	}
	public function updatevideogallery(Request $request)
	{
		$in=VideoGallery::find($request->id);
		
		$in->video=$request->youtube;
		
			$in->caption=$request->caption;
		
		$in->save();
		return redirect("videogallery");
		
		
	}
	public function savephotogallery(Request $request)
	{
		$image = $request->file('photo');
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(400, 400, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		
		$in=new Photogallery();
		
		$in->photo=$icon;
		$in->caption=$request->caption;
		$in->save();
		return redirect("photogallery");
		
		
	}
	public function updatephotogallery(Request $request)
	{
		$image = $request->file('photo');
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(400, 400, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		else{
			$icon=$request->oldphoto;
			
		}
		
		$in=Photogallery::find($request->id);
		
		$in->photo=$icon;
		$in->caption=$request->caption;
		$in->save();
		return redirect("photogallery");
		
		
	}	
		public function savelinks(Request $request)
	{
		
		DB::table('links')->update(['status' => '0']); 
		$sc=new Links();
		$sc->position=$request->position;
		$sc->title=$request->title;
		$sc->link=$request->link;
		$sc->status='1';
		$sc->save();
	
		return redirect("add-links");
		
	}
	
	public function deletelinks(Request $request,$id)
	{
		
		DB::table('links')
              ->where('id', $request->id)->delete();
              
		return redirect("add-links");
	}
	
	public function deletevideogalllery(Request $request,$id)
	{
		DB::table('videogallery')
              ->where('id', $request->id)->delete();
              
		return redirect("videogallery");
	}
	
	public function deletephotogallery(Request $request,$id)
	{
		
		DB::table('photogallery')->where('id',$id)->delete();
		return redirect("photogallery");
	}
	
  public function deletepage(Request $request,$id)
	{
		$get_title=CMS::where('id',$id)->select('title','slug')->first();
		DB::table('menu')->where('label_menu',$get_title->title)->where('label_menu',$get_title->slug)->delete();
		
		DB::table('cms')->where('id',$id)->delete();
		//return redirect("view-pages");
		return redirect()->back();
	}
	
	public function jobs()
	{ 
		 $job = DB::table('job')->get();
		 $company_functions = DB::table('company_function')->get();
		 $level = DB::table('level_master')->get();
		
		 return view('admin.jobadd',["job"=>$job,"company_functions"=>$company_functions,"level"=>$level]);
	}
	
	public function savejob(Request $request)
	{
		$image = $request->file('logo');
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(400, 400, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		
		$image1 = $request->file('image1');
		if(isset($image1))
		{
        $image_name = time() . 'img_1.' . $image1->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image1->getRealPath());

		 $resize_image->resize(600, 600, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image1->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		
		$sc=new Job();
		$sc->banner_image=$icon??'';
		$sc->company=$request->company;
		$sc->title=$request->title;
		$sc->slug=str_replace(" ","-",$request->company).time();
		$sc->keyword=$request->keyword;
		$sc->location=$request->location;
		$sc->company_function=$request->company_function;
		$sc->level=$request->level;
		$sc->logo=$icon;

		$sc->description=$request->description;
		$sc->responsibility=$request->responsibility;
		$sc->save();

		return redirect("viewjob");
		
	}
	public function viewjob(Request $request)
	{
		
		$jobs=DB::table('job')
            ->leftjoin('company_function', 'company_function.id', '=', 'job.company_function')
            ->leftjoin('level_master', 'level_master.id', '=', 'job.level')
            ->select('job.*', 'level_master.level_name', 'company_function.company_function')
            ->paginate(10);
		
		return view('admin.jobview',['jobs'=>$jobs]);
	}

   public function editjob(Request $request,$id)
    {
		
		 $company_functions = DB::table('company_function')->get();
		 $level = DB::table('level_master')->get();
		$editjob=Job::where('slug',$id)->first();
		
        return view('admin.editjob',['editjob'=>$editjob,'company_functions'=>$company_functions,'level'=>$level]);
    }
	
	public function updatejob(Request $request)
	{
		$image = $request->file('logo');
		if(isset($image))
		{
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../thumbnail');
        $resize_image = Image::make($image->getRealPath());
		
		 $resize_image->resize(400, 400, function($constraint){
		  $constraint->aspectRatio();
		 })->save($destinationPath . '/' . $image_name);

		$destinationPath = public_path('../uploads');

		$image->move($destinationPath, $image_name);
		$icon=$image_name;
		}
		else{
			$icon=$request->oldlogo;
		}
		
		
		$image1 = $request->file('image1');
		if(isset($image1) && !empty($image1) )
		{

        $image_name = time() . '_img.' . $image1->getClientOriginalExtension();
        //dd($image_name);
        	 if(in_array($image1->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image1->getRealPath());

        		 $resize_image->resize(600, 600, function($constraint){
        		  $constraint->aspectRatio();
        		 })->save($destinationPath . '/' . $image_name);
    		 }

		   $destinationPath = public_path('../uploads');
    		$image1->move($destinationPath, $image_name);
    		$icon=$image_name;
		}
		else
		{
		 $icon=$request->oldimg1;

		}
		
		$ujob=Job::find($request->id);
		
		$ujob->banner_image=$icon??'';
		$ujob->company=$request->company;
		$ujob->title=$request->title;
		$ujob->keyword=$request->keyword;
		$ujob->location=$request->location;
		$ujob->company_function=$request->company_function;
		$ujob->level=$request->level;
		$ujob->description=$request->description;
		$ujob->responsibility=$request->responsibility;
		$ujob->save();
		return redirect("viewjob");
	}
	
	 public function deletejob(Request $request,$id)
	{
		DB::table('job')->where('id',$id)->delete();
		return redirect("viewjob");
	}
	
	public function viewapplyjob(Request $request)
	{
		$applyjob=DB::table('jobapply')->get();
		return view('frontend.job_details',['applyjob'=>$applyjob]);
	}
	
	 public function deleteapplyjob(Request $request,$id)
	{
		DB::table('jobapply')->where('id',$id)->delete();
		return redirect("viewapplyjob");
	}
	
	
	public function viewcontactform3(Request $request)
	{		
	    $contact_data=DB::table('contact_us3')->select('contact_us3.*')
            ->get();
		return view('admin.view_contact_form3',['contact_data'=>$contact_data]);
	}
	
	public function deleteContactForm3(Request $request,$id)
	{
		DB::table('contact_us3')->where('id',$id)->delete();
		return redirect("view-contact-us-form3");
	}
	
	public function viewSalesContactform(Request $request)
	{		
	    $sales_contact_data=DB::table('sales_contact_us')->select('sales_contact_us.*')
            ->get();
		return view('admin.view_sales_contact_us',['sales_contact_data'=>$sales_contact_data]);
	}
	
	public function deleteSalescontactform(Request $request,$id)
	{
		DB::table('sales_contact_us')->where('id',$id)->delete();
		return redirect("view-sales-contact-us-form");
	}
	
	 public function socialMediaLink()
 {
	  $media_link=SocialMediaLink::where("id",'!=','')->orderby('id','ASC')->first();
	  
	  return view('admin.social_media_link',['media_link'=>$media_link]);
	 
 }
 
 public function updateSocialMediaLink(Request $request)
 {
	 $mediaLink=SocialMediaLink::find(1);
	 $mediaLink->facebook_link=$request->facebook_link;
	 $mediaLink->facebook_status=$request->facebook_status;
	 $mediaLink->instagram_link=$request->instagram_link;
	 $mediaLink->instagram_status=$request->instagram_status;
	 $mediaLink->pinterest_link=$request->pinterest_link;
	 $mediaLink->pinterest_status=$request->pinterest_status;
	 $mediaLink->snapchat_link=$request->snapchat_link;
	 $mediaLink->snapchat_status=$request->snapchat_status;
	 $mediaLink->youtube_link=$request->youtube_link;
	 $mediaLink->youtube_status=$request->youtube_status;
	 $mediaLink->save();
	 return redirect()->back()->with("success","social Media Link Settings Updated.");
 }
 
 	public function FooterTextSetting(){
	  $footer_text=footerMenuText::where("id",'!=','')->orderby('id','ASC')->first();
	  return view('admin.change_footer_menu_text',['footer_text'=>$footer_text]); 
 	}
 
 	public function updateFooterTextSetting(Request $r){
     $get_text=footerMenuText::where('id',1)->first();
     //dd($get_text->footer_one);
     DB::table('footer_menu')->where('position',$get_text->footer_one)->update(['position' => $r->footer_one]);
     DB::table('footer_menu')->where('position',$get_text->footer_two)->update(['position' => $r->footer_two]);
     DB::table('footer_menu')->where('position',$get_text->footer_third)->update(['position' => $r->footer_third]);
     DB::table('footer_menu')->where('position',$get_text->footer_four)->update(['position' => $r->footer_four]);
	 $textdata=footerMenuText::find(1);
	 $textdata->footer_one=$r->footer_one;
	 $textdata->footer_two=$r->footer_two;
	 $textdata->footer_third=$r->footer_third;
	 $textdata->footer_four=$r->footer_four;
	 $textdata->home_page_h1=$r->home_page_h1;
	 $textdata->home_page_h2=$r->home_page_h2;
	 $textdata->home_page_h3=$r->home_page_h3;
	 $textdata->home_page_h4=$r->home_page_h4;
	 $textdata->save();
	 return redirect()->back()->with("success","change footer menu text Settings Updated.");
 }
 
 
 
 	 public function emailConfigrationSetting()
 {
	  $email_setting=emailConfigurationSetting::where("id",'!=','')->orderby('id','ASC')->first();
	  return view('admin.change_email_setting',['email_setting'=>$email_setting]);
	 
 }
 
 public function updateEmailConfigrationSetting(Request $request)
 {   
     if($request->email_configration || $request->job_receiver_email){
	 $textdata=emailConfigurationSetting::find(1);
	 $textdata->send_email_configration=$request->email_configration;
	 $textdata->job_receiver_email=$request->job_receiver_email;
	 $textdata->save();
	 return redirect()->back()->with("success","change send email configuration Updated.");
     }else{
      return redirect()->back()->with("success","blank field not allowed.");   
     }
 }
 
 public function emailContentSetting()
 {
	  $email_content=emailConfigurationSetting::where("id",'!=','')->orderby('id','ASC')->first();
	  return view('admin.change_right_icon_email_content',['email_content'=>$email_content]);
	 
 }
 
 public function updateEmailContentSetting(Request $request)
 {
	 $textdata=emailConfigurationSetting::find(1);
	 $textdata->email_title=$request->email_title??'';
	 $textdata->email_main_content=$request->email_main_content??'';
	 $textdata->industrial_title=$request->industrial_title??'';
	 $textdata->industrial_email=$request->industrial_email??'';
	 $textdata->process_title=$request->process_title??'';
	 $textdata->process_email=$request->process_email??'';
	 $textdata->metal_title=$request->metal_title??'';
	 $textdata->metal_email=$request->metal_email??'';
	 $textdata->footer_title=$request->footer_title??'';
	 $textdata->footer_content=$request->footer_content??'';
	 $textdata->save();
	 return redirect()->back()->with("success","Update Email content setting.");
 }
 
 	 public function getBannerImage()
 {
	  $banner_image = DB::table('banner_images')->where("id",'!=','')->orderby('id','ASC')->first();
	    //dd($banner_image->news_image);
	  return view('admin.banner_image_setting',['banner_image'=>$banner_image]);
	 
 }
 public function updateBannerImage(Request $request){
      $image = $request->file('blog_image');
		if(isset($image))
		{
		  $image_name = time() . '_img_.' . $image->getClientOriginalExtension(); 
            if(in_array($image->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image->move($destinationPath, $image_name);
            $icon=$image_name;
		
		}
		else
		{
		 $icon=$request->blog_old_img;	
			
		}
		
		$image1 = $request->file('article_image');
		if(isset($image1))
		{
		  $image_name = time() . '_img1_.' . $image1->getClientOriginalExtension(); 
            if(in_array($image1->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image1->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image1->move($destinationPath, $image_name);
            $icon1=$image_name;
		
		}
		else
		{
		 $icon1=$request->article_old_img;	
			
		}
		
		
		$image2 = $request->file('job_image');
		if(isset($image2))
		{
		  $image_name = time() . '_img2_.' . $image2->getClientOriginalExtension(); 
            if(in_array($image2->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image2->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image2->move($destinationPath, $image_name);
            $icon2=$image_name;
		
		}
		else
		{
		 $icon2=$request->job_old_img;	
			
		}
		
		$image3 = $request->file('news_image');
		if(isset($image3))
		{
		  $image_name = time() . '_img3_.' . $image3->getClientOriginalExtension(); 
            if(in_array($image3->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image3->getRealPath());
            	 $resize_image->resize(600, 600, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image3->move($destinationPath, $image_name);
            $icon3=$image_name;
		
		}
		else
		{
		 $icon3=$request->news_old_img;	
			
		}
		
		
		/*site logo*/
			$image4 = $request->file('site_logo');
		if(isset($image4))
		{
		  $image_name = time() . '_img4_.' . $image4->getClientOriginalExtension(); 
            if(in_array($image4->getClientOriginalExtension(),['jpg','jpeg','png','gif'])){ 
                $destinationPath = public_path('../thumbnail');
                $resize_image = Image::make($image4->getRealPath());
            	 $resize_image->resize(120, 100, function($constraint){
            	  $constraint->aspectRatio();
            	 })->save($destinationPath . '/' . $image_name);
            } 
            $destinationPath = public_path('../uploads'); 
            $image4->move($destinationPath, $image_name);
            $icon4=$image_name;
		
		}
		else
		{
		 $icon4=$request->site_logo_old_img;	
			
		}
		
		
		
		DB::table('banner_images')
        ->where('id',$request->id)
        ->update([
		'blog_image' =>$icon??'',
		'blog_img_status' =>$request->blog_img_status??'',
		'article_image' =>$icon1??'',
		'article_img_status' =>$request->article_img_status??'',
		'job_image' =>$icon2??'',
		'job_img_status' =>$request->job_img_status??'',
		'news_image' =>$icon3??'',
		'news_img_status' =>$request->news_img_status??'',
		'site_logo' =>$icon4??'',
		'site_logo_status' =>$request->site_logo_status??'',
		
		]);
		
		return redirect("add-banner-images")->with("success","Banner image  Settings Updated.");
 }
 
 
 
 	public function getContactFormOption(){
    	$data['options']=ContactFormOption::where('parent_id',0)->orderby('id','desc')->get();
		return view('admin.contact_option_content',$data);
	}
	public function getSubContactFormOption($id){
    	$data['options']=ContactFormOption::where('parent_id',$id)->orderby('id','desc')->get();
    	$data['parent_id']=$id;
    	$data['parent']=ContactFormOption::find($id);
     	return view('admin.subcat-contact-option',$data);
	}	
	public function saveContactFormOptionu(Request $r){
		if($r->id){
			$fm=ContactFormOption::find($r->id);
		}else{
			$fm=new ContactFormOption();
		}
		$fm->contact_position=$r->contact_position;
		$fm->option_name=$r->option_name;
		$fm->parent_id=isset($r->parent_id)?$r->parent_id:0;
		$fm->save();
		return redirect()->back();
	}
	public function editContactFormOption(Request $r){
		$detail=ContactFormOption::find($r->id);
		if($detail){
			return array('status'=>1,'data'=>$detail,'message'=>'Get');
		}
		return array('status'=>0,'message'=>'Not Get');
	}
	public function deleteContactFormOption($id){
		$fm=ContactFormOption::find($id);
		$fm->delete();
		return redirect()->back();
	}
	/*country function*/
	
	
 public function getCountry($id ='')
	{
		
            $get_all_country=Country::where('id','!=','')->get();
            $getCountryArr=[];
            if($id>0){
               $getCountryArr=Country::where('id',$id)->first();  
            }
		 return view('admin.country',['getCountryArr'=>$getCountryArr,'get_all_country'=>$get_all_country]);
	}
	
	public function saveCountry(Request $request)
	{
		if($request->id)
		{
		
		$data=Country::find($request->id);
		$data->country_name=$request->country_name;
		$data->save();
			
			$msg="Country Updated.";
		}
		else{
		$data=new Country();
		$data->country_name=$request->country_name;
		$data->status=1;
		$data->save();
		$msg="Country inserted.";
		}
		//return redirect()->back();
			return redirect("add-country")->with("success",$msg);
		
	}
		
	public function deleteCountry($id)
	{
		
		$fm=Country::find($id);
		$fm->delete();
		return redirect("add-country");
		
	}
	
	/*position function*/
	
	
	
 public function getPosition($id ='')
	{
		
            $get_all_position=Position::where('id','!=','')->get();
            $getPositionArr=[];
            if($id>0){
               $getPositionArr=Position::where('id',$id)->first();  
            }
		 return view('admin.position',['getPositionArr'=>$getPositionArr,'get_all_position'=>$get_all_position]);
	}
	
	public function savePosition(Request $request)
	{
		if($request->id)
		{
		
		$data=Position::find($request->id);
		$data->position_name=$request->position_name;
		$data->save();
			
			
		}
		else{
		$data=new Position();
		$data->position_name=$request->position_name;
		$data->status=1;
		$data->save();
		}
		return redirect("add-position");
		
	}
		
	public function deletePosition($id)
	{
		
		$fm=Position::find($id);
		$fm->delete();
		return redirect("add-position");
		
	}
	public function getBlogNews(Request $r){
		if(isset($r->term) && $r->term){
	 		$tagsdata=array();
	 		if($r->type=='blog'){
	 			$values=Blog::where('title','like','%'.$r->term.'%')->take(20)->get();
	 		}elseif($r->type=='news'){
	 			$values=News::where('title','like','%'.$r->term.'%')->take(20)->get();
	 		}else{
	 			return array('status'=>0,'message'=>'Not Exists!');
	 		}
	 		if($values->count()){
				foreach($values as $data){
					$tag=array();
					$tag['id']=$data->id;//$data->title;
					$tag['text']=$data->title;	
					$tagsdata[]=$tag;
				}
				return array('status'=>1,"data"=>$tagsdata);
			}else{
				return array('status'=>0,'message'=>'Tags not Exists!');
			}

	 		return array('status'=>1,'data'=>'Type Not Exists or Incorrect!');
	 	}else{
	 		return array('status'=>0,'message'=>'Type Not Exists or Incorrect!');
	 	}
	}
	
	public function title_manager(){
	    $fetch_data = Title::all();
	   return view('admin.title_manager',compact('fetch_data'));
	    
	}
	public function create_title_manager(Request $request){
	   $data = new Title();
	   $data->title_name = $request->title;
	   $data->status = '0';
	   $data->save();
	   return redirect('/title_manager');
	}
		public function delete_title($id){
	    $data = Title::find($id);
	    $data->delete();
	    return redirect('/title_manager');
	}

	public function update_title(Request $request,$id){
	    $data = Title::find($id);
	    $data->title_name = $request->name;
	    $data->update();
	    return redirect('/title_manager');
	}
	public function edit_title($id){
	   $data = Title::find($id);
	   return view('admin.edit_title',compact('data'));
	}
	
	public function active_title($id){
	    $title_data = Title::all();
	    
	    foreach($title_data as $cap){
	        
	        $cap->status = "0";
	        $cap->update();
	       
	    }
	    $data = Title::find($id);
	    $data->status = "1";
	    $data->update();
	     return redirect('/title_manager');
	}
	public function deactive_title($id){
	    
	    $data = Title::find($id);
	    $data->status = "0";
	    $data->update();
	     return redirect('/title_manager');
	}
	
	public function singin_form(){
	    $data = SignIn::all();
	    return view('admin.signinform',compact('data'));
	}
	public function signform_template(Request $request){
	    $data = new SignIn();
	    $data->heading1 = $request->heading1;
	    $data->heading2 = $request->heading2;
	    $data->content1 = $request->contant1;
	    $data->content2 = $request->contant2;
	    
	     if($request->hasFile('image1'))
        {
            $image = $request->file('image1');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            if($exploded[0] == 'image'){
                $fileName = Str::random(12) . '.' .$extension;
                $location = base_path().'/images/gallery/' .$fileName;

                file_put_contents($location, File::get($image));
                $file_type = $exploded[0];
                $file_name = '/images/gallery/' .$fileName;

                $data->background = $file_name;
            }else{
                return redirect()->back()->with('error', 'Please Upload an Image');
            }
        }
        $data->save();
       return redirect('/signin_page_manager');
        

	   // return $request->all();
	}
	public function edit_singin(Request $request,$id){
	    $data = SignIn::where('id',$id)->first();
	    return view('admin.edit_singin',compact('data'));
	    
	}
	public function update_signin(Request $request,$id){
	$data = SignIn::find($id);
	$data->heading1 = $request->heading1;
	$data->heading2 = $request->heading2;
	$data->content1 = $request->contant1;
	$data->content2 = $request->contant2;
	 if($request->hasFile('image1'))
        {
            $image = $request->file('image1');
            $type = $image->getClientMimeType();
            $extension = $image->getClientOriginalExtension();
            $exploded = explode('/', $type);
            if($exploded[0] == 'image'){
                $fileName = Str::random(12) . '.' .$extension;
                $location = base_path().'/images/gallery/' .$fileName;

                file_put_contents($location, File::get($image));
                $file_type = $exploded[0];
                $file_name = '/images/gallery/' .$fileName;

                $data->background = $file_name;
            }else{
                return redirect()->back()->with('error', 'Please Upload an Image');
            }
        }
        $data->update();
       return redirect('/signin_page_manager');
	}
	public function delete_singin($id){
	    $data = SignIn::find($id);
	    $data->delete();
	    return redirect('/signin_page_manager');
	    
	}
	public function active_singin($id){
	   
	     $title_data = SignIn::all();
	    foreach($title_data as $cap){
	        $cap->status = "0";
	        $cap->update();
	    }
	    $data = SignIn::find($id);
	    $data->status = "1";
	    $data->update();
	    return redirect('/signin_page_manager');
	}
		public function deactive_singin($id){
	    $data = SignIn::find($id);
	    $data->status = "0";
	    $data->update();
	    return redirect('/signin_page_manager');
	    
	}

		
}
