<!DOCTYPE html>
<html>
    <head>
         <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Medi Camp</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    </head>


    <?php  
      if(isset($_POST['submit'])) {  
     
        echo "<h3 color = #FF0001> <b>data yang anda inputkan : .</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: "  .$_POST['name'];  
        echo "<br>";  
        echo "Email: " .$_POST['email'];  
        echo "<br>";  
        echo "NIM: " .$_POST['nim'];  
        echo "<br>";  
        echo "Deskripsi tambahan: ".$_POST['comment'];
        echo "<br>"; 
        echo "Gender: " .$_POST['gender'];  
        echo "<br>";
        echo "<br>";
        echo "gunakan halaman daftar untuk clear output";
    } else {  
        
    }  

    
?>  
</html>


 