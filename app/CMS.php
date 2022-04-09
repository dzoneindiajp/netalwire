<?php

namespace App;
use App\Dragmenu;
use DB;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $table = 'cms';
	
	
	public function getBreadCrumbs($slug)
	{
		$html='';
		  $breads = DB::table('menu')->where('url_menu',$slug)->first();
		        //dd($breads);
			/*$breads=  Dragmenu::join('cms','menu.url_menu','=','cms.slug')
				   ->select('menu.*','cms.slug','cms.title')
				   ->where('menu.url_menu',$slug)->where('menu.status','1')->first();*/
		if($breads->parent_id>0)
		{
			$breads1 = DB::table('menu')->where('id',$breads->parent_id)->first();
			if($breads1->parent_id>0)
			{
				
				$breads2 = DB::table('menu')->where('id',$breads1->parent_id)->first();
				if($breads2->parent_id>0)
				{
					
					$breads3 = DB::table('menu')->where('id',$breads2->parent_id)->first();
					$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads3->url_menu).'">'.$breads3->label_menu.'</a> / <a href="'.url("pages/".$breads2->url_menu).'">'.$breads2->label_menu.'</a>/ <a href="'.url("pages/".$breads1->url_menu).'">'.$breads1->label_menu.'</a>/ <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
				}
				else{
					$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads2->url_menu).'">'.$breads2->label_menu.'</a> / <a href="'.url("pages/".$breads1->url_menu).'">'.$breads1->label_menu.'</a> / <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
				}
			}
			else
			{
				
				//$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>/ <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
				$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads1->url_menu).'">'.$breads1->label_menu.'</a>/ <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
				
			}
			
			
		}
		else{
			
			//$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a> / <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
			$html.='<a href="/">Home</a> / <a href="'.url("pages/".$breads->url_menu).'">'.$breads->label_menu.'</a>';
				
		}
		
		return $html;
	}
}
