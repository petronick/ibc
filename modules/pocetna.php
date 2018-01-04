    	<div class="slideshow" style="max-width:100%;margin:0 auto;display:block">
          <img class="mySlides" src="Images/prva.jpg" style="width:100%">
          <img class="mySlides" src="Images/druga.jpg" style="width:100%">
          <img class="mySlides" src="Images/treca.jpg" style="width:100%">
        </div>
<div id="left">
<?php
$objava = Post::getAll("order by id desc limit 10");
foreach($objava as $rw){
?>
				<div class="post">
					<h2><?php echo $rw->naslov; ?></h2>
					<p style="color:#555;"><?php echo $rw->datum; ?></p>
					<img style='display:<?php if(($rw->slika)==""){
					    echo "none";
					    } else {
					    echo "block";
					    }
					    ?>;' src='Images/<?php echo $rw->slika; ?>'>
					<p><?php echo $rw->sadrzaj; ?></p>
				</div><hr>
<?php
}
?>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>