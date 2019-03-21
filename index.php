<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css"
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a class="menu"><i class="fa fa-bars" id="menu_icon"></i></a>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div><!--navbar-header close-->
    <div class="collapse navbar-collapse drop_menu" id="content_details">
    
        
    </div><!--collapse navbar-collapse drop_menu close-->
  </div><!--container-fluid close-->
</nav><!--navbar navbar-inverse close-->
<br>
<br>
<br>


          
          
          
          


<div class="container">
    <h3>Enter domain here</h3>
   
   <form action="" method="post">
<textarea class='form-control'  id="myInput" name="url" oninput="myFunction()" style=' width: 100%;height: 100px;'  placeholder="enter your url here in separate line" ></textarea>
                                 <input type="hidden" id="avik" name= "test">
        <br>
            
            <input class="btn btn-success" name='btn' type="submit" value='check'>
        </form>
        <h3>Availability List</h3>
<table class="table table-striped">
  <thead>
    <tr>
     
      <th scope="col">Serial</th>
      <th scope="col">URL</th>
    </tr>
  </thead>
  <tbody>
      
      <?php

if($_POST['btn']){
    
    
    $url = explode("7955",$_POST['test']);
$i=1;
foreach($url as $uri){
    
    $k=file_get_contents("https://web.archive.org/save/".$uri);
    
    $json = file_get_contents("https://archive.org/wayback/available?url=".$uri);


$obj = json_decode($json);
// echo '<pre>';
// print_r($obj);

//echo $obj->archived_snapshots->closest->status;

if($obj->archived_snapshots->closest->available == 1){
    
   // echo $i.$obj->archived_snapshots->closest->url.'<br>';
    echo "<tr><td>".$i."</td><td>".$obj->archived_snapshots->closest->url."</td></tr>";
   
}else{
    
    //echo $i.'unavailable<br>';
    echo "<tr><td>".$i."</td>
      <td><p class='badge badge-info'>unavailable</p></td>
    </tr>";
   
}
$i=$i+1;
}
    
}

?>
    
    
  </tbody>
</table>
        
</div><!--container close-->

<footer><center>Developed by Tarek</center></footer>

 <script>
function myFunction() {
  var x = document.getElementById("myInput").value;
  //alert(x);
  var x=x.replace(/\n/g, '7955');

  document.getElementById("avik").value = x;
}
</script>