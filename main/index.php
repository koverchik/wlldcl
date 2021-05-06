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
                        printf("<li class='one-item'>$value </li>");
                    }
                }
        }
        printf("<ul class='block-one'>");
        trase($newArray);
        printf("</ul>");
        ?> 
        <h1>Task 2</h1>
        <h3>1. Вывести все книги и их авторов.</h3>
        <code> SELECT * FROM books LEFT JOIN authors ON books.author_id = authors.id;</code>
        <h3>2. Найти авторов, у которых нет ни одной книги.</h3>
        <code>SELECT * FROM books RIGHT JOIN authors ON books.author_id = authors.id WHERE books.author_id IS NULL;</code>
        <h3>3. Найти авторов, у которых больше одной книги.</h3>
        <code>SELECT name FROM authors where 1 < (SELECT  COUNT(*) AS CountBook FROM books WHERE books.author_id = authors.id);</code>
    </body >


</html>