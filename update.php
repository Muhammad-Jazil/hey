<?php
include('connection.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
    </head>
<?php  
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("select * from marksheet where id=:pid");
    $query->bindParam("pid",$)
}
?>
<body>
<div class="container mt-5">
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input 
                    type="text"
                    name="name"
                    id=""
                    class="form-control"
                    placeholder="enter your name"
                />
                <div class="mb-3">
            <div class="mb-3">
            <label for="" class="form-label">math</label>
                <input 
                    type="number"
                    name="maths"
                    id=""
                    class="form-control"
                    placeholder="enter your marks"
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">physics</label>
                <input 
                    type="number"
                    name="physics"
                    id=""
                    class="form-control"
                    placeholder="enter your marks"
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">chemistry</label>
                <input 
                    type="number"
                    name="chemistry"
                    id=""
                    class="form-control"
                    placeholder="enter yiour marks"
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">english</label>
                <input 
                    type="number"
                    name="english"
                    id=""
                    class="form-control"
                    placeholder="enter your name"
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">urdu</label>
                <input 
                    type="number"
                    name="urdu"
                    id=""
                    class="form-control"
                    placeholder="enter your marks"
                />
                </div>
        

            <button 
        type="submit"
        class="btn btn-success"
        name="result"
        
    >
   submit
</button>
        </form>
    </div>
    </body>
</html>
<?php
if(isset($_POST['result'])){
    $name=$_POST['name'];
    $maths=$_POST['maths'];
    $physics=$_POST['physics'];
    $chemistry=$_POST['chemistry'];
    $english=$_POST['english'];
    $urdu=$_POST['urdu'];
    $totalmarks=500;
    $obtain=$maths + $physics + $chemistry + $english+$urdu;
    $percentage=$obtain/$totalmarks*100;
    $grad="";
    $remarks="";
    if($percentage>=80 && $percentage<=100){
        $grad="A1";
        $remarks="excellent";
    }
   else if($percentage>=70 && $percentage<80){
        $grad="A";
        $remarks="very good";
    }
    else if($percentage>=60 && $percentage<70){
        $grad="B";
        $remarks="good";
    }
    else if($percentage>=50 && $percentage<60){
        $grad="c";
        $remarks="fair";
    }
    else {
        $grad="fail";
        $remarks="batter luck next time";
    }

   $query = $pdo->prepare("insert into marksheet (name,math,physics,chemistry,english,urdu,obtain,percentage,grade,remarks)values
   (:pn,:pm,:pp,:pc,:pe,:pu,:po,:pper,:pg,:pr)");


   $query->bindParam("pn",$name);
   $query->bindParam("pm",$maths);
   $query->bindParam("pp",$physics);
   $query->bindParam("pc",$chemistry);
   $query->bindParam("pe",$english);
   $query->bindParam("pu",$urdu);
   $query->bindParam("po",$obtain);
   $query->bindParam("pper",$percentage);
   $query->bindParam("pg",$grad);
   $query->bindParam("pr",$remarks);
   $query->execute();
   echo "<script>
   alert('data insert into table'
   </script>";

    ?>
         
        
    <?php
}
?>
</div>
</body>
</html>