<?php
include("connection.php");
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

    <body>
      <div class="container">
        <h1>details</h1>
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Maths</th>
                        <th scope="col">Physics</th>
                        <th scope="col">Chemistry</th>
                        <th scope="col">English</th>
                        <th scope="col">Urdu</th>
                        <th scope="col">Obtained</th>
                        <th scope="col">Total</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Remarks</th>
                        <th colspan="2">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $pdo->query("select * from marksheet");
                    // print_r($query);
                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                            // print_r($row);
foreach($row as $values){
    ?>
    <tr class="">
                        <td scope="row"><?php echo $values['id'] ?></td>
                        <td><?php echo $values['name'] ?></td>
                        <td><?php echo $values['math'] ?></td>
                        <td scope="row"><?php echo $values['physics'] ?></td>
                        <td><?php echo $values['english'] ?></td>
                        <td><?php echo $values['urdu'] ?></td>
                        <td scope="row"><?php echo $values['chemistry'] ?></td>
                        <td><?php echo $values['obtained'] ?></td>
                        <td><?php echo $values['total'] ?></td>
                        <td scope="row"><?php echo $values['percentag'] ?></td>
                        <td><?php echo $values['grade'] ?></td>
                        <td><?php echo $values['remarks'] ?></td>
                        <td><a href="update.php?id=<?php echo $values['id']?>" class="btn btn-outline-success">Edit</a></td>
                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>

                    </tr>   
    
    
    <?php
}
    ?>
                    
                   
                </tbody>
            </table>
        </div>
        
      </div>
    </body>
</html>
