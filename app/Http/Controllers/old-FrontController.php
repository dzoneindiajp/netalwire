<?php
namespace App\Http\Controllers;
use DB;
//use Mail; 
use App\Block1;
use App\Title;
use App\Caption;
use App\Block2;
use App\Slidertext;
use App\Block3;
use App\Block4;
use App\OurProducts;
use App\News;
use App\Articles;
use App\Contact;
use App\Job;
use App\Jobapply;
use App\Dragmenu;
use App\CMS;
use App\Blog;
use App\Country;
use App\Position;
use App\emailConfigurationSetting;
use Image;
use PDF;
use League\Flysystem\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\ContactFormOption;
use App\footerMenuText;

class FrontController extends Controller{
   
   	public function index(){
		$data['homeblock']= DB::table('block1')->where('status','0')->get();
		$data['slidertext']= DB::table('slider_text')->get();
		$data['aboutblock']= DB::table('block2')->where('status','1')->first();
		$data['ourblock']= DB::table('block3')->where('status','1')->orderBy('position','asc')->get();
		$data['block']= DB::table('block4')->where('status','1')->orderby('position','asc')->get();
		$data['ourproduct']= DB::table('ourproduct')->where('status','1')->orderby('position','asc')->get();
		$data['news']= News::where(['is_home'=>1,'status'=>'1'])->orderby('id','desc')->take(3)->get();
		$data['blogs']= Blog::where(['is_home'=>1,'status'=>'1'])->orderby('id','desc')->take(3)->get();
		$data['articles']        = DB::table('articles')->where('status','1')->get();
		$data['contact']         = DB::table('contact')->orderBy('id')->first(); 
		$data['heading']=footerMenuText::first();
		return view('home',$data);
    }
	
	public function search_data(Request $request)
	{
		$html=array();
		$homeblock       = DB::table('block1')->where('status','1')->get();
		$aboutblock      = DB::table('block2')->where('status','1')->first();
		$ourblock        = DB::table('block3')->orderBy('position','asc')->get();
		$block           = DB::table('block4')->orderby('position','asc')->get();
		$ourproduct      = DB::table('ourproduct')->orderby('position','asc')->get();
		$new             = News::orderby('id','asc')->get();
		$articles        = DB::table('articles')->where('status','1')->get();
		$contact         = DB::table('contact')->orderBy('id')->first();
		
		/*$search=DB::table('cms')
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->get();*/
                
                /*$search=DB::table('cms')
                ->where('title', 'like', $request->search.'%')
                ->orWhere('description', 'like', $request->search.'%')
                ->get();*/
                
                $search=  Dragmenu::join('cms','menu.url_menu','=','cms.slug')
				   ->select('menu.*','cms.*')
				   ->where('menu.status','1')
				   ->where('cms.title', 'like', $request->search.'%')
                    ->orWhere('cms.description', 'like', $request->search.'%')->get();
				
				
		if(count($search)>=1)
		{
			$html[]=array(
			"title"=>'CMS',
			"data"=>$search			
			);			
		}
		
		/*$articles=DB::table('articles')
                ->where('short_description', 'like', '%'.$request->search.'%')
                ->orWhere('title', 'like', '%'.$request->search.'%')
                ->orWhere('content', 'like', '%'.$request->search.'%')
                ->get();*/
                $articles=DB::table('articles')
                ->where('short_description', 'like', $request->search.'%')
                ->orWhere('title', 'like', $request->search.'%')
                ->orWhere('content', 'like', $request->search.'%')
                ->get();
				
		if(count($articles)>=1)
		{
			$html[]=array(
			"title"=>'Article',
			"data"=>$articles			
			);			
		}

	/*$block2=DB::table('block2')
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('about_content', 'like', '%'.$request->search.'%')
                ->get();*/
                $block2=DB::table('block2')
                ->where('title', 'like', $request->search.'%')
                ->orWhere('about_content', 'like', $request->search.'%')
                ->get();
				
		if(count($block2)>=1)
		{
			$html[]=array(
			"title"=>'Block2',
			"data"=>$block2			
			);			
		}
	/*$block3=DB::table('block3')
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('about_content', 'like', '%'.$request->search.'%')
                ->get();*/
                $block3=DB::table('block3')
                ->where('title', 'like', $request->search.'%')
                ->orWhere('about_content', 'like', $request->search.'%')
                ->get();
				
		if(count($block3)>=1)
		{
			$html[]=array(
			"title"=>'Block3',
			"data"=>$block3			
			);			
		}	
/*	$block4=DB::table('block4')
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->get();*/
                
        $block4=DB::table('block4')
                ->where('title', 'like', $request->search.'%')
                ->orWhere('description', 'like', $request->search.'%')
                ->get();
				
		if(count($block4)>=1)
		{
			$html[]=array(
			"title"=>'Block4',
			"data"=>$block4			
			);			
		}	
	/*$blogs=DB::table('blogs')
                ->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->get();*/
                
                $blogs=DB::table('blogs')
                ->where('title', 'like', $request->search.'%')
                ->orWhere('description', 'like', $request->search.'%')
                ->get();
				//dd($blogs);
		if(count($blogs)>=1)
		{
			$html[]=array(
			"title"=>'Blog',
			"data"=>$blogs			
			);			
		}	
		
		
	/*$job=DB::table('job')
                ->where('company', 'like', '%'.$request->search.'%')             
                ->orWhere('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->orWhere('responsibility', 'like', '%'.$request->search.'%')
                ->get();*/
                
                $job=DB::table('job')
                ->where('company', 'like', $request->search.'%')             
                ->orWhere('title', 'like', $request->search.'%')
                ->orWhere('description', 'like', $request->search.'%')
                ->orWhere('responsibility', 'like', $request->search.'%')
                ->get();
                
				
		if(count($job)>=1)
		{
			$html[]=array(
			"title"=>'Jobs',
			"data"=>$job			
			);			
		}			
	/*$news=News::where('title', 'like', '%'.$request->search.'%')
                ->orWhere('description', 'like', '%'.$request->search.'%')
                ->get();*/
    $news=News::where('title', '=', $request->search)
    ->orWhere('description', '=', $request->search)
    ->get();
				
		if(count($news)>=1)
		{
			$html[]=array(
			"title"=>'News',
			"data"=>$news			
			);			
		}		
	
	return view('frontend.search_data',['homeblock'=>$homeblock,'aboutblock'=>$aboutblock,'ourblock'=>$ourblock,'block'=>$block,'ourproduct'=>$ourproduct,'new'=>$new,'articles'=>$articles,'contact'=>$contact,'search'=>$search,'html'=>$html]);
		
		
	}
	
