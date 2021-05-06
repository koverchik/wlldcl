<?php require_once '../DB/connection.php'?>
<?php require_once '../DB/login.php'?>
<!DOCTYPE html>
    <head>
        <title>Tasks</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8">
            <meta name="description" content="">
            <link rel="stylesheet" href="style.css">
        </head>
    <body>
    <h1>Task 1</h1>
        <?php
        //Запрос всех значений таблицы
        $query = "SELECT *  FROM Category;";
        $result = $conn->query($query);
        //Создание массива отсортированных значений
        $newArray = [];
        //Получение количества категорий
        foreach ($result as $key => $value) {
            if(!(array_key_exists($value["parent_id"], $newArray))){
               $newArray[$value["parent_id"]] = [];
             }
            }
        //Добавление необходимых данных к категории 
        foreach ($result as $key => $value) {
                array_push($newArray[$value["parent_id"]], $value["name"]);
                  }
        //Выведение списка одной таблицы
        function trase($arr)
        {          
            foreach ($arr as $key => $value) {
               
                if(is_array($value)){
          
                    printf("<p class='header-item'>$key :</p>");
                    trase($value);
                    }else{
                        printf("<p class='one-item'>$value </p>");
                    }
                }
        }
        printf("<div class='block-one'>");
        trase($newArray);
        printf("</div>");
        ?> 

    </body >


</html>