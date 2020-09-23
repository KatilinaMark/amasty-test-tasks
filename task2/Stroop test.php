<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="Stroop test.php" method="post">
        <button type="submit" name="button">Generate Stroop Test</button>
    </form>
    <div>
    <?php
    class StroopColor{
        static $colorName_Array = [];
        static $color_Array = [];

        public $colorName;
        public $color;

        function __construct(){
            global $colorArray;
            $index1 = rand(0, 9);
            $this->colorName = $colorArray[$index1];
            
            if(in_array($this->colorName, self::$colorName_Array)){
                while(in_array($this->colorName, self::$colorName_Array)){
                    $index1 = rand(0, 9);
                    $this->colorName = $colorArray[$index1];                
                }
                self::$colorName_Array[] = $this->colorName;
            }
            else{
                self::$colorName_Array[] = $this->colorName;
            }

            $index2 = rand(0, 9);
            $this->color = $colorArray[$index2];

            if($index1 == $index2 || in_array($this->color, self::$color_Array)){
                while(true){
                    $index2 = rand(0, 9);
                    $this->color = $colorArray[$index2];
                    if($index1 != $index2 && !in_array($this->color, self::$color_Array)){
                        break;
                    }
                }
            }
            self::$color_Array[] = $this->color;
        }
    }

    $colorArray = ["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];
    
    if(isset($_POST['button'])){
        $color1 = new StroopColor();
        $color2 = new StroopColor();
        $color3 = new StroopColor();
        $color4 = new StroopColor();
        $color5 = new StroopColor();   

        echo "<p style=color:".$color1->color.">".$color1->colorName."</p>";
        echo "<p style=color:".$color2->color.">".$color2->colorName."</p>";
        echo "<p style=color:".$color3->color.">".$color3->colorName."</p>";
        echo "<p style=color:".$color4->color.">".$color4->colorName."</p>";
        echo "<p style=color:".$color5->color.">".$color5->colorName."</p>";
    }
?>
    </div>
</body>
</html>