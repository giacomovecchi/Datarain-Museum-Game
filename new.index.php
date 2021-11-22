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
        <script src="js/liquidfill.min.js"></script>
        <script src="js/datarain.js" ></script>
        <script type="text/javascript">

            document.oncontextmenu =new Function("return false;")
            
          <?php//<?php $drops = file_get_contents('./assets/drops_en.json'); ?> 
            <?php $drops = file_get_contents('./assets/drops_it.json'); ?>
            var data = JSON.parse(<?php echo json_encode($drops) ?>);
            var dropsdata = [];
            var counter = 0;
            data.forEach(function(d) {
                
                let cat = 1, catN = '';
                if(d.tags.length>0){
                    cat = d.tags[0].id;
                    catN = d.tags[0].Nome;
                }

                counter++;

                let img = '';
                if(d.photos.length>0){
                    img = "./assets/images/"+d.photos[0].File;
                    console.log(counter + "___" + img);
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