<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}?>



<!DOCTYPE html>
<html>
<head>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <title>CodeSpace|Problem Text Maker</title>
  <style>
    body{text-align: center;}
    .mdl-textfield{width:100%;}
    #pos{position:absolute;left:50px;top:50px;}
  </style>
</head>
<body>
    <style type="text/css">
  #contain{width:90%;margin:auto;}
  #view{text-align:left;white-space: pre-wrap;}
  </style>
<?php
include 'navbar.php';
 ?>

 

  <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href=index.php id="pos">
  <i class="material-icons" title=Back to Dashboard>fast_rewind</i>
</a>

 <?php

if(isset($_POST['stat'])&&isset($_POST['in'])&&isset($_POST['out'])&&isset($_POST['test'])&&isset($_POST['exin'])&&isset($_POST['exout'])&&isset($_POST['qcode'])
    &&isset($_POST['qnm']) )
{
    $prob=nl2br($_POST['stat']);
    $inf=nl2br($_POST['in']);
    $outf=nl2br($_POST['out']);
    $cons=nl2br($_POST['test']);
    $exin=nl2br($_POST['exin']);
    $exout=nl2br($_POST['exout']);
    $qcode=$_POST['qcode'];
    $name=$_POST['qnm'];
    if(!empty($prob)&&!empty($inf)&&!empty($outf)&&!empty($cons)&&!empty($exin)&&!empty($exout)&&!empty($qcode))
    {

        $my_file = 'questext/'.$qcode.'txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $code="<h2>".$name."</h2><h5>Problem Code:".$qcode."</h5><br><hr><br><p>".$prob."</p><br><h4>Input Format:</h4><br><p>".$inf."</p><h4>Output Format</h4><p>".$outf."</p>
        <br><h4>Constraints:</h4><p>".$cons."</p><br><h4>Example Test Cases:</h4> <br> <h5>Input Format</h5><p>".$exin."</p><br><h5>Output Format</h5><p>".$exout."</p>";
        if(fwrite($handle, $code)) 
          {
            echo "<div class=success>Problem Text File Created at <a href=questext/$qcode"."txt"." title=\"Right-Click & Save Link To download the Question Text\">questext/$qcode txt</a> &nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";

            fclose($handle);
          }

    }
    else {echo "<div class=error>Please fill in all the fields &nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";}
}
?>
 <div id="contain">
  <br><br><br>
  <div class=mdl-grid><div class="mdl-cell mdl-cell--6-col mycard">
<h1>Problem Text Maker</h1>
<form action="quesm.php" method="post">
    <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" maxlength=20 name=qcode>
    <label class="mdl-textfield__label" for="sample3">Question Code</label>
  </div>
    <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" maxlength=200 name=qnm>
    <label class="mdl-textfield__label" for="sample4">Question Name</label>
  </div>

    <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample5" rows= "10" name=stat cols=100></textarea>
    <label class="mdl-textfield__label" for="sample5">Problem statement</label>
  </div>

    <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample6" rows= "5" name=in cols=100></textarea>
    <label class="mdl-textfield__label" for="sample6">Input Format</label>
  </div>

       <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample7" rows= "5" name=out cols=100></textarea>
    <label class="mdl-textfield__label" for="sample7">Output Format</label>
  </div>
     <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample8" rows= "5" name=test cols=100></textarea>
    <label class="mdl-textfield__label" for="sample8">Constraints</label>
  </div>
     <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample9" rows= "10" name=exin cols=100></textarea>
    <label class="mdl-textfield__label" for="sample9">Example Input</label>
  </div>
     <br><div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" id="sample10" rows= "10" name=exout cols=100></textarea>
    <label class="mdl-textfield__label" for="sample10">Example Output</label>
  </div>
<br><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=sumbit>
  CREATE TEXT FILE
</button>
</form></div>
<div class="mdl-cell mdl-cell--6-col mycard" id="view">Preview</div>
<br><br><br>
</div></div>

</div>
</main>
</div>


        

</body>


</html>

<script type="text/javascript">
    $('.close').click(function(){
      $('.error').fadeOut();
      $('.success').fadeOut();
    });

    $('.mdl-textfield__input').keyup(function(){

        var qn=$('#sample4').val();
        var qc=$('#sample3').val();
        var ps=$('#sample5').val();
        var ifr=$('#sample6').val();
        var ofr=$('#sample7').val();
        var cst=$('#sample8').val();
        var ein=$('#sample9').val();
        var eot=$('#sample10').val();

        $('#view').html('<h2>'+qn+'</h2><h5>Problem Code:'+qc+'</h5><br><hr><br>Problem Statement<br><p>'+ps+'</p><br><h4>Input Format:</h4><br><p>'+ifr+'</p><h4>Output Format</h4><p>'+ofr+'</p><br><h4>Constraints:</h4><p>'+cst+'</p><br><h4>Example Test Cases:</h4><br><h5>Input Format</h5><p>'+ein+'</p><br><h5>Output Format</h5><p>'+eot+'</p>');


    });

    </script>
