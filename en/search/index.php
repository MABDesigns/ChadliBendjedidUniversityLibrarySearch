
<?php
define('DB_CHARSET', 'UTF-8');
$conn = new PDO("mysql:host=localhost;dbname=dbname",'username','password',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8") /*for none latin characters*/);
$servername ="localhost";
$username = "username";
$password ="password";
$dbname ="database"; 



@$keywords = $_GET["keywords"];
@$valider = $_GET["valider"];
if(isset($valider) && !empty(trim($keywords))){
    $words=explode(" ",trim($keywords));
        for($i=0; $i<count($words);$i++){
            $kw[$i]="tit1 like '%".$words[$i]."%'";
}

$res = $conn->prepare("SELECT * FROM notices  WHERE ".implode(" and ",$kw));
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();
$tab=$res->fetchAll();
$afficher="oui";
}
?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet"> 

    <!-- Custom Css --> 
    <link href="../style.css" rel="stylesheet">
    <title>Search In Library</title>
  </head>
  <body style="background-color: #998888 !important;     font-family: 'Cairo', sans-serif !important;">
 <br>
 <br>
 <div class="container">
    <div class="nbr">
        Chadli Bendjedid Library Search
    </div>    
 <form action="" method="get">
    <div class="search">
        <div class="row">
            <div class="col">
                <div class="search-2"> <i class='bx bx-search-alt'></i> <input type="text" name="keywords" value="<?php echo $keywords ?>" placeholder="Search Here"> <button type="submit" name="valider">Search</button></div>
            </div> 
            </div>
        </div>
    </div>
</form>
</div>
<br>
<br>
<?php if (@$afficher=="oui"){ ?>
<div class="container">
    <div id="resultats">-
        <div class="nbr">
            <?=count($tab)." ".(count($tab)>1?"Result Found":"Result Found") ?>
        </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Réference</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>

        
        <?php
        
        
         for($i=0; $i<count($tab); $i++){

           $notice=$tab[$i] ["notice_id"];
         


$ress = $conn->prepare("SELECT * FROM exemplaires  WHERE expl_notice= '$notice'");
$ress->setFetchMode(PDO::FETCH_ASSOC);
$ress->execute();
$tabs=$ress->fetchAll();
         

 
         
$resss = $conn->prepare("SELECT n.tit1, n.notice_id, a.author_id, a.index_author, r.responsability_author, r.responsability_notice FROM authors as a INNER JOIN  responsability as r ON a.author_id = r.responsability_author INNER JOIN notices as n WHERE r.responsability_notice = '$notice'");
$resss->setFetchMode(PDO::FETCH_ASSOC);
$resss->execute();
$tabss=$resss->fetchAll();


    ?>

            <tr>
                <td><?php echo $tab[$i] ["tit1"]?></td>
                
                <td><?php if(($tabs[0] ['expl_cote']) == NULL){
                    echo "Unknown";
                }else{
                    echo $tabs[0] ["expl_cote"];
                }
                    ?></td>
              <td><?php if(($tabss[0] ["index_author"]) == NULL){
                  echo 'Unknown';
                }else{
                    echo $tabss[0] ["index_author"];
                }
              ?></td>
                <td <?php if($tab[$i] ["livrestatus"] == "Available") {
                    ?>id="available" <?php } else{ ?>
                     id="reserved" <?php }?>><?php echo $tab[$i] ["livrestatus"]; ?></td>
            </tr> 
        <?php } ?>
        </tbody>
    </table>
<?php } ?>

    </div>
</div>
<style>
    .search {
    background-color: #fff;
    padding: 4px;
    border-radius: 5px
}
.table{
    -webkit-box-shadow: 5px 5px 15px 5px #000000 !important;
box-shadow: 2px 4px 15px 1px #000 !important;
}
td{
    border: 1px solid black !important;
}


::placeholder {
    color: #eee;
    opacity: 1
}

.search-2 {
    position: relative;
    width: 100%
}

.search-2 input {
    height: 45px;
    border: none;
    width: 100%;
    padding-left: 18px;
    
}

.search-2 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

.search-2 i {
    position: absolute;
    top: 12px;
    left: -10px;
    font-size: 24px;
    color: #eee
}

.search-2 button {
    position: absolute;
    right: 1px;
    top: 0px;
    border: none;
    height: 45px;
    background-color: #8A3033;
    color: #fff;
    width: 90px;
    border-radius: 4px
}

@media (max-width:800px) {
    .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
    }

    .search-2 i {
        left: 4px
    }

    .search-2 input {
        padding-left: 34px
    }

    .search-2 button {
        height: 37px;
        top: 5px
    }
}
thead{
    background: #BFB8AD !important;
}
html{
    font-family: Raavi; font-size: 14px !important;
    }
html:lang(en-EN){
    font-family: Verdana; font-size: 12px !important;
    }
#available{
    background: green !important;
    color: white;
}
#reserved{
    background: red !important;
    color: white;
}
.table{
    text-transform: capitalize !important; 
}
.table > tbody{
    background: white !important;
}
.nbr { color: #111;  font-size: 68.75px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; padding-bottom: 20px; }
</style>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="extensions/mobile/bootstrap-table-mobile.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script> 
  </body>
</html>
