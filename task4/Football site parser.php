<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Football site parser.php" method="post">
        <input type="text" name="team-name" placeholder="Enter the name of the team">
        <button type="submit" name="find-team">Search team</button>
    </form>

    <?php 
        include_once 'simple_html_dom.php';

        $archive_html = file_get_html("https://terrikon.com/football/italy/championship/archive");

        if(isset($_POST['find-team'])){
            $commandForSearch = $_POST['team-name'];
            $resultsAmount = 0;

            foreach($archive_html->find('div[class=tab]') as $seasons){
                foreach($seasons->find('dd') as $tags){
                    foreach($tags->find('a') as $link){
                        $season_statistic_page = file_get_html("https://terrikon.com".$link->href);
                        foreach($season_statistic_page->find('table[class=colored big]') as $season_statistic){
                            foreach(array_slice($season_statistic->find('tr'), 1) as $info){
                                $commandRating = $info->find('td')[0];
                                $season = substr($link->innertext, 0, 7);
                                $commandName = $info->find('td')[1]->find('a[href^=/football/teams]')[0]->innertext;

                                if($commandForSearch == $commandName){
                                    echo "Место $commandRating Сезон $season<br>";
                                    $resultsAmount++;
                                }
                            }
                        }
                    }
                }
            }

            if($resultsAmount == 0){
                echo "По вашему запрому не найдено результатов для данной команды";
            }
    }   
    ?>
</body>
</html>