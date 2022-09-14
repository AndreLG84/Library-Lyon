<?php
class ControllerBook extends Controller {
    public  function listAll(){
        $twig = self::getTwig();
        $manager = new ModelBook();
        $allBooks = $manager->allBooks();

        echo $twig->render('homepage.twig', ['books' => $allBooks[0], 'authors' => $allBooks[1], 'categories' => $allBooks[2], 'languages' => $allBooks[3], 'base' => self::$_base]);
    }

    public function readMore($id){
        $twig = self::getTwig();
        $manager = new ModelBook();
        $infosbook= $manager->select($id);
        
        echo $twig->render('infosbook.twig', ['book' => $infosbook[0], 'author' => $infosbook[1], 'category' => $infosbook[2], 'language' => $infosbook[3], 'publisher' => $infosbook[4], 'base' => self::$_base]);
    }

    public function suggbook(){
        $twig = self::getTwig();
        $data = new ModelBook();
        $lastbk = $data->suggest();
        
        echo $twig->render('suggestion.twig', ['books' => $lastbk[0], 'genre' => $lastbk[1],'base' => self::$_base]);
    }

    public function searchBy(){
        $twig = self::getTwig();
        $manager = new ModelBook();
        $recherche = $_GET;
        $dt = $manager->search($recherche);
        
        echo $twig->render('search.twig',['datas'=> $dt[0],'datasauthor'=>$dt[1], 'base' => self::$_base]);
    }
 
}