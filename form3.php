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
  floatjavascript:void(0);: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
// define variables to empty values  
$nameErr = $emailErr = $nimErr = $genderErr = $commentErr = $agreeErr = "";  
$name = $email = $nim = $gender = $comment = $agree = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  

      
//String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Nama wajib diisi";  
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "hanya boleh menggunakan huruf";  
            }  
    }  
      
    //Email Validation  
    if (empty($_POST["email"])) {  
            $emailErr = "Email wajib diisi";  
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "pastikan lagi format email";  
            }  
     }  
    
    //Number Validation  
    if (empty($_POST["nim"])) {  
            $nimErr = "nim tidak boleh kosong";  
    } else {  
            $nim = input_data($_POST["nim"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $nim) ) {  
            $nimErr = "hanya angka yang diperbolehkan.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($nim) != 15) {  
            $nimErr = "NIM harus 15 digit";  
            }  
    }  

    //comment validation
    if (empty($_POST["comment"])) {
    $comment = "";
    } else {
    $comment = test_input($_POST["comment"]);
     }

      
   
    //Empty Field Validation  
    if (empty ($_POST["gender"])) {  
            $genderErr = "pilih jenis kelamin anda";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  
    //Checkbox Validation  
    if (!isset($_POST['agree'])){  
            $agreeErr = "pastikan data anda benar dan centang validasi";  
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
    <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
    E-mail:  
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
    NIM:  
    <input type="text" name="nim">  
    <span class="error">* <?php echo $nimErr; ?> </span>  
    <br><br>  
    Jenis Kelamin:  
    <input type="radio" name="gender" value="male"> Male  
    <input type="radio" name="gender" value="female"> Female   
    <span class="error">* <?php echo $genderErr; ?> </span>  
    <br><br>
    Deskripsi: 
    <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>  
    Pastikan anda mengisi form dengan benar:  
    <input type="checkbox" name="agree">  
    <span class="error">* <?php echo $agreeErr; ?> </span>  
    <br><br>                            
    <input type="submit" name="submit" value="Submit">  
    <br><br>                            
</form>  
  
<?php  
    
    if($nameErr == "" && $emailErr == "" && $nimErr == "" && $genderErr == "" && $agreeErr == "") {  
        echo "<h3 color = #FF0001> <b>data yang anda inputkan : .</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Mobile No: " .$nim;  
        echo "<br>";  
        echo "Deskripsi tambahan: ".$comment;
        echo "<br>"; 
        echo "Gender: " .$gender;  
        echo "<br>";
        echo "<br>";
        echo "gunakan halaman daftar untuk clear output";
    } else {  
        echo "<h3> <b>harap isi form dengan benar.</b> </h3>";  
    }  
    
?>  
  
</body>  
</html>