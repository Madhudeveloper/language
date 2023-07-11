<?php 
    include('language.php');
    $en_select = ''; 
    $de_select = '';
    $language = '';
    if((isset($_GET['language']) && $_GET['language'] == 'en') || !isset($_GET['language'])){
        $en_select = 'selected';
        $language = 'en';
    }else{
        $de_select = 'selected';
        $language = 'sp';
    }

    $conn = new mysqli('localhost', 'root', '', 'language');
    $sql = "SELECT page_content from lan WHERE language_type='$language'";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    // print_r($row);
     
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language</title>
</head>
<body>
    Select Language
    <select onchange="set_language()" name="language" id="language">
        <option value="en" <?php echo $en_select; ?>>English</option>
        <option value="sp" <?php echo $de_select; ?>>Spanish</option>
    </select>
    <div class="content">
      <!-- <p><?php //echo $page_content[$language]['0']; ?></p> -->
      <p><?php echo $row['0']['page_content']; ?></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <script>
        function set_language()
        {
            var language = $('#language').val();
            window.location.href = 'http://localhost/Language/?language='+language;
        }
    </script>

</body>
</html>