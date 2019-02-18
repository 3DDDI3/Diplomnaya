<?php
class Team
{
    var $name;
    var $place;
    var $prize; 
    var $description;
    var $wonTournaments;
    var $logo;
    var $appearenceDate;
    var $site;
    var $achievement;
}
class Players
{
    var $nickname;
}
$team=new Team;
$player=new Players;
$startTime=microtime(true);
$teamName=""; //переменная для хранения информации о названии команды
$ref=""; //переменная для хранения ссылки конкретной команды
$teamPage="";
$teamRef='https://www.cybersport.ru';
    include_once('libraries/curl_query.php');
    include_once('libraries/simplehtmldom_1_7/simple_html_dom.php');
    $html=curl_get("https://www.cybersport.ru/base/teams?sort=amount&page=1&disciplines=21");
    $dom=str_get_html($html);
    foreach ($dom->find('#active tr') as $teamTable){
        if($teamTable->children(1)->plaintext!="Команда"){
            $ref=substr($teamTable->children(1)->innertext, strpos($teamTable->children(1)->innertext, '"')+1, strpos($teamTable->children(1)->innertext, '" ')-2-strpos($teamTable->children(1)->innertext, '="')); //ссылка на страницу команды
        }
        if($teamTable->children(3)->plaintext!="Сумма призовых"){$team->prize[]=$teamTable->children(3);} //сумма призовых
        if($ref!=null)
        {
            $html=curl_get($teamRef.$ref);
            $dom=str_get_html($html);
        }
        foreach ($dom->find('.page--team') as $page) {
            $team->logo[]=substr($page->children(1)->children(0)->children(0)->innertext, strpos($page->children(1)->children(0)->children(0)->innertext, '"')+1, strpos($page->children(1)->children(0)->children(0)->innertext, '" ')-1-strpos($page->children(1)->children(0)->children(0)->innertext, '"')); //ссылка на лого команды
            $team->name[]=$teamName=$page->children(1)->children(0)->children(1)->children(0)->children(0)->plaintext; //название команды
            $team->appearenceDate[]=$page->children(1)->children(0)->children(1)->children(0)->children(1)->plaintext; //дата появления команды
            $team->site[]=substr($page->children(1)->children(0)->children(1)->children(0)->children(2)->plaintext, strpos($page->children(1)->children(0)->children(1)->children(0)->children(2)->plaintext, " ")); //сайт команды
            $team->prize[]=substr($page->children(1)->children(0)->children(1)->children(1)->plaintext, strpos($page->children(1)->children(0)->children(1)->children(1)->plaintext, " ")+1); //призовые команды
            $team->description[]=$page->children(1)->children(2)->children(1)->children(0)->plaintext; //описание команды
            $team->achievement[]=$page->children(1)->children(2)->children(1)->children(1)->plaintext; //достижения команды
            foreach ($dom->find('.gamers__list--active .gamers__item') as $players) {
                echo $players;
                //$player->nickname[]=$players->children(1)->plaintext;
            }
        }
    }
    var_dump($player);
    echo number_format((microtime(true)-$startTime)/60, 2, ":" ,"");
?>