	public function pagedata(Request $r,$slug){
	   	$data['contact']= DB::table('contact')->orderBy('id')->first();
	   	$data['cms']=$cms=CMS::where('slug',$slug)->first();
	   	$data['slug']=$slug;
	   	$data['blogs']=$data['news']='';
	   	if($slug == "cases-&-articles"){
	   	    $data['blogs'] = Articles::where('status','1')->get();
	   	}
	   	if($slug == "latest-at-bvk"){
	   	    $data['blogs'] = News::where('status','1')->orderBy('id','desc')->get();
	   	}
	   	if($slug == "career-at-bvk"){
	   	    $data['blogs'] = Job::where('status','1')->orderBy('id','desc')->get();
	   	}
        if($slug == "njkc-foundation"){
            
        }
	   	if(!$cms){
	   		return redirect('/')->with('error','Detail Not Exist');
	   	}
	   	if($cms->blog_status){
	   		$bids=json_decode($cms->blogs,true);
	   		if($bids){
	   			$data['blogs']=Blog::whereIn('id',$bids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
	   	if($cms->news_status){
	   		$nids=json_decode($cms->news,true);
	   		if($nids){
	   			$data['news']=News::whereIn('id',$nids)->orderBy('id','desc')->take(3)->get();
	   		}
	   	}
	   	if($cms->templateone_content!=''){
	   		return view('frontend.template_one',$data);
	   	}else{   
		 	return view('frontend.template_two',$data);  
	   	}
	}
	public function news_detail($id)
	{
	   $news_data  = News::where('id',$id)->where('status','1')->orderBy('id')->first();
	   $banner_images  = DB::table('banner_images')->where('id',1)->first();
	   //dd($banner_images);
	   return view('frontend.news_detail',['news_data'=>$news_data,'banner_images'=>$banner_images]);
	}
	public function news(Request $r){
	   $data['news']=$news= News::where('status','1')->orderBy('id','desc')->paginate(15);
	   $data['banner_image']=$banner_images  = DB::table('banner_images')->where('id',1)->first();
	   //['news'=>$news,'banner_image'=>$banner_images]
	   return view('frontend.news',$data);
	}
   	public function blogs(Request $request){
    	$blogs    = Blog::where('status','1')->orderBy('id','desc')->paginate(15); 
    	$banner_images  = DB::table('banner_images')->where('id',1)->first();
        return view('frontend.blogs',['blogs'=>$blogs,'banner_images'=>$banner_images]);
   	}
    public function blog_detail($slug){
        $blogs    =   DB::table('blogs')->where('status','1')->orderBy('id')->get(); 
        $banner_images  = DB::table('banner_images')->where('id',1)->first();
	    $blog =  DB::table('blogs')->where('slug',$slug)->where('status','1')->orderBy('id')->first();  
	    return view('frontend.blog_detail',['blog'=>$blog,'blogs'=>$blogs,'banner_images'=>$banner_images]);  
    } 
   	public function search(Request $request){
	$contact  = DB::table('contact')->orderBy('id')->first();
	//$job = Job::where('job.status','1')->get();
    $job    =  Job::leftjoin('company_function','job.company_function','=','company_function.id')
	               ->leftjoin('level_master','job.level','=','level_master.id')
				   ->select('job.*','company_function.company_function','level_master.level_name')
				   ->where('job.status','1')->get();
	
	$company_functions = DB::table('company_function')->get();
	$level = DB::table('level_master')->get();
	 
	  if($request->keyword!='' && $request->location!='' && $request->company_function!='' && $request->level!='')
	 {
		 $job = Job::where('keyword','LIKE','%'.$request->keyword.'%')->get();
		 
	 }
	 
	 if($request->keyword!='' && $request->location=='')
	 {
		 $job = Job::where('status','1')->where('keyword','LIKE','%'.$request->keyword.'%')->orWhere('title','LIKE','%'.$request->keyword.'%')->get();
		 //dd($job);
		 
	 } 
	 if($request->keyword=='' && $request->location!='')
	 {
		 $job = Job::where('location','LIKE','%'.$request->location.'%')->where('status','1')->get();
		 
	 } 
	 if($request->keyword!='' && $request->location!='')
	 {
		 $job = Job::where('status','1')->where('location','LIKE','%'.$request->location.'%')->where('keyword','LIKE','%'.$request->keyword.'%')->orWhere('title','LIKE','%'.$request->keyword.'%')->get(); 
	 } 
	 
	 $level_selected='';
	 $company_function_select='';
	 $banner_images  = DB::table('banner_images')->where('id',1)->first();
    return view('frontend.search',['job'=>$job ,'contact'=>$contact,'company_functions'=>$company_functions,'level'=>$level,'company_select'=>$company_function_select,'level_selected'=>$level_selected,'keyword'=>$request->keyword,'location'=>$request->location,'company'=>'','banner_images'=>$banner_images]);
	   
   }
    public function filterjob(Request $request)
    {
		 $contact  = DB::table('contact')->orderBy('id')->first();
		 
        /*$job    =  Job::leftjoin('company_function','job.company_function','=','company_function.id')
	               ->leftjoin('level_master','job.level','=','level_master.id')
				   ->select('job.*','company_function.company_function','level_master.level_name')
				   ->where('job.status','1')->get();
	
		 if($request->title!='' || $request->location!='' || $request->date!='' || $request->company_function!='' ||  $request->level!='')
		 {
			 $job = Job::join('company_function','job.company_function','=','company_function.id')
	               ->join('level_master','job.level','=','level_master.id')
				   ->select('job.*','company_function.company_function','level_master.level_name')
				   ->where('job.status',1)
				   ->where('job.title','LIKE','%'.$request->title.'%')
        		   ->orWhere('job.location','LIKE','%'.$request->location.'%')->where('job.status',1)
        		   ->orWhere('job.company_function',$request->company_function)->where('job.status',1)
        		   ->orWhere('job.company_function',$request->company_function)->where('job.status',1)
        		   ->orWhere('job.level',$request->level)->where('job.status',1)
				   ->orWhere('job.company_function',$request->company_function)->where('job.status',1)
				   ->get(); 
		 }*/
		        $job =  Job::leftjoin('company_function','job.company_function','=','company_function.id')
    	               ->leftjoin('level_master','job.level','=','level_master.id')
    				   ->select('job.*','company_function.company_function','level_master.level_name')
    				   ->where('job.status','1');
                if($request->company!=''){
                $job  = $job->where('job.company','LIKE','%'.$request->company.'%');
                }
                if($request->title!=''){
                $job  = $job->where('job.title','LIKE','%'.$request->title.'%');
                }
                if($request->location!=''){
                $job  = $job->where('job.location','LIKE','%'.$request->location.'%');
                }
                $company_function_select='';
                if($request->company_function!=''){
                    $company_function_select=$request->company_function;
                $job  = $job->where('job.company_function',$request->company_function);
                }
                $level_selected='';
                if($request->level!=''){
                    $level_selected=$request->level;
                $job  = $job->where('job.level',$request->level);
                }
             $job = $job->get();
         
            //dd($company_function_id,$job);
	        
	        
	        $company_functions = DB::table('company_function')->get();
	        
	        $level = DB::table('level_master')->get();
	        
	        return view('frontend.search',['job'=>$job ,'contact'=>$contact,'company_functions'=>$company_functions, 'company_select'=>$company_function_select,'level'=>$level,'level_selected'=>$level_selected,'keyword'=>$request->title,'location'=>$request->location,'company'=>$request->company]);
	   
   }
   
    public function search_detail($id)
     {
	  $contact =  DB::table('contact')->orderBy('id')->first(); 
	  $jobs    =  Job::leftjoin('company_function','job.company_function','=','company_function.id')
	               ->leftjoin('level_master','job.level','=','level_master.id')
				   ->select('job.*','company_function.company_function','level_master.level_name')
				   ->where('job.slug',$id)->where('job.status','1')->get();
	  //Job::where('slug',$id)->get();
	 $banner_images  = DB::table('banner_images')->where('id',1)->first();
	  return view('frontend.search_detail',['jobs'=>$jobs ,'contact'=>$contact,'banner_images'=>$banner_images]);	 
	   
   }
   
    public function contact(Request $r){
		/* if(mail('rohiitkothari', 'testing mail', 'this is a test mail.')){
			echo 'hihii'; 
		}else{
			echo 'byyyee';
		}
		
		
		die('scaasccac'); */
		
		
	 	$contact = DB::table('contact')->orderBy('id')->first();
	 	$contact_one = ContactFormOption::where(['contact_position'=>'position_one','parent_id'=>0])->get();
	 	$contact_two = ContactFormOption::where(['contact_position'=>'position_two','parent_id'=>0])->get();
	 	// $contact_third = ContactFormOption::where(['contact_position'=>'position_third','parent_id'=>0])->get();
	 	$country = DB::table('mst_country')->where('status','=',1)->get();
	 	$position = DB::table('mst_position')->where('status','=',1)->get();
	 	$data=['contact'=>$contact,'contact_one'=>$contact_one,'contact_two'=>$contact_two,'country'=>$country,'position'=>$position];
	 	return view('frontend.contact',$data);	 
    }
	 
	 
	 
	 public function applyjob(Request $request)
	 {
		$request->validate([
            'image' => 'required|mimes:pdf,xlx,csv|max:20048',
        ]);
  
        $fileName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('../uploads'), $fileName);
   
		$query=Job::where('id',$request->id)->first();
		
		//DB::table('jobapply');
		$aj=new Jobapply();
		$aj->job_id=$request->id;
		$aj->name=$request->name;
		$aj->email=$request->email;
		$aj->phone=$request->phone;
		$aj->image=$fileName;
		$aj->description=$request->description;
		
		$aj->save(); 
		 
		 /*$data = array(  
                'name' =>$request->name,
                'job' =>$query->title,                
                'email' =>$request->email,
                'phone' =>$request->phone,
                'job' =>$query->title,
                'description' =>$request->description                
              );
				$file='../uploads/'.$fileName;		 
		 Mail::send('applicationemail', $data, function($messages) use ($data,$file) {
				$messages->from('info@bvkgroup.com','BVK Group');
				$messages->subject("New Job Applicatoin"); 
				$messages->to('manishprajapati8533@gmail.com');
				//$messages->to('kumarbrijesh234@gmail.com');
				 $messages->attach($file);
				
			}); */
		
		return redirect("job-applied/".$request->id);
	 }
	 
	 
	 public function applied($slug)
	 {
	    $contact  = DB::table('contact')->orderBy('id')->first();
	    $job      =Job::where('id',$slug)->first();
	      return view('frontend.applied',['job'=>$job,'contact'=>$contact]);
		 
	 }
	 public function processing()
	 {
	    $contact  = DB::table('contact')->orderBy('id')->first();
	   return view('frontend.template_two',['contact'=>$contact]);
		 
	 }
	 public function saveContact3Process(Request $r)
    {
        //dd($r->all());
        
        $valid=Validator::make($r->all(),[
            "name"=>'required',
            "email"=>'required|email',
            "mobile"=>'required|numeric|digits:10',
       ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','message'=>$valid->errors()->first()]);
       }else{
       	$exist=DB::table('contact_us3')->where([
                "purpose_of_contact"=>$r->purpose_of_contact,
                "area_interest"=>(isset($r->business_sales_area_interest) && $r->business_sales_area_interest)?$r->business_sales_area_interest:'',
                "name"=>$r->name,
                "email"=>$r->email,
                "mobile"=>$r->mobile,
                "country"=>$r->country2,
                "message"=>$r->message])->first();
       	if($exist){
       		return response()->json(['status'=>'error','message'=>'Already Saved']);
       	}
            $arr=[
                "purpose_of_contact"=>$r->purpose_of_contact,
                "area_interest"=>(isset($r->business_sales_area_interest) && $r->business_sales_area_interest)?$r->business_sales_area_interest:'',
                "name"=>$r->name,
                "email"=>$r->email,
                "mobile"=>$r->mobile,
                "country"=>$r->country2,
                "message"=>$r->message,
                "status"=>1,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('contact_us3')->insert($arr);
			
			
            if($query){
            	$mailconfig=emailConfigurationSetting::find(1);
            	if($mailconfig->send_email_configration){
            		try {
            			$arr['to']=$mailconfig->send_email_configration;
	            		Mail::send('email.contact-us-admin', $arr, function($messages) use ($arr) {
							$messages->subject("New Contact Us Query Recieved"); 
							$messages->to($arr['to']);  
						});
            			
            		} catch (\Exception $e) {
            			// dd($e->getMessage());
            		}
            	}
            	try{
            		Mail::send('email.contact-us-user', $arr, function($messages) use ($arr) {
						$messages->subject("Contact Info Submit"); 
						/* $messages->to($arr['email']);  */
						$messages->to($arr['email']); 
					});
            	} catch (\Exception $e) {
            			
            	}
              /* Mail::send('email.contact_email_template', $arr, function($messages) use ($arr) {
				$messages->from('info@bvkgroup.com','BVK Group');
				$messages->subject("New Job Applicatoin by brijesh test"); 
				$messages->to('kumarbrijesh234@gmail.com'); 
			});*/
			
			   /*$data=['name'=>'Brijesh','mobile'=>'9999999999'];
                $user['to']='kumarbrijesh234@gmail.com';
                Mail::send('email.contact_email_template',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification ttttttttttttttttttttttt');
                });*/
                return response()->json(['status'=>'success','msg'=>"contact us successfully",'message'=>"contact us successfully"]);
            }

       }
    }
    
    public function testing(Request $r){
    	$arr=[
                "purpose_of_contact"=>'POC',
                "area_interest"=>'AOI',
                "name"=>'Naushad',
                "email"=>'naushadmalik1407@gmail.com',
                "mobile"=>'701171',
                "country"=>'co',
                "message"=>'mess',
                "status"=>1,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
    		$mailconfig=emailConfigurationSetting::find(1);
            	if($mailconfig->send_email_configration){
            		$arr['to']=$mailconfig->send_email_configration;
            		Mail::send('email.contact-us-admin', $arr, function($messages) use ($arr) {
						// $messages->from('naushadmalik1997@gmail.com','BVK Group');
						$messages->subject("New Contact Us Query Recieved"); 
						$messages->to($arr['to']);  
					});
            	}
				Mail::send('email.contact-us-user', $arr, function($messages) use ($arr) {
						// $messages->from('naushadmalik1997@gmail.com','BVK Group');
						$messages->subject("Contact Info Submit"); 
						$messages->to($arr['email']); 
						// $messages->to('kumarbrijesh234@gmail.com'); 
				});
			dd(11);
			   /*$data=['name'=>'Brijesh','mobile'=>'9999999999'];
                $user['to']='kumarbrijesh234@gmail.com';
                Mail::send('email.contact_email_template',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification ttttttttttttttttttttttt');
                });*/

    }
    
    public function getContactOption(Request $r){
    	$options=ContactFormOption::where('parent_id',$r->id)->get();
    	$html='';
    	if($options->count()){
    		foreach ($options as $key => $value) {
    			$html.='<div class="custom-control custom-radio form-group">
                     <input name="business_sales_area_interest" type="radio" class="custom-control-input" id="reuest_quote'.$value->id.'" value="'.$value->option_name.'" required>
                     <label class="custom-control-label" for="reuest_quote'.$value->id.'"> '.$value->option_name.'</label>
                  </div>';
    		}
    		return array('status'=>1,'data'=>$html,'message'=>'Get');
    	}else{
    		return array('status'=>0,'message'=>'Not Get');
    	}
    }
    
    public function saveSalesContactProcess(Request $r){
        // dd($r->all());
        
        $valid=Validator::make($r->all(),[
            "sales_name"=>'required',
            "sales_email"=>'required|email',
            "sales_phone"=>'required|numeric|digits:10',
            "sales_message"=>'required',
            "sales_company"=>'required',
       ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','message'=>$valid->errors()->first()]);
       }else{
       	$exist=DB::table('sales_contact_us')->where([
                "sales_purpose_contact"=>$r->sales_purpose_contact,
                "sales_biz_area_interest"=>(isset($r->business_sales_area_interest) && $r->business_sales_area_interest)?$r->business_sales_area_interest:'',
                "sales_message"=>$r->sales_message,
                "sales_name"=>$r->sales_name,
                "sales_email"=>$r->sales_email,
                "sales_mobile"=>$r->sales_phone,
                "sales_country"=>$r->sales_country,
                "sales_company"=>$r->sales_company,
                "sales_position"=>$r->sales_position])->first();
       	if($exist){
       		return response()->json(['status'=>'error','message'=>'Response Already Saved']);
       	}
            $arr=[
                "sales_purpose_contact"=>$r->sales_purpose_contact,
                "sales_biz_area_interest"=>(isset($r->business_sales_area_interest) && $r->business_sales_area_interest)?$r->business_sales_area_interest:'',
                "sales_message"=>$r->sales_message,
                "sales_name"=>$r->sales_name,
                "sales_email"=>$r->sales_email,
                "sales_mobile"=>$r->sales_phone,
                "sales_country"=>$r->sales_country,
                "sales_company"=>$r->sales_company,
                "sales_position"=>$r->sales_position,
                "status"=>1,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('sales_contact_us')->insert($arr);
            if($query){
                $mailconfig=emailConfigurationSetting::find(1);
            	if($mailconfig->send_email_configration){
            		try{
	            		$arr['to']=$mailconfig->send_email_configration;
						Mail::send('email.contact-us-sales-admin', $arr, function($messages) use ($arr) {
							$messages->subject("New Sales Contact Us Query Recieved"); 
							$messages->to($arr['to']);
						});
            		}catch(\Exception $e){
					/* echo "elsese"; 
					
					dd($e->getMessage());
					die; */
            		}
            	}
            	try{
					Mail::send('email.contact-us-sales-user', $arr, function($messages) use ($arr) {
							$messages->subject("Sales Contact Info Submit"); 
							$messages->to($arr['sales_email']);  
					});
				}catch(\Exception $e){
            			
            		}
               /* \Mail::send('email.contact_form3_email_template', $arr, function($messages) use ($arr) {
				$messages->from('info@bvkgroup.com','BVK Group');
				$messages->subject("New Job Applicatoin"); 
				$messages->to('kumarbrijesh234@gmail.com'); 
			});*/ 
            return response()->json(['status'=>'success','message'=>"Contact our sales team successfully" ,'msg'=>'Submit']);
            }

       }
    }
}
