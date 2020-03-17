<!doctype html>
<html>

    
<head>
	<title>Green House Monitoring</title>
    <meta http-equiv="refresh" content="1200" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>
<script>
    var nodeDate = [];
    
    var node1t = [];
    var node2t = [];
    var node3t = [];
    var node4t = [];
    
    var node1h = [];
    var node2h = [];
    var node3h = [];
    var node4h = [];
    
    var node1s = [];
    var node2s = [];
    var node3s = [];
    var node4s = [];
    
    var node1l = [];
    var node2l = [];
    var node3l = [];
    var node4l = [];
    

    
    function chart(TitleType,id,nodeDate,node1,node2,node3,node4){ 
        
        new Chart(document.getElementById(id), {
            type: 'line',
            data: {
                labels: nodeDate,
                datasets: [{ 
                data: node1,
                label: "Node 1",
                borderColor: "#3e95cd",
                fill: false
                }, { 
                data: node2,
                label: "Node 2",
                borderColor: "#8e5ea2",
                fill: false
                }, { 
                data: node3,
                label: "Node 3",
                borderColor: "#3cba9f",
                fill: false
                }, { 
                data: node4,
                label: "Node 4",
                borderColor: "#e8c3b9",
                fill: false
                }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: TitleType    
                    }
            }
        });
    }
</script>   
 
    
<body>
    <center>
	<div style="width:75%;">
		<canvas id="Temp" width="800" height="450"></canvas>
        
	</div>
	<br>
	<br>
    <div style="width:75%;">
		<canvas id="Humi" width="800" height="450"></canvas>
        
	</div>
    
    <br>
	<br>
    <div style="width:75%;">
		<canvas id="SoilM" width="800" height="450"></canvas>
        
	</div>
    
    <br>
	<br>
    <div style="width:75%;">
		<canvas id="LightIn" width="800" height="450"></canvas>
        
	</div>
    
    <br>
	<br>
   
    </center>
     <?php
        include 'connection.php';
        $node1 = nodeData("Node1");  
        $node2 = nodeData("Node2");
        $node3 = nodeData("Node3");
        $node4 = nodeData("Node4");
        
        function Rate($rate){
            if($rate == 'HIGH'){
                return 3;
            }
            else if($rate == 'MEDIUM'){
                return 2;
            }
            else{
                return 1;
            }
        }
        
        for($i = 0; $i<count($node1); $i++){
            echo "<script>
             nodeDate.push('".$node1[$i][5]."');
             node1t.push(".$node1[$i][0].");
             node1h.push(".$node1[$i][1].");
             node1s.push(".$node1[$i][2].");
             node1l.push(".$node1[$i][3].");
        </script>"; 
        }
    
        for($i = 0; $i<count($node2); $i++){
            echo "<script>
             node2t.push(".$node2[$i][0].");
             node2h.push(".$node2[$i][1].");
             node2s.push(".$node2[$i][2].");
             node2l.push(".$node2[$i][3].");
        </script>"; 
        }
    
        for($i = 0; $i<count($node3); $i++){
            echo "<script>
             node3t.push(".$node3[$i][0].");
             node3h.push(".$node3[$i][1].");
             node3s.push(".$node3[$i][2].");
             node3l.push(".$node3[$i][3].");
        </script>"; 
        }

        for($i = 0; $i<count($node4); $i++){
            echo "<script>
             node4t.push(".$node4[$i][0].");
             node4h.push(".$node4[$i][1].");
             node4s.push(".$node4[$i][2].");
             node4l.push(".$node4[$i][3].");
        </script>"; 
        }
                
     
        echo "<script>
            chart('Temperature','Temp',nodeDate,node1t,node2t,node3t,node4t)
        </script>";
        
        
        echo "<script>
            chart('Humidity','Humi',nodeDate,node1h,node2h,node3h,node4h)
        </script>";
    
        echo "<script>
            chart('Soil Moisture','SoilM',nodeDate,node1s,node2s,node3s,node4s)
        </script>";
        
        echo "<script>
            chart('Light Intensity','LightIn',nodeDate,node1l,node2l,node3l,node4l)
        </script>";

    ?>
	
</body>

</html>
