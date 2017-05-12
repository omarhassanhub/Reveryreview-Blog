<?php           
require_once 'Include_Functions/form_functions.inc.php';  

  if (isset($_POST['submit']) ) {  
      $errors = array();  
      $required_fields = array(
	  'isbn', 
	  'title', 
	  'edition', 
	  'bookImage', 
	  'first',  
	  'last', 
	  'day', 
	  'month', 
	  'year', 
	  'type', 
	  'price', 
	  'contFirst', 
	  'contLast',
	  'postedDate', 
	  'first-para', 
	  'second-para');  
      $errors = array_merge($errors, check_required_fields($required_fields, $_POST));  
     
    if(isset(
	
	$_POST['isbn'],
	$_POST['title'],
	$_POST['edition'], 
	$_POST['first'], 
	$_POST['middle'], 
	$_POST['last'], 
	$_POST['day'], 
	$_POST['month'], 
	$_POST['year'], 
	$_POST['type'], 
	$_POST['price'],
	$_POST['contFirst'], 
	$_POST['contMiddle'], 
	$_POST['contLast'], 
	$_POST['postedDate'], 
	$_POST['first-para'], 
	$_POST['second-para'] 
	
	) ) {
	  $isbn_numberNode = trim($_POST['isbn']);
      $title_textNode = trim($_POST['title']);
	  $edition_numberNode = trim($_POST['edition']);
	  $first_textNode = trim($_POST['first']);
	  $middle_textNode = trim($_POST['middle']);
	  $last_textNode = trim($_POST['last']);
	  $day_numberNode = trim($_POST['day']);
	  $month_numberNode = trim($_POST['month']);
	  $year_numberNode = trim($_POST['year']);
	  $type_textNode = trim($_POST['type']);
	  $price_textNode = trim($_POST['price']);
	  $contFirst_textNode = trim($_POST['contFirst']);
	  $contMiddle_textNode = trim($_POST['contMiddle']);
	  $contLast_textNode = trim($_POST['contLast']);
	  $postedDate_textNode = trim($_POST['postedDate']);
      $firstParagraph_textNode  = trim($_POST['first-para']);
      $secondParagraph_textNode = trim($_POST['second-para']);

    }
    
  
    $img_name      = trim($_FILES['bookImage']['name']);  
    $img_temp_name = $_FILES["bookImage"]["tmp_name"];    
    $img_type      = $_FILES["bookImage"]["type"];
    $img_size      = number_format($_FILES["bookImage"]["size"]/1024, 1). ' kb'; 
    $img_path      = UPLOAD_DIR . $img_name;    
    $img_max_size  = number_format(MAX_FILE_SIZE/1024, 1).' KB';  


    $permitted_type = array('image/gif','image/jpeg','image/png');


    $img_extension = substr($img_name, strrpos($img_name, '.') + 1);

    if (in_array($img_type, $permitted_type)        
        && !file_exists(UPLOAD_DIR . $img_name)  
        && $img_size > 0                        
        && $img_size <= MAX_FILE_SIZE
        && !check_required_fields($required_fields, $_POST)
        ){   
   
       move_uploaded_file($img_temp_name, UPLOAD_DIR.$img_name);    
      
    }else {  
 
          switch($img_name){ 
            case(file_exists(UPLOAD_DIR . $img_name)): 
            $errors[]= "$img_name already exists.<br/> Choose a another picture or change the name of the picture you are  trying to upload";
            break; 
           
            case(!in_array($img_type, $permitted_type)): 
            $errors[]= "$img_extension is not a valid file type. <br/> Acceptable picture formats include: JPEG and PNG.";
            break;
            case(empty($_POST['image']) ): 
            $errors[]= "You cannot upload a picture alone. It has to be related to blog. Please, sumbit a blog.";
            break;
        
            case($img_name == UPLOAD_ERR_NO_FILE):
            $errors[]= "You did not choose a file to be uploaded."; 
            break; 
          
            case($img_name == UPLOAD_ERR_INI_SIZE): 
            case($img_name == UPLOAD_ERR_FORM_SIZE):
            $errors[]="$img_name is either too big or not a valid file.";
            break; 
            default: 
            $errors[]= "Error uploading file. Please try again.";                  
            break; 
          }
    }   
    
    if(empty($errors)) {  
		$doc = new DOMDocument();
		$doc->load('bookxml.xml', LIBXML_NOBLANKS);
		$doc->formatOutput = true;

		$root_element = $doc->getElementsByTagName("books")->item(0); 
	
		$new_article = $doc->createElement("book"); 
	  

		$domAttribute = $doc->createAttribute('isbn');
		$domAttribute->appendChild( 
                $doc->createTextNode($isbn_numberNode) 
                ); 

		$new_article->appendChild($domAttribute);
		$doc->appendChild($new_article);


        $title = $doc->createElement("title"); 
        $title->appendChild( 
                $doc->createTextNode($title_textNode) 
                ); 
        $new_article->appendChild($title); 
		
		$edition = $doc->createElement("edition"); 
        $edition->appendChild( 
                $doc->createTextNode($edition_numberNode) 
                ); 
        $new_article->appendChild($edition); 
	
		$new_content1 = $doc->createElement("author");
		
		$first = $doc->createElement("first"); 
        $first->appendChild( 
                $doc->createTextNode($first_textNode) 
                ); 
        $new_content1->appendChild($first); 
		
		$middle = $doc->createElement("middle"); 
        $middle->appendChild( 
                $doc->createTextNode($middle_textNode) 
                ); 
        $new_content1->appendChild($middle); 
		
		$last = $doc->createElement("last"); 
        $last->appendChild( 
                $doc->createTextNode($last_textNode) 
                ); 
        $new_content1->appendChild($last); 
		
		$new_content2 = $doc->createElement("publishedDate");
		
		$day = $doc->createElement("day"); 
        $day->appendChild( 
                $doc->createTextNode($day_numberNode) 
                ); 
        $new_content2->appendChild($day); 
		
		$month = $doc->createElement("month"); 
        $month->appendChild( 
                $doc->createTextNode($month_numberNode) 
                ); 
        $new_content2->appendChild($month); 
		
		$year = $doc->createElement("year"); 
        $year->appendChild( 
                $doc->createTextNode($year_numberNode) 
                ); 
        $new_content2->appendChild($year); 
	
		$type = $doc->createElement("type"); 
        $type->appendChild( 
                $doc->createTextNode($type_textNode) 
                ); 
        $new_article->appendChild($type); 
	
		$price = $doc->createElement("price"); 
        $price->appendChild( 
                $doc->createTextNode($price_textNode) 
                ); 
        $new_article->appendChild($price); 
	
		$new_content3 = $doc->createElement("contributor");
		
		$contFirst = $doc->createElement("contFirst"); 
        $contFirst->appendChild( 
                $doc->createTextNode($contFirst_textNode) 
                ); 
        $new_content3->appendChild($contFirst); 

		$contMiddle = $doc->createElement("contMiddle"); 
        $contMiddle->appendChild( 
                $doc->createTextNode($contMiddle_textNode) 
                ); 
        $new_content3->appendChild($contMiddle);
		
		$contLast = $doc->createElement("contLast"); 
        $contLast->appendChild( 
                $doc->createTextNode($contLast_textNode) 
                ); 
        $new_content3->appendChild($contLast);
		
		$postedDate = $doc->createElement("postedDate"); 
        $postedDate->appendChild( 
                $doc->createTextNode($postedDate_textNode) 
                ); 
        $new_content3->appendChild($postedDate);
		
		
        $img = $doc->createElement("bookImage");  
        $img->appendChild(
              $doc->createTextNode($img_path) 
              ); 
        $new_article->appendChild($img);
          
		
		
      
        $new_para1 = $doc->createElement("firstParagraph");
        $new_para1->appendChild(                     
                    $doc->createTextNode($firstParagraph_textNode)
                    );
        $new_article->appendChild($new_para1);
        
        $new_para2 = $doc->createElement("secondParagraph");
        $new_para2->appendChild( 
                    $doc->createTextNode($secondParagraph_textNode)
                    );
        $new_article->appendChild($new_para2);
              
          
        $new_article->appendChild($new_content1);
		$new_article->appendChild($new_content2); 
		$new_article->appendChild($new_content3);	
        $root_element->appendChild($new_article);    
      
        
        if ($doc->save("bookxml.xml") != FALSE ) { 
           
            header('Location: login.php' );
            exit;
        } 
        else {
              echo 'An error occured.'; 
      } 
          
    } 

  }  
  
?>  

