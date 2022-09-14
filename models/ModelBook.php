<?php
    class ModelBook extends Model {
           public function allBooks(){
            $db=$this->getDb();

            $req = $db->query('SELECT `id_book`, `title`, `book`.`id_author`, `name_author`, `nationality`, `book`.`id_category`, `name_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`, `id_language` FROM `book` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author` INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category` ORDER BY `title`');

            $reqCategories = $db->query('SELECT `id_category`, `name_category` FROM `category` ORDER BY `name_category`');
            $reqLanguages = $db->query('SELECT `id_language`, `language` FROM `language`');

            $books = [];
            $author = [];
            $categories = [];
            $languages = [];

            while ($book = $req->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($book);
                $author[] = new Author($book);
            }
            while ($category = $reqCategories->fetch(PDO::FETCH_ASSOC)){
                $categories[] = new Category($category);
            }
            while ($language = $reqLanguages->fetch(PDO::FETCH_ASSOC)){
                $languages[] = new Language($language);
            }

            return array($books, $author, $categories, $languages);
        }
        public function suggest(){
            $db=$this->getDb();
            $req = $db->query('SELECT `id_book`, `title`, `book`.`id_author`, `book`.`id_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`,`id_language`, `category`.`id_category`, `name_category` FROM `book`  INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category`  INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author` ORDER BY `publication_date` DESC ');
            $books = [];
            $genre = [];
          
            while ($sgg = $req->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($sgg);
                $genre[] = new Category($sgg);
            }
            
            return array($books,$genre);
        }
        public function select($id){
            $db=$this->getDb();
            $req = $db->prepare('SELECT `id_book`, `title`, `book`.`id_author`, `book`.`id_category`,`language`.`id_language`, `book`.`id_publisher`, `book`.`id_language`,`language`,`category`.`id_category`, `name_category`,`publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `publisher`.`id_publisher`,`name`, `location`, `author`.`id_author`,`name_author`, `nationality` FROM `book` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author`INNER JOIN `category` ON `book`.`id_category`= `category`.`id_category` INNER JOIN `language` ON `book`.`id_language` = `language`.`id_language` INNER JOIN `publisher` ON `book`.`id_publisher` = `publisher`.`id_publisher` WHERE `book`.`id_book` = :id');
            
            $req->bindParam('id', $id, PDO::PARAM_INT);
            $req->execute();

            $infosbook = $req->fetch(PDO::FETCH_ASSOC);

            $book = new Book($infosbook);
            $author = new Author($infosbook);
            $category = new Category($infosbook);
            $language = new Language($infosbook);
            $publisher = new Publisher($infosbook);

            return array($book,$author,$category,$language,$publisher);
        }

        public function search(){
            $db=$this->getDb();
            if(isset($_GET['search'] )){

                $recherche = '%$recherche%';

                $req = $db->prepare("SELECT `title`,`book`.`id_book`,`book`.`id_author`,`cover`,`description`,`author`.`id_author`,`author`.`name_author` FROM `book` INNER JOIN `author` ON `author`.`id_author` = `book`.`id_author` WHERE `title` LIKE'%$recherche%'");

                $req->bindParam(':search', $recherche, PDO::PARAM_STR);
                $req->execute();

                $datas = [];
                $datasauthor = [];

                while ($dt = $req->fetch(PDO::FETCH_ASSOC)) {
                    $datas = new Book ($dt);
                    $datasauthor = new Author($dt);
                }
                
                if (isset($_GET['category'] )) {

                    $category = $_GET['category'];

                    $req2 = $db->prepare("SELECT `title`,`description`, `book`.`id_category`, `category`.`id_category`, `category`.`name_category` FROM `category`  INNER JOIN `book` ON `book`.`id_category` = `category`.`id_category` WHERE `book`.`id_category` LIKE `book`.`id_category`");

                    $req2->bindParam(':id_category', $category, PDO::PARAM_INT);
                    $req2->execute();

                    $catresult = $req2->fetch(PDO::FETCH_ASSOC);

                    $dt = new Book($catresult);

                }

                return array($datas,$datasauthor,$dt);
            }  
        }
    }   
