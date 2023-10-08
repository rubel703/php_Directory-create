<?php
/* class One{
    public function test(){
        echo "hello";
        return $this;
    }
    static function test2(){
        echo "rubel";
        return new One();
    }
    public function test3(){
        echo "Hossain";
    }
}

(new One())->test()->test2()->test3(); */

//------------------------------------------------------

 /* interface BaseTest{
    function basicTest($rrr);
    function eyeTest($ttt);
    function selected($name);

}
class DefenceTest implements BaseTest{
    function basicTest($rrr)
    {
        echo "passed basic Test";
    }
    function heightTest() //own method
    {
         echo "passed heigh Test";
    }
    function eyeTest($ttt)
    {
         echo "passed eye Test";
    }
    public function selected($name){
        echo "{$name} is Selected as a Police Officer.";
        }
}
class SoftwareEngineer implements BaseTest{
    function basicTest($rrr)
    {
        echo "passed basic Test";
    }
    
    function eyeTest($ttt)
    {
         echo "passed eye Test";
    }
    public function selected($name){
        echo "{$name} is selected as a software engineer.";
    }
}
class CivilEngineer implements BaseTest{
   function basicTest($rrr){
       echo "passed basicTest";
   }
   function eyeTest($ttt){
       echo "passed eyeTest";
   }
   public function selected($name){
       echo "{$name} is Selected as a Civil Engineer";
   }
}

class Persons{
    private $name;
    public function __construct($names){
        $this->name=$names;
    }
    function person(BaseTest $data){
        $data->selected($this->name);
    }
}
$defence = new DefenceTest();
$swe = new SoftwareEngineer();
$civil = new CivilEngineer();

$person1 = new Persons("Hossain Rubel");
$person1->person($civil);  */
?> 



<?php
$dmsg = "";
$fmsg = "";
$femsg ="";
$ddmsg ="";
$dfmsg ="";

//create folder section
if(isset($_POST['cdbtn'])){
    if(!file_exists($_POST['cdirectory'])){
        mkdir("{$_POST['cdirectory']}", '0777', true);
        $dmsg = "Directory Successfully Created";
    }else{
        $dmsg = "Already Folder exists";
    }
} //print_r($_POST);

//create file section
if(isset($_POST['cfbtn'])){
    if(!file_exists($_POST['cfile'])){
        fopen("{$_POST['cfile']}", 'a', true);
        $fmsg = "File Successfully Created";
    }else{
        $fmsg = "Already File exists";
    }
}

//create file with extension
if(isset($_POST['fcebtn'])){
    $fileInfo = (pathinfo($_POST['cefile']));
    $femsg = "Invalid File Extension";
    if("php" ==  $fileInfo['extension']){
        fopen("{$_POST['cefile']}", "a",true);
        $femsg = "File Successfully Created"; 
    }
    elseif("json"==$fileInfo['extension']){
        fopen("{$_POST['cefile']}","a",true);
        $femsg = "File Successfully Created"; 
    }
    elseif("js"==$fileInfo['extension']){
        fopen("{$_POST['cefile']}","a",true);
        $femsg = "File Successfully Created"; 
    }
    elseif("css"==$fileInfo['extension']){
        fopen("{$_POST['cefile']}","a",true);
        $femsg = "File Successfully Created"; 
    }
}

//rmdir('1');  remove directory
//unlink('');

$allData = scandir(getcwd());
$directories = [];
$files = [];

foreach ($allData as $data){
    if("." != $data && ".." != $data){
        if(is_dir($data)){
            array_push($directories, $data);
        }else{
            array_push($files, $data);
        }
        
    }
}

//remove directory and file
if(isset($_POST['ddbtn'])){
   $path="{$_POST['ddirectory']}";
   remove($path);
    header("Refresh:0");
    $ddmsg = "Directory Successfully Deleted";
}
function remove($dir){
    $structure=glob(rtrim($dir, "/").'/*');
    if(is_array($structure)){
        foreach($structure as $file){
            if(is_dir($file)){
                remove($file);
            }
            elseif(is_file($file)){
                unlink($file);
            }
        }
    }
    rmdir($dir);
}


if(isset($_POST['dfbtn'])){
    unlink("{$_POST['dfile']}");
    header("Refresh:0");
    $dfmsg = "File Successfully Deleted";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strtoupper('directory system'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center pt-2 text-white bg-danger" style="height:70px;">This is Folder and File Make,Delete System</h2>
    <section class="mt-5">
        <div class="container">
    <div class="row">
        <div class="col-md-6 p-4 bg-danger rounded">
            <h2 class="text-white"><?php echo $dmsg; ?></h2>
            <form action="" method="POST">
            <div class="mb-3 text-white ">
            <label for="cd" class="form-label fw-bold ">Create Directory</label>
            <input type="text" class="form-control" id="cd" name="cdirectory" placeholder="Create your Own Directory">
            </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-success fw-bold" id="cdbtn" name="cdbtn" value="Create New Directory">
                    </div>         
            </form>
        </div>
        <div class="col-md-6 p-4 rounded " style="background-color: blue";>
                <h2 class="text-white"><?php echo $fmsg; ?></h2>
                <form action="" method="POST">
                    <div class="mb-3 text-white">
                        <label for="cf" class="form-label fw-bolder ">Create File</label>
                        <input type="text" class="form-control" id="cfile" name="cfile" placeholder="create your own file">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-success fw-bold " id="cfbtn" name="cfbtn" value="Create New File">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
<hr>
    <section class="mt-5">
        <div  class="container">
            <div class="row">
                 <div class="col-md-6 p-4 rounded " style="background-color: black";>
               <h2 class="text-white"><?php echo $femsg; ?></h2>
               <form action="" method="POST">
                   <div class="mb-3 text-white">
                       <label for="cf" class="form-label fw-bold ">Create a file with extension</label>
                       <input type="text" class="form-control" id="cefile" name="cefile" placeholder="Insert file name with extension(demo.php)">
                   </div>
                   <div class="mb-3">
                       <input type="submit" class="form-control btn btn-success fw-bold " id="fcebtn" name="fcebtn" value="Create New File">
                   </div>
                </form>
           </div>
            <div class="col-md-6 p-4 rounded " style="background-color: green";>
                <h2 class="text-white"><?php echo $ddmsg; ?></h2>
                <form action="" method="POST"  style="padding:5% 0 0 14%">
                    <select class="custom-select" name="ddirectory" aria-label="Default select example">
                        <option selected>Select Your Directory</option>
                        <?php foreach ($directories as $directory): ?>
                        <option value="<?php echo $directory; ?>"><?php echo $directory; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" class="btn btn-success fw-bold" id="ddbtn" name="ddbtn" value="Delete Directory" style="background-color:black";>
                </form>
            </div>
            </div>
        </div>
    </section>
<hr>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-4 rounded-pill" style="background-color: orange;">
                     <h2 class="text-white"><?php echo $dfmsg; ?></h2>
                   <form action="" method="POST" style="padding-left:40%">
                    <select class="custom-select" name="dfile" aria-label="Default select example">
                        <option selected>Select Your File</option>
                        <?php foreach ($files as $file): ?>
                        <option value="<?php echo $file; ?>"><?php echo $file; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" class="btn btn-success fw-bold " id="dfbtn" name="dfbtn" value="Delete File" style="background-color:black";>
                </form>
                </div>
            </div>
        </div>
    </section>
    <hr>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


