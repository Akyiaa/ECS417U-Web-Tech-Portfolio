<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Post</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="previewStyle.css">
</head>
<body>

    <header>
        <figure>
            <img src="logo.png" alt="Fiona Ampofo Logo" width="100px">
        </figure>
        <h1>Blog Post Preview</h1>
    </header>
 
    <div class="main">
        <div class="post">
            <?php
                date_default_timezone_set('Europe/London');
                $dateTime = date('Y-m-d H:i:s');

                echo '<time>' . $dateTime . '</time>';
                echo '<h3>' . $_POST['title'] . '</h3>';
                echo '<br><p>' . $_POST['subject'] . '</p> ';
            ?>
        </div>

        <form method="post" action="addEntry.php" id="hidden_form">
            <input type="hidden" name="title" value="<?php echo $_POST['title']; ?>" >
            <input type="hidden" name="subject" value="<?php echo $_POST['subject']; ?>" >
                
            <nav>
            <a id="sub" onclick="submitForm()" href="#">SUBMIT</a>
            <?php echo "<a href=\"javascript:history.back()\">EDIT</a>";?>
            </nav>
        </form>
        
        
        <script>
            function submitForm(){
                const form = document.getElementById("hidden_form");
                form.submit();
            }
        </script>

    </div>    
 


</body>
</html>