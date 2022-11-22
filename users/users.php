
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Task</title>
</head>
<body>
    <div class="main">
        <div class="main-inner">
            <form method="POST" action="">
                <?php
                    $connection = mysqli_connect('localhost', 'root', 'root', 'task_db');
                    if( isset($_POST['do_post']) )
                    {
                        $errors = array();
                        if( $_POST['iin'] == '')
                        {
                            $errors[] = 'Введите иин!';
                        }
                        if( $_POST['goal'] == '')
                        {
                            $errors[] = 'Заполните цель посещения!';
                        }
                        if( $_POST['date'] == '')
                        {
                            $errors[] = 'Выберите дату';
                        }
                        if( $_POST['time'] == '')
                        {
                            $errors[] = 'Укажите время';
                        }
                        if( $_POST['login'] == '')
                        {
                            $errors[] = 'Введите e-mail';
                        }
                        if( empty($errors))
                        {
                            mysqli_query($connection, "INSERT INTO `users` (`iin`,`goal`,`date`,`time`,`login`, `operation`) VALUES ('".$_POST['iin']."','".$_POST['goal']."','".$_POST['date']."','".$_POST['time']."','".$_POST['login']."', 'NULL')");
                            echo '<span style="color: green;">Ваш запрос отправлен!</span>';
                        } else {
                            echo '<span style="color: red;">' .$errors['0'] .'</span>';
                        }
                    }
                ?>
                <div class="main-inner_wrap">
                    <h1>
                        Введите ИИН*:
                    </h1>
                        <input type="number" name="iin">
                </div>
                <div class="main-inner_wrap">
                    <h1>
                        Цель посещения*:
                    </h1>
                        <input type="text" name="goal" placeholder="Выберите цель посещения">
                </div>
                <div class="main-inner_wrap">
                    <h1>
                        Дата посещения:
                    </h1>
                    
                        <input type="date" name="date" placeholder="дд.мм.гггг">
                    
                </div>
                <div class="main-inner_wrap">
                    <h1>
                        Время посещения*:
                    </h1>
                        <input type="time" name="time" placeholder="Выберите время">
                </div>
                <div class="main-inner_wrap">
                    <h1>
                        E-mail:
                    </h1>
                        <input type="login" name="login">
                </div>
                <input type="submit" name="do_post" value="Забронировать">
            </form>
            
        </div>
    </div>
</body>
</html>