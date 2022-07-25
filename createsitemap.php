<?php

    
class Sitemap{
    public $date;
    private $mysqli;
    
    const URL = 'https://help-ot.ru/';


    function __construct(){
        //$this->mysqli = new mysqli('localhost', 'root','root', 'help-ot');
        $this->mysqli = new mysqli('mysql.hostinger.ru', 'u399962470_help','158754429asd', 'u399962470_help');
        $this->date = new DateTime("now");
    }

    function getDocs(){
        $sql = "SELECT cpu FROM new_docs";
        $result = $this->mysqli->query($sql) or die($this->mysqli->lastErrorMessage());
        for($data = []; $row = $result->fetch_array(MYSQLI_ASSOC); $data[] = $row);
        return $data;
    }

    function getBlogPost(){
        $sql = "SELECT cpu FROM blog";
        $result = $this->mysqli->query($sql) or die($this->mysqli->lastErrorMessage());
        for($data = []; $row = $result->fetch_array(MYSQLI_ASSOC); $data[] = $row);
        return $data;
    }

    function createSiteMap(){
        $dom = new DOMDocument();
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $urlset = $dom->createElement('urlset');
        $dom->appendChild($urlset);
        $xmlns = $dom->createAttribute('xmlns');
        $xmlns->value = "http://www.sitemaps.org/schemas/sitemap/0.9";
        $urlset->appendChild($xmlns);

            $url = $dom->createElement('url');
                    $loc = $dom->createElement('loc', self::URL);
                    $lastmod = $dom->createElement('lastmod', $this->date->format('Y-m-d'));
                    $changefreq = $dom->createElement('changefreq', 'weekly');
            $url->appendChild($loc);
            $url->appendChild($lastmod);
            $url->appendChild($changefreq);
        $urlset->appendChild($url);
        foreach($this->getDocs() as $v){
            $url = $dom->createElement('url');
                $loc = $dom->createElement('loc', self::URL.'docs/'.$v['cpu'].'.html');
                $lastmod = $dom->createElement('lastmod', $this->date->format('Y-m-d'));
                $changefreq = $dom->createElement('changefreq', 'weekly');
            $url->appendChild($loc);
            $url->appendChild($lastmod);
            $url->appendChild($changefreq);
            $urlset->appendChild($url);
        }
        foreach($this->getBlogPost() as $v){
            $url = $dom->createElement('url');
            $loc = $dom->createElement('loc', self::URL.$v['cpu'].'.html');
            $lastmod = $dom->createElement('lastmod', $this->date->format('Y-m-d'));
            $changefreq = $dom->createElement('changefreq', 'weekly');
        $url->appendChild($loc);
        $url->appendChild($lastmod);
        $url->appendChild($changefreq);
        $urlset->appendChild($url);
        }


        $dom->save('sitemap.xml');




    }
}
    $test = new Sitemap;
    $test->createSiteMap();
    

?>