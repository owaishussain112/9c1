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
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = $pdo->prepare("select * from marksheet where id = :pid");
            $query->bindParam("pid",$id);
            $query->execute();
            $rowData = $query->fetch(PDO::FETCH_ASSOC);
        }
        ?>
       <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                    value="<?php echo $rowData['name']?>"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">maths</label>
                <input
                    type="text"
                    name="maths"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                    value="<?php echo $rowData['math']?>"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">physics</label>
                <input
                    type="text"
                    name="physics"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                    value="<?php echo $rowData['physics']?>"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">chemistry</label>
                <input
                    type="text"
                    name="chemistry"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                    value="<?php echo $rowData['chemistry']?>"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">urdu</label>
                <input
                    type="text"
                    name="urdu"
                    id=""
                    class="form-control"
                    placeholder=""
                    aria-describedby="helpId"
                    value="<?php echo $rowData['urdu']?>"
                />
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">english</label>
                <input
                    type="text"
                    name="english"
                    id=""
                    class="form-control"
                    placeholder="bnbvh"
                    aria-describedby="helpId"
                    value="<?php echo $rowData['english']?>"
                />
                
            </div>
            <button
                type="submit"
                class="btn btn-primary"
                name="marksheet"
            >
                Button
            </button>
            
        </form>
        <?php
        if(isset($_POST['marksheet'])){
            $name = $_POST['name'];
            $maths = $_POST['maths'];
            $chemistry = $_POST['chemistry'];
            $physics = $_POST['physics'];
            $urdu = $_POST['urdu'];
            $english = $_POST['english'];
            $obtained = $maths + $physics + $chemistry + $urdu + $english;
            $percentage = $obtained/500*100;
            $grade = "";
            $remarks = "";
            if($percentage>=90 && $percentage<=100){
                $grade = "A1";
                $remarks = "EXCELLENT";
            }
            else if ($percentage >=70 && $percentage<90){
                $grade = "A";
                $remarks = "very Good";
            }
            else if ($percentage >=60 && $percentage<70){
                $grade = "B";
                
                $remarks = "Good";
            }else if ($percentage >=50 && $percentage<60){
                $grade = "C";
                
                $remarks = "NICE";
            }else if ($percentage >=40 && $percentage<50){
                $grade = "D";
                
                $remarks = "BETTER";
            }
            else{
                $grade = "FAIL";
                $remarks = "TRY AGAIN";
            }
$query = $pdo -> prepare("insert into marksheet(name,math,physics,chemistry,urdu,english,obtained,percentag,grade,remarks) values(:pn,:pm,:pp,:pc,:pu,:pe,:po,:pper,:pg,:pr)");
$query->bindParam("pn",$name);
$query->bindParam("pm",$maths);
$query->bindParam("pp",$physics);
$query->bindParam("pc",$chemistry);
$query->bindParam("pu",$urdu);
$query->bindParam("pe",$english);
$query->bindParam("po",$obtained);
$query->bindParam("pper",$percentage);
$query->bindParam("pg",$grade);
$query->bindParam("pr",$remarks);
$query->execute();
echo "<script>alert('data send to db')</script>";
        }
        ?>
       </div>
    </body>
</html>
