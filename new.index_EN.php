<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ridracoli DataRain</title>
        <link href="../parallelo/futura/style.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="">
  <!--  <link rel="stylesheet" href="styles/styles.css" type="text/css" charset="utf-8" />   -->
        <link rel="stylesheet" href="styles/style_new.css">
    </head>
    <body onselectstart="return false">
    	<div id="container"></div>

        <!-- Container per cambio lingua -->
        <section class="fascia" >
            <section class="fascia_text" > 
                <p>DATA RAIN</p> 
                <h1>TOCCA LE GOCCE</h1>
            </section>
            <section class="fascia-img">
                    <a href="./new.index_EN.php"><img src="assets/en.png" alt="" class="en"></a>  
                    <a href="./new.index_IT.php"><img src="assets/it.png" alt="" class=""></a>
            </section>
        </section>
        <!-- -->

        <script type="text/javascript" src="js/d3.min.js"></script>
        <script type="text/javascript" src="js/d3-selection-multi.min.js"></script>
        <script src="js/liquidfill.min.js"></script>
        <script src="js/datarain.js" ></script>
        <script type="text/javascript">

            document.oncontextmenu =new Function("return false;")
            
            <?php $drops = file_get_contents('./assets/drops_en.json'); ?> 
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