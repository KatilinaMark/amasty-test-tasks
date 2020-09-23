<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class First{
            function getClassname(){
                echo static::class."<br>";
            }

            function getLetter(){
                echo "A<br>";
            }
        }

        class Second extends First{
            function getLetter(){
                echo "B<br>";
            }
        }

        $obj1 = new First;
        $obj2 = new Second;

        $obj1->getClassname();
        $obj2->getClassname();
        $obj1->getLetter();
        $obj2->getLetter();
    ?>
</body>
</html>