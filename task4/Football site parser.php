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
                foreach($seasons->find('a[href^=/football/italy/championship]') as $team_archive_link){
                    $season_period = substr($team_archive_link->innertext, 0, 7);
                    $season_statistic_page = file_get_html("https://terrikon.com".$team_archive_link->href);
                    $championship_table = $season_statistic_page->find('table[class=colored big]')[0];
                    
                    foreach(array_slice($championship_table->find('tr'), 1) as $team_stat){
                        $place = $team_stat->find('td')[0]->innertext;
                        $team = $team_stat->find('td')[1]->plaintext;
                        if($team == $commandForSearch){
                            echo 'Season: '.$season_period.'. Place: '.$place.'<br>';
                            $resultsAmount++;
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