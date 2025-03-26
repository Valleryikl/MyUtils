<?php
include('./req.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>My_Todo</title>
</head>

<body>
    <header>
        <h1 class="title">Welcome to My_Todo</h1>
    </header>
    <main>
        <form class="todo">
            <input class="todo__task" name="todo-task" type="text" placeholder="task">
            <input class="todo__btn" type="button" value="add">
        </form>
        <form class="group" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="group__in-progress">
                <h2 class="in-progress__title">À faire</h2>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $req = new req($dbh);
                    if ($_POST['load']) {
                        $load = $req->loadReqProgres();
                        foreach ($load as $value) {
                            echo"<div class='task'><input class='task__text' name='progres[]' value='" . $value['progres_task'] ."'><button class='delete'>Delete</button><button class='completed'>Completed</button></div>";
                        }
                    }
                }
                ?>
            </div>
            <div class="group__completed">
                <h2 class="completed__title">Terminé</h2>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $req = new req($dbh);
                    if ($_POST['load']) {
                        $load = $req->loadReqCompleted();
                        foreach ($load as $value) {
                            echo"<div class='task'><input class='task__text' name='completed[]' value='" . $value['completed_task'] ."'><button class='delete'>Delete</button></div>";
                        }
                    }
                }
                ?>
            </div>
            <div class="groupe-btn">
            <input class="btn" type="submit" value="Save" name="save">
            <input class="btn" type="submit" value="Load" name="load">
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $req = new req($dbh);
            if ($_POST['save']) {
                $req->saveReqProgres();
                $req->saveReqCompleted();
            }
        }
        ?>
    </main>
</body>

</html>