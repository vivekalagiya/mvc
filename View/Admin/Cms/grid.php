<?php $cms = $this->getCms();?>

<html>

<head>
    <title>Cms Page</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Cms Page</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Cms', 'edit'); ?>>Add Cms</a> <br><br>
        
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