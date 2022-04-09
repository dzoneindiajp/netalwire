@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="<?php echo url("dragmenu/css/jquery.nestable.css");?>">

    <link rel="stylesheet" href="<?php echo url("dragmenu/css/style.css");?>">
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
	<?php 
use App\Dragmenu;
$cor=new Dragmenu;

?>									
					<div class="row">
					<h3 class="title1">Our Business content:</h3>
						<div class="dd" id="nestable">
						   
        <?php
            $html_menu = $cor->menuTree();
            echo (empty($html_menu)) ? '<ol class="dd-list"></ol>' : $html_menu;
        ?>
    </div>
	 <form action="<?php echo url("save-menu");?>" method="post">
       @csrf <input type="hidden" id="nestable-output" name="menu">
        <button type="submit">Save Menu</button>
    </form>
					</div>
					
				</div>
			</div>
		</div>
		
		
		<script src="<?php echo url("dragmenu/js/jquery-3.4.1.min.js");?>"></script>
    <script src="<?php echo url("dragmenu/js/jquery.nestable.js");?>"></script>
    <script src="<?php echo url("dragmenu/js/script.js");?>"></script>
    <script>
        
    </script>
@endsection
