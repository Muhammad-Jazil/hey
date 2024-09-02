<?php 
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div
            class="table-responsive"
        >
            <table
                class="table table-info"
            >
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">math</throw>
                        <th scope="col">physics</th>
                        <th scope="col">chmistry</th>
                        <th scope="col">english</th>
                        <th scope="col">urdu</th>
                        <td scope="col">total</td>
                        <td scope="col">obtained</td>
                        <td scope="col">percentage</td>
                        <td scope="col">grade</td>
                        <td scope="col">remarks</td>

                    </tr>
                    </thead>
                    <tbody>
             <?php
$query = $pdo->query("select * from marksheet");
$row = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($row as $value) 
{
             ?>
       
                    <tr class="">
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['math'];?></td>
                        <td><?php echo $value['physics'];?></td>
                        <td><?php echo $value['chemistry'];?></td>
                        <td><?php echo $value['english'];?></td>
                        <td><?php echo $value['urdu'];?></td>
                        <td><?php echo $value['total'];?></td>
                        <td><?php echo $value['obtain'];?></td>
                        <td><?php echo $value['percentage'];?></td>
                        <td><?php echo $value['grade'];?></td>
                        <td><?php echo $value['remarks'];?></td>
<td><a href="update.php?id=<?php echo $value['id']?>"class ="btn-success">Edit</a></td>
<td><a href=""class ="btn-danger">Delete</a></td>


                    </tr>
                 <?php
}
                 ?>   
                <tbody>
</table>
</div>
</body>
</html>