<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ridracoli DataRain</title>
        <link href="../parallelo/futura/style.css" rel="stylesheet" media="all">
		<link rel="stylesheet" href="styles/styles.css" type="text/css" charset="utf-8" />
    </head>
    <body onselectstart="return false">
    	<div id="container"></div>
        <img id="fascia" src="assets/fascia-datarain.png" alt="" />
        <script type="text/javascript" src="js/d3.min.js"></script>
        <script type="text/javascript" src="js/d3-selection-multi.min.js"></script>
        <script src="js/liquidfill.min.js" language="JavaScript"></script>
        <script src="js/datarain.js" language="JavaScript"></script>
        <script type="text/javascript">

            document.oncontextmenu =new Function("return false;")
            
            <?php 

            // parallelo
            $drops = file_get_contents("http://ridracoli.parallelo.it/get/drops");
			
			// ridracoli
            //$drops = file_get_contents('http://192.168.0.11/cms/get/drops'); 

            ?>
            var data = JSON.parse(<?php echo json_encode($drops) ?>);
            var dropsdata = [];
            data.forEach(function(d) {
                
                let cat = 1, catN = '';
                if(d.tags.length>0){
                    cat = d.tags[0].id;
                    catN = d.tags[0].Nome;
                }

                let img = '';
                if(d.photos.length>0){
                    img = "http://ridracoli.parallelo.it/uploads/photos/"+d.photos[0].File;
                }

                let drop = {
                   "id": d.id,  
                   "title": d.Titolo,  
                   "category": cat, 
                   "categoryName": catN, 
                   "img": img,   
                   "type": "text", 
                   "content": d.Descrizione
                }

                dropsdata.push(drop)
            });

            //console.log(dropsdata)
            makeitrain(dropsdata)

			//d3.json("assets/rain.json", function(data) {
			    //console.log(data);
			//    makeitrain(data)
			//});

        </script>
    </body>
</html>  