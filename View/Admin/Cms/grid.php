<?php $cms = $this->getCms();?>

<html>

<head>
    <title>Cms Page</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Cms Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Cms', 'edit'); ?>').load();" href="javascript:void(0)">Add Cms</a></div>
        </div>

        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>

        
    </div>
    
</body>


</html>