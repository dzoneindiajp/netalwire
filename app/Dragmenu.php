<?php

namespace App;
use App\CMS;
use Illuminate\Database\Eloquent\Model;

class Dragmenu extends Model
{
     protected $table = 'menu';
	 
	 
	public  function menuTree($parent_id = 0)
{
   
    $items = '';
    $query = Dragmenu::where('parent_id',$parent_id)->orderBy('id', 'ASC')->get();

    if (count($query)> 0) {
		
        $items .= '<ol class="dd-list">';
     
        foreach ($query as $row) {
            $items .= $this->renderMenuItem($row->id, $row->label_menu, $row->url_menu,$row->status,$row->external_flag);
            $items .= $this->menuTree($row->id);
            $items .= '</li>';
        }
        $items .= '</ol>';
    }
    return $items;
}


public function renderMenuItem($id, $label, $url, $status,$external_flag)
{
	if($status!=1)
	{
		$style="background: red !important;";
	}
	else
	{
		$style="";
	}
	
/*	if($external_flag==1)
	{
		$checked_yes='checked="checked"';
		$checked_no="";
	}
	else
	{   $checked_yes=""; 
		$checked_no='checked="checked"';
	} */
	
    return '<li class="dd-item dd3-item" data-id="' . $id . '" data-label="' . $label . '" data-url="' . $url . '">' .
        '<div class="dd-handle dd3-handle" > Drag</div>' .
        '<div class="dd3-content" style="'.$style.'"><span>' . $label . '</span>' .
        '<div class="item-edit">Edit</div>' . 
        '</div>' .
        '<div class="item-settings d-none">' .
        '<p><label for="">Navigation Label<br><input type="text" name="navigation_label" value="' . $label . '"></label></p>' .
        '<p><label for="">Navigation Url<br><input type="text" name="navigation_url" value="' . $url . '"></label></p>' .
         //'<p><label for="">External Url</label><br><input type="radio" name="external_url" '.$checked_no.' value="no"> No<input type="radio" name="external_url" value="yes" '.$checked_yes.'>Yes</p>' .
        '<p><a class="item-delete" href="javascript:;">Remove</a> |' .
        '<a class="item-close" href="javascript:;">Close</a></p>' .
        '</div>';

}

public function getSecondlevelMenu($id)
{
	 $query=Dragmenu::where('parent_id',$id)->where('status','1')->get();
	/*$query=  Dragmenu::join('cms','menu.url_menu','=','cms.slug')
				   ->select('menu.*','cms.slug','cms.title')
				   ->where('menu.parent_id',$id)->where('menu.status','1')->get();*/
	return $query;
	
	
}

    public function checkThirdParyUrl($menu_url){
        $url_txt='false';
        if (str_contains($menu_url, 'http')) { 
        $url_txt='true';
        }
        return $url_txt;
     }
            
}
