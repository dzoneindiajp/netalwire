<div style="text-align: center;border-bottom: 2px solid #ccc;box-shadow: 5px 5px 5px 5px #eee;">
	<img src="#" style="    width: 200px;">
</div>
<div class="jumbotron text-center">
 <h4>Hello,{{ $sales_name }} </h4>
 <p>Thanks for showing your interest.</p>
<p>Here are the details as you mention our team will contact soon :</p>
 <br><br><br>
  <p><b>Name: </b> {{ $sales_name }}</p>
 <p><b>Pupose: </b> {{$sales_purpose_contact}}</p>
 <p><b>Interest: </b> {{$sales_biz_area_interest}}</p> 
 <p><b>Sales Company: </b> {{$sales_company}}</p>
  <p><b>Sales Position: </b>{{$sales_position}}</p>
 <p><b>Phone: </b> {{$sales_mobile }}</p>
 <br><br><br>
</div>
  <div class="jumbotron text-center" style="text-align:left;margin-top:100px;">
 Warm Regard’s, <br>
 BVK Group
</div>
<div style="background-color:#e6b506;padding: 25px;text-align: center;">&copy; <?php echo date("Y")?>. All Rights reserved BVK Group</div>