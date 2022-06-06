<!DOCTYPE html>  
<html>  
<head>  
<style>  
.error {color: #FF0001;}  

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}


</style>  

 <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Medi Camp</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>  
<body>    
  
<?php   
$namered = $emailred = $nimred = $genderred = $commentred = $agreered = "";  
$name = $email = $nim = $gender = $comment = $agree = "";  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
 
    if (empty($_POST["name"])) {  
         $namered = "Nama wajib diisi";  
    } else {  
        $name = input_data($_POST["name"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $namered = "hanya boleh menggunakan huruf";  
            }  
    }  
      
    if (empty($_POST["email"])) {  
            $emailred = "Email wajib diisi";  
    } else {  
            $email = input_data($_POST["email"]); 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailred = "pastikan lagi format email";  
            }  
     }  
    
    if (empty($_POST["nim"])) {  
            $nimred = "nim tidak boleh kosong";  
    } else {  
            $nim = input_data($_POST["nim"]);  
            if (!preg_match ("/^[0-9]*$/", $nim) ) {  
            $nimred = "hanya angka yang diperbolehkan.";  
            }  
        if (strlen ($nim) != 15) {  
            $nimred = "NIM harus 15 digit";  
            }  
    }  

    if (empty($_POST["comment"])) {
    $comment = "";
    } else {
    $comment = input_data($_POST["comment"]);
     }

      
   

    if (empty ($_POST["gender"])) {  
            $genderred = "pilih jenis kelamin anda";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  
    if (!isset($_POST['agree'])){  
            $agreered = "pastikan data anda benar dan centang validasi";  
    } else {  
            $agree = input_data($_POST["agree"]);  
    }  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  

 <body class="body">
    <header class="mainheader">
      <img src="phead.png" />
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="profil.html">About</a></li>
          <li><a href="calculator.html">Calculate</a></li>
          <li><a href="movie.html">Movie</a></li>

          <div class="dropdown">
            <button class="dropbtn">
              Category
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Berita</a>
              <a href="form3.php">Daftar</a>
            </div>
          </div>
          <div class="search-container">
            <input type="text" placeholder="Search.." name="search" />
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </ul>
      </nav>
    </header>
  
<h2>Fill something...</h2>  
<span class = "error">* wajib diisi </span>  
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    Nama:  
    <input type="text" name="name">  
    <span class="error">* <?php echo $namered; ?> </span>  
    <br><br>  
    E-mail:  
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailred; ?> </span>  
    <br><br>  
    NIM:  
    <input type="text" name="nim">  
    <span class="error">* <?php echo $nimred; ?> </span>  
    <br><br>  
    Jenis Kelamin:  
    <input type="radio" name="gender" value="male"> Male  
    <input type="radio" name="gender" value="female"> Female   
    <span class="error">* <?php echo $genderred; ?> </span>  
    <br><br>
    Deskripsi: 
    <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>  
    Pastikan anda mengisi form dengan benar:  
    <input type="checkbox" name="agree">  
    <span class="error">* <?php echo $agreered; ?> </span>  
    <br><br>                            
    <input type="submit" name="submit" value="Submit">  
    <br><br>    
    
    
</form>  
<?php  
    
    if($namered == "" && $emailred == "" && $nimred == "" && $genderred == "" && $agreered == "") {  
        echo "<h3> <b>data yang anda inputkan : .</b> </h3>";  
        echo "Name: " .$name."<br>";  
        echo "Email: " .$email."<br>";  
        echo "Mobile No: " .$nim."<br>";  
        echo "Deskripsi tambahan: ".$comment."<br>";
        echo "Gender: " .$gender."<br>";  
        echo "<br>";
        echo "<br>";
        echo "gunakan halaman daftar untuk clear output";
    } else {  
        echo "<h3> <b>harap isi form dengan benar.</b> </h3>";  
    }  
    
?>  
  

  
</body>  
</html>