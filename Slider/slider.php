<html>
    <head>

        <meta charset="utf-8">
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>



        <style>
            .demo { 
                padding: 10px !important;
                width: 400px;

            }

            .demo label {

                font-size: 20px;
            }

            .demo input {
                border:0;
                color:#f6931f;
                font-weight:bold;
            }

            #slider-range {
                height: 10px;
            }
        </style>
        <script>
            $(function() {
                
                var distance = 0;
                var weight = 0;


                $( "#slider-range-min" ).slider({
                    range: "min",
                    value: 37,
                    min: 5,
                    max: 700,
                    slide: function( event, ui ) {
                        $( "#amount" ).val( ui.value );
                    },

                    stop: function(event, ui) {
                        distance = ui.value
                    }
                });

                $( "#amount" ).val($( "#slider-range-min" ).slider( "value" ) );

                $( "#slider-range-min2" ).slider({
                    range: "min",
                    value: 500,
                    min: 100,
                    max: 3000,
                    slide: function( event, ui ) {
                        $( "#amount2" ).val( ui.value );
                    },

                    stop: function(event, ui) {
                        weight = ui.value
                    }
                });
                $( "#amount2" ).val($( "#slider-range-min2" ).slider( "value" ) );


                $( "button" ).button();
                
                $( "button" ).click(function() {alert("Вы выбрали расстояние :" + distance + ", Вес груза :" + weight)});

            });
        </script>


    </head>

    <body>

        <div class="demo">

            <p>
                <label>Расстояние в км:</label>
                <input type="text" id="amount"/>
            </p>

            <div id="slider-range-min"></div>

            <p>
                <label>Укажите вес груза в кг:</label>
                <input type="text" id="amount2"/>
            </p>

            <div id="slider-range-min2"></div><br>

            <button>Посчитать</button>


        </div>


    </body>

</html>       

<?php
?>

