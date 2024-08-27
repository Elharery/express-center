
<?php
session_start();
error_reporting(0);
$conn = new mysqli("localhost" , "root" , "" , "express");
// 
$getCode = "SELECT * FROM admins where type = 'code'";
$queryGetCode = mysqli_query($conn , $getCode);
$valueOfCode;
while ($code = mysqli_fetch_assoc($queryGetCode)){
    $valueOfCode = $code["pass"];
}
if(mysqli_num_rows($queryGetCode) > 0){
    if(isset($_COOKIE["googleApi"])){
        if($_COOKIE["googleApi"] != $valueOfCode){
            // $_COOKIE["googleApi"] = "";
        setcookie("googleApi" , "" , time() - 3600 , "/");
        header("Refresh: .1;");
        }
    }
}
// 
$arrStage;
$expiration_time = time() + (5 * 365 * 24 * 60 * 60) ;
// -----------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST["setStToTch"])){
    $nameOfTeacher = $_POST["nameOfTch"];
    $nameOfStudent = $_POST["nameOfSt"];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submitCode"])){
        // echo $valueOfCode;
        if($_POST["code"] == $valueOfCode){
            setcookie("googleApi" , $valueOfCode , $expiration_time,"/");
            header("Refresh: .3");
            exit();
        }else{
            echo "<script>alert('خطأ')</script>";
            // header("Refresh: .3");
        }
    }
if(isset($_POST["setStToTch"])){
    $arrStages = array();
    $arrClasses = array();
    $myArrStudent;
    $myArrAddMoreSt;
    $encodeMyarrMoreSt;
    $encodeMyarrStudent;
    $idTch;
    $nameTch;
    $stageOfTeacher;
    $nameStudent;
    $stageStudent;
    $classStudent;
    // 
    $attempts = "";
    $attemptsSt = "";
    $arrayStudent = array();
    $testArray = array();
    
    $testArray2 = [];
    $studentsOfTeacher = array();
    $studentsOfTeacherTest = array();
    $stagesOfTeacherArray = array();
    $sdf = array("asd" , "Dsadssdf" , "SADF");
    $checkTeacherFound = true;
    $checkStudentFound = true;
    // 

    $checkTeachers = "select * from tchs where userName = '$nameOfTeacher' OR id = '$nameOfTeacher'";
    $queryCheckTeachers = mysqli_query($conn , $checkTeachers);
    while($queryTest = mysqli_fetch_assoc($queryCheckTeachers))
    {
        // $r = $queryTest["userName"];
        // if($row["userName"] == $nameOfTeacher){
        // array_push($testArray , [$queryTest["userName"] , $queryTest["subject"]]);
        array_push($testArray , $queryTest["userName"]);
        // $testArray2["$r"] = $queryTest["subject"];
    }
    foreach($testArray as $tch){
        $attempts .= "\\n" . $tch;
    }
    if(mysqli_num_rows($queryCheckTeachers) > 0)
    {
        if(mysqli_num_rows($queryCheckTeachers) > 1){
            $checkTeacherFound = false;
            echo "<script>alert('يوجد مدرسين بنفس الأسم يرجى الإختيار ب ID')</script>";
        }
    }else{
        echo "<script>alert('لا يوجد هذا المدرس')</script>";
        $checkTeacherFound = false;
    }
    // --------------------------------------------------------------------------------------------------------------------------------------------
    $checkStudentSql = "select * from students where userName = '$nameOfStudent' OR id = '$nameOfStudent'";
    $queryCheckStudent = mysqli_query($conn , $checkStudentSql);
    while($queryGetStudentL = mysqli_fetch_assoc($queryCheckStudent))
    {
        array_push($arrayStudent , $queryGetStudentL["userName"]);
    }
    foreach($arrayStudent as $perStudent){
        $attemptsSt .= "\\n" . $perStudent;
    }
    if(mysqli_num_rows($queryCheckStudent) > 0)
    {
        if(mysqli_num_rows($queryCheckStudent) > 1){
            $checkStudentFound = false;
            echo "<script>alert('يوجد طالبين بنفس الأسم يرجى الإختيار ب ID')</script>";
        }
    }else{
        echo "<script>alert('لا يوجد هذا الطالب ')</script>";
        $checkStudentFound = false;
    }
    // sql queries
    $sqlGetTeacher = "select * from tchs where userName = '$nameOfTeacher' OR id = '$nameOfTeacher'";
    $queryGetTeacher = mysqli_query($conn , $sqlGetTeacher);
    $sqlGetTeacher2 = "select * from tchs where userName = '$nameOfTeacher' OR id = '$nameOfTeacher'";
    $queryGetTeacher2 = mysqli_query($conn , $sqlGetTeacher2);
    $sqlGetStudent = "select * from students where userName = '$nameOfStudent' OR id = '$nameOfStudent'";
    $queryGetStudent = mysqli_query($conn , $sqlGetStudent);
    $sqlGetStudent2 = "select * from students where userName = '$nameOfStudent' OR id = '$nameOfStudent'";
    $queryGetStudent2 = mysqli_query($conn , $sqlGetStudent2);
    // 
    // echo mysqli_num_rows($queryGetTeacher);
    while($rowTeacher = mysqli_fetch_assoc($queryGetTeacher2))
    {

        $stageOfTeacher2 = $rowTeacher["mainStage"];
    }
    while($rowStudent = mysqli_fetch_assoc($queryGetStudent2))
    {

        $stageStudent2 = $rowStudent["stage"];
    }
    while($row = mysqli_fetch_assoc($queryGetTeacher))
    {
        // if($row["userName"] == $nameOfTeacher){
            $nameTch = $row["userName"];
            $idTch = $row["id"];
            $stageOfTeacher = $row["mainStage"];
            $classesOfTeacher = $row["stages"];
            // array_push($stagesOfTeacherArray, json_decode($row["stages"]));
            
            $stagesOfTeacherArray = json_decode($row["stages"] , true);
            // array_push($mohamedArray ,json_decode($row["stages"] , true) => "1");
            // }
            // echo $stagesOfTeacherArray[0];
            // foreach(json_decode($row["stages"]) as $test5){
                // if(in_array("2" , json_decode($row["stages"]))){
                //     echo "22";
                // }else{
                //     echo "AS";
                // }
            // }
        }
        $sqlStudentWithTeacher = "select * from tchs_and_students where teacherID = '$idTch'";
        $queryStudentWithTeacher = mysqli_query($conn , $sqlStudentWithTeacher);
        while($getSt = mysqli_fetch_assoc($queryGetStudent))
        {
            // if($row["userName"] == $nameOfTeacher){
        $nameStudent = $getSt["userName"];
        $stageStudent = $getSt["stage"];
        $classStudent = $getSt["currStage"];
        // }
    }
    // if(in_array($classStudent, $stagesOfTeacherArray)){
    //     foreach($stagesOfTeacherArray as $te){
    //         echo $te . "<br>";
    //     }
    // }else{
    //     foreach($stagesOfTeacherArray as $te){
    //         echo $te . "<br>";
    //     }
    // }
    while($GetQueryStudentWithTeacher = mysqli_fetch_assoc($queryStudentWithTeacher))
    {
        $studentsOfTeacher = json_decode($GetQueryStudentWithTeacher["students"] , true);
        // array_push($studentsOfTeacherTest , json_decode($row))
        // if($row["userName"] == $nameOfTeacher){
            // $stageStudentWithTeacherAdd = $GetQueryStudentWithTeacher["stage"];
        // $classStudentWithTeacherAdd = $GetQueryStudentWithTeacher["class"];
        // array_push($arrStages , $GetQueryStudentWithTeacher["stage"]);
        $arrStages = json_decode($GetQueryStudentWithTeacher["stage"] , true);
        $arrClasses = json_decode($GetQueryStudentWithTeacher["class"] , true);
        $arrStages2 = $GetQueryStudentWithTeacher["stage"];
        $arrClasses2 = $GetQueryStudentWithTeacher["class"];
        // array_push($arrClasses , $GetQueryStudentWithTeacher["class"]);
        $stagesOfTeacherTest2 = $GetQueryStudentWithTeacher["stage"];
        $getIdTeacherFromTabel = $GetQueryStudentWithTeacher["teacherID"];
        // }
        // echo $GetQueryStudentWithTeacher["stage"] . " ";
        // echo ($arrClasses2 == 3 ? "3 added " : $arrClasses2);
    }
    //  add student and teacher
    // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkTchr"]))
    // {
    //     $nameTch = $_POST["chooseTeacher"];
    // }
    // foreach($arrClasses2 as $moh){
    // }
    // exit();
    if($_SERVER["REQUEST_METHOD"] == "POST" && $checkTeacherFound ==  true && $checkStudentFound == true){
        if(isset($_POST["setStToTch"]))
        {
            // $sqlStudentWithTeacher = "select * from tchs_and_students where teacherID = '$idTch'";
            // $queryStudentWithTeacher = mysqli_query($conn , $sqlStudentWithTeacher);
            // echo mysqli_num_rows($queryStudentWithTeacher);
            if(mysqli_num_rows($queryStudentWithTeacher) != 0){
                // echo $getIdTeacherFromTabel;
                if(in_array($nameStudent , $studentsOfTeacher)){
                    // foreach($studentsOfTeacher as $testss){
                        //     echo $testss . " ";
                        // }
                        echo "<script>alert('تم إضافة $nameStudent من قبل');</script>";
                        // echo "$nameStudent";
                    header("Refresh: .3;");
                    exit();
                }
                // while($roww = mysqli_fetch_assoc($queryGetTeacher))
                // {
                // // array_push($stagesOfTeacherArray, json_decode($roww["stages"] , true));
                // $stagesOfTeacherArray = json_decode($roww["stages"] , true);
                // }
                // while($rowCheckClass = mysqli_fetch_assoc($queryGetTeacher))
                // {
                        // }
                        // if(in_array($classStudent, json_decode($rowCheckClass["stages"])))
                        // if()
                        $queryStudentWithTeacherFinal = mysqli_query($conn , "SELECT * FROM tchs_and_students WHERE teacherID = '$idTch'");
                        while ($getFinalData = mysqli_fetch_assoc($queryStudentWithTeacherFinal)){
                            // echo "asddassasdssa";
                            if($stageStudent == $getFinalData["stage"]){
                                if(in_array($classStudent , $stagesOfTeacherArray)){

                                    if( $classStudent == $arrClasses2){
                                        
                                        $myArrAddMoreSt = [...json_decode($getFinalData["students"] , true) , $nameStudent];
                                    $encodeMyarrMoreSt = json_encode($myArrAddMoreSt , JSON_UNESCAPED_UNICODE);
                                    
                                    // echo $ele;
                                    $updateStudents = $conn->prepare("UPDATE tchs_and_students SET students = ? where stage = ? and class = ?");
                                    $updateStudents->bind_param( "sss" , $encodeMyarrMoreSt , $stageStudent ,$classStudent);
                                    if(!$updateStudents->execute()){
                                        echo "Error [update student 2] Contact With Call Center: " . $updateStudents->error;
                                        // setcookie("rp$idPro" , "$idPro-rp" , strtotime("now") , "/");
                                    }else{
                                        // echo "executed";
                                    echo "<script>alert('تم إضافة الطالب $nameStudent => $nameTch')</script>";
                                    header("Refresh: .3;");
                                    exit();
                                    }
                                    
                                } ///////// if not class 
                                else{
                                    
                                $myArrStudent = [$nameStudent];
                                $encodeMyarrStudent = json_encode($myArrStudent , JSON_UNESCAPED_UNICODE);
                                $studentWithTeacher = $conn->prepare("INSERT INTO tchs_and_students(students, teacherID , teacherName , stage , class , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? )");
                                $studentWithTeacher->bind_param("sissssss" , $encodeMyarrStudent , $idTch , $nameTch , $stageStudent , $classStudent , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
                                if($studentWithTeacher->execute()){
                            echo "<script>alert('تم إضافة الطالب $nameStudent إلى $nameTch بنجاح')</script>";
                            header("Refresh: .3;");
                            exit();
                            // }
                        }
                    }
                }else{
                    echo "<script>alert('صف الطالب ليس من صفوف المدرس')</script>";
                    header("Refresh: .3;");
                    exit();
                }
                            } ///// end of stage
                            else{
                            echo "<script>alert('الطالب $nameStudent ليس من مراحل $nameTch')</script>";
                            header("Refresh: .3;");
                            exit();
                            // exit();
                            // }
                            }
                        }
                        
//                         if($stageStudent == $stageOfTeacher){
//                         if(in_array($stageStudent, $stagesOfTeacherArray))
//                         {
//                             if(in_array($classStudent, $stagesOfTeacherArray)){

//                                 $myArrStudent = [$nameStudent];
//                                 $encodeMyarrStudent = json_encode($myArrStudent , JSON_UNESCAPED_UNICODE);
//                                 $studentWithTeacher = $conn->prepare("INSERT INTO tchs_and_students(students, teacherID , teacherName , stage , class , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? )");
//                                 $studentWithTeacher->bind_param("sissssss" , $encodeMyarrStudent , $idTch , $nameTch , $stageStudent , $classStudent , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
//                                 if($studentWithTeacher->execute()){
//                             echo "<script>alert('تم إضافة الطالب $nameStudent إلى $nameTch بنجاح')</script>";
//                             // }
//                         }
//                     }else{
//                         echo "<script>alert('#1 صف الطالب ليس من صفوف المدرس')</script>";
//                     }
//                 }
                    
                
//             }else{
//                 // foreach($arrStages as $item){
//                     if(in_array($stageStudent , $arrStages2)){
//                         // echo "sS ";
//                         // foreach($arrClasses as $item2)
//                         // {
                            
//                             if(in_array($classStudent , $arrClasses2)){
//                                 // echo "sC";
//                                 $test1 = "select * from tchs_and_students where teacherID = '$idTch' and stage = '$stageStudent' and class = '$classStudent'";
//                                 $test2 = mysqli_query($conn , $test1);
//                                 while($st2 = mysqli_fetch_assoc($test2)){
//                                     if(!empty(json_decode($st2["students"])))
//                                     {
//                                     echo "<script>alert('تم تسجيل الطالب من قبل')</script>";
//                                                     // if (str_contains($UserId, $_SESSION["id"])) {
//                                                     if (!in_array($nameStudent , json_decode($st2["students"]))) {
                                                    
//                                                 // if($y != "f"){
//                                                     $myArrAddMoreSt = [...json_decode($st2["students"] , true) , $nameStudent];
//                                                         $encodeMyarrMoreSt = json_encode($myArrAddMoreSt , JSON_UNESCAPED_UNICODE);
                                                        
//                                                         // echo $ele;
//                                                         $updateStudents = $conn->prepare("UPDATE tchs_and_students SET students = ? where stage = ? and class = ?");
//                                                         $updateStudents->bind_param( "sss" , $encodeMyarrMoreSt , $stageStudent ,$classStudent);
//                                                         if(!$updateStudents->execute()){
//                                                             echo "Error [BLKS 2] Contact With Call Center: " . $updateBlks->error;
//                                                             // setcookie("rp$idPro" , "$idPro-rp" , strtotime("now") , "/");
//                                                         }else{
//                                                             // echo "executed";
//                                                         echo "<script>alert('تم إضافة الطالب $nameStudent => $nameTch')</script>";
//                                                         }
                                                        
//                                                     }
//                                                 }
//                                             }
//                             }
//                             else{
//                                 if($stageStudent == $stageOfTeacher){
//                                     // while($rowCheckClass2 = mysqli_fetch_assoc($queryGetTeacher))
//                                     // {
//                                             // }
//                                             // while($roww = mysqli_fetch_assoc($queryGetTeacher))
//                                             // {
//                                             // array_push($stagesOfTeacherArray, json_decode($roww["stages"] , true));
//                                             // }
//                                             // if(in_array($classStudent, json_decode($rowCheckClass2["stages"])))
//                                             if(in_array($classStudent, $stagesOfTeacherArray))
//                                             {

//                                     echo "no";
//                                     $myArrStudent2 = [$nameStudent];
//                                     $encodeMyarrStudent2 = json_encode($myArrStudent2 , JSON_UNESCAPED_UNICODE);
//                                     $studentWithTeacher2 = $conn->prepare("INSERT INTO tchs_and_students(students, teacherID , teacherName , stage , class , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? )");
//                                     $studentWithTeacher2->bind_param("sissssss" , $encodeMyarrStudent2 , $idTch , $nameTch , $stageStudent , $classStudent , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
//                                     if($studentWithTeacher2->execute()){
//                 echo "<script>alert('تم إضافة $nameStudent => $nameTch  بنجاح !2')</script>";
//             }
//         }else{
//             echo "<script>alert('#2 صف الطالب ليس من صفوف المدرس')</script>";
//                                 // }
//                             }
//                             }
//                         }
//                         // }
//                     } // hesr
//                     else{
//                         if($stageStudent == $stageOfTeacher){

//                             // while($rowCheckClass3 = mysqli_fetch_assoc($queryGetTeacher))
//                             // {
//                                 // while($roww = mysqli_fetch_assoc($queryGetTeacher))
//                                 // {
//                                 // array_push($stagesOfTeacherArray, json_decode($roww["stages"] , true));
//                                 // }
//                                     // }
//                                     // if(in_array($classStudent, json_decode($rowCheckClass3["stages"])))
//                                     if(in_array($classStudent, $stagesOfTeacherArray))
//                                     {
                                
//                                 $myArrStudent2 = [$nameStudent];
//                                 $encodeMyarrStudent2 = json_encode($myArrStudent2 , JSON_UNESCAPED_UNICODE);
//                                 $studentWithTeacher2 = $conn->prepare("INSERT INTO tchs_and_students(students, teacherID , teacherName , stage , class , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? )");
//                                 $studentWithTeacher2->bind_param("sissssss" , $encodeMyarrStudent2 , $idTch , $nameTch , $stageStudent , $classStudent , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
//                                 if($studentWithTeacher2->execute()){
//                                     echo "<script>alert('تم إضافة $nameStudent => $nameTch  بنجاح !3')</script>";
//                                 // }
//                             }
//                         }else{
//             echo "<script>alert('#3 صف الطالب ليس من صفوف المدرس')</script>";
//                             }
                        
// }
// else{
//     echo "<script>alert('مرحلة الطالب ليست مساويه للمدرس ')</script>";
// }
//                     }
//                 // }
//                                                     }        //hesadfdsafdssfdsafsfds   
                                                }             
                        
                        else{
                        //     if(empty(json_decode($col["blks"]))){
                        //         // foreach(json_decode($col["blks"]) as $ele1)
                        //         // {
                        //                 $myArr = [$_SESSION["id"]];
                        //                 $encodeMyarr = json_encode($myArr);
                                
                        //         $updateBlks = $conn->prepare("UPDATE product SET blks = ? where idPost = ? ");
                        //         $updateBlks->bind_param( "si" , $encodeMyarr , $idPro);
                        //         if(!$updateBlks->execute()){
                        //             echo "Error [BLKS] Contact With Call Center: " . $updateBlks->error;
                        //         }else{
                        // echo "<script>alert('تم إضافة الطالب $nameStudent إلى $nameTch بنجاح')</script>";
                        //         }
                        //         // echo "<script>alert('تم الإبلاغ');</script>";
                        //         // exit();
                        //         // echo "alert('تم الإبلاغ');";
                        //     }
                        // $queryStudentWithTeacherFinal2 = mysqli_query($conn , "SELECT * FROM tchs_and_students WHERE teacherID = '$idTch'");
                        
                        // while ($getFinalData2 = mysqli_fetch_assoc($queryStudentWithTeacherFinal2)){

                        if($stageStudent == $stageOfTeacher){
                            if(in_array($classStudent , $stagesOfTeacherArray)){
                            $myArrStudent = [$nameStudent];
                            $encodeMyarrStudent = json_encode($myArrStudent , JSON_UNESCAPED_UNICODE);
                            $studentWithTeacher = $conn->prepare("INSERT INTO tchs_and_students(students, teacherID , teacherName , stage , class , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? )");
                            $studentWithTeacher->bind_param("sissssss" , $encodeMyarrStudent , $idTch , $nameTch , $stageStudent , $classStudent , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
                            if($studentWithTeacher->execute()){
                        echo "<script>alert('تم إضافة الطالب $nameStudent إلى $nameTch بنجاح')</script>";
                        header("Refresh: .3;");
                        exit();
                        }
                    }else{
                        echo "<script>alert('صف الطالب ليس من صفوف المدرس')</script>";
                        header("Refresh: .3;");
                        exit();
                    }
                        }
                        else{
                            echo "<script>alert(' الطالب $nameStudent ليس من مراحل $nameTch')</script>";
                            header("Refresh: .3;");
                            exit();
                        }
                    // }
                            // echo "<script>alert('غير موجود #22')</script>";
                        }
            // if(empty(json_decode($col["blks"]))){
            //     // foreach(json_decode($col["blks"]) as $ele1)
            //     // {
            //             $myArr = [$_SESSION["id"]];
            //             $encodeMyarr = json_encode($myArr);
                
            //     $updateBlks = $conn->prepare("UPDATE product SET blks = ? where idPost = ? ");
            //     $updateBlks->bind_param( "si" , $encodeMyarr , $idPro);
            //     if(!$updateBlks->execute()){
            //         echo "Error [BLKS] Contact With Call Center: " . $updateBlks->error;
            //     }
            //     // echo "<script>alert('تم الإبلاغ');</>";
            //     header("Refresh:0.3; product?product=$idPro&id=$idAuth&c=$c");
            //     // exit();
            //     // echo "alert('تم الإبلاغ');";
            // }
            // // $tst = true;
            // $y;
            // // $clicks = 0;


    }
}
    // echo " Name: $nameTch , ID: $idTch ";
    // echo " Name: $nameStudent , Stage: $stageStudent , Class: $classStudent";
}}
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     if(isset($_POST["setTch"])){
//                     $encodeMyarr = json_encode($currentStage);
//                     // $encodeMyLangSelected = json_encode($langSelected);
//     $stmt = $conn->prepare("INSERT INTO tchs(userName , phone , nameOfSchool , currentCenters , mainStage , stages , subject , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? , ? , ?)");
    
//     $stmt->bind_param("sissssssss" , $tchr , $numTchr , $schoolTch , $centerTch , $mainStage, $encodeMyarr , $cate ,  $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
    
//     if($stmt->execute()){
//         echo "<script>alert('تم إضافة $tchr كمعلم جديد')</script>";
//         header("Refresh: .3; index");
//         exit();
//     }
// }
// }
// -------------------------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST["setTch"])){
    $tchr = $_POST["nameTch"];
    $numTchr = $_POST["numTch"];
    $schoolTch = $_POST["schoolTch"];
    $centerTch = $_POST["centersTch"];
    $mainStage = $_POST["st"];
    $currentStage = $_POST["stgs"];
    // $langSelected = $_POST["langTching"];
    $cate = $_POST["cates"];
    if(empty($mainStage) || empty($currentStage) || empty($cate)){
        echo "<script>alert('حدث خطأ ما يرجى التأكد من البيانات ')</script>";
        // header("Refresh: .3; index");
        header("Refresh: .3");
        exit();
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["setTch"])){
        $checkedTeacher = true;
        $checkNameTeacherOfSetTch = "select * from tchs where userName = '$tchr'";
        $queryCheckNameTeacherOfSetTch = mysqli_query($conn , $checkNameTeacherOfSetTch);
        // while($queryTestCheckerTeacher = mysqli_fetch_assoc($queryCheckNameTeacherOfSetTch))
        // {
            // if($tchr == $queryTestCheckerTeacher["userName"]){
            if(mysqli_num_rows($queryCheckNameTeacherOfSetTch) > 0){
                $checkedTeacher = false;
                echo "<script>alert('يوجد مدرس بنفس الأسم ')</script>";
                // header("Refresh: .3; index");
                header("Refresh: .3; ");
                exit();
            }
            
        // }

                    $encodeMyarr = json_encode($currentStage);
                    // $encodeMyLangSelected = json_encode($langSelected);
                    if($checkedTeacher == true){

                        $stmt = $conn->prepare("INSERT INTO tchs(userName , phone , nameOfSchool , currentCenters , mainStage , stages , subject , created , year , time) VALUES (? , ? , ? , ? , ? , ? ,  ? , ? , ? , ?)");
                        
                        $stmt->bind_param("sissssssss" , $tchr , $numTchr , $schoolTch , $centerTch , $mainStage, $encodeMyarr , $cate ,  $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
                        
                        if($stmt->execute()){
                            echo "<script>alert('تم إضافة $tchr كمعلم جديد')</script>";
                            header("Refresh: .3; ");
                            // header("Refresh: .3; index");
                            exit();
                        }
                    }
}
}
// ---------------------------------------------------------------------------------------------------------------------------------------------------


if(isset($_POST["setSt"])){
    $student = $_POST["nameSt"];
    $numSt = $_POST["numSt"];
    $prSt = $_POST["prNum"];
    $currentStageStudent = $_POST["studentStage"];
    $currentClassStudent = $_POST["studentR"];
    $arOrEn = $_POST["langSelect"];
    $secLang = $_POST["secLangs"];
    if(empty($currentStageStudent) || empty($currentClassStudent) || empty($secLang)|| empty($arOrEn)){
        echo "<script>alert('حدث خطأ ما يرجى التأكد من البيانات ')</script>";
        // header("Refresh: .3; index");
        header("Refresh: .3; ");
        exit();
    }
}
$type = "student";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submitSearched"])){
        $nameSearched = $_POST["searchInput"];
        $nameStudentSearched;
        $searchNameOfStudent = "select * from students where userName = '$nameSearched' OR id = '$nameSearched' and type = 'student'";
        $queryCheckNameOfStudentSearch = mysqli_query($conn , $searchNameOfStudent);
        while($searchSt = mysqli_fetch_assoc($queryCheckNameOfStudentSearch)){
            $nameStudentSearched = $searchSt["userName"];
        }
        if(mysqli_num_rows($queryCheckNameOfStudentSearch) == 0){
            echo "<script>alert('لا يوجد طالب بأسم $nameSearched')</script>";
            header("Refresh: .1 ");
            exit();
        }else{
            header("Location: pages/student?s=$nameStudentSearched");
            exit();
        }
    }
    if(isset($_POST["setSt"])){
        
                    // $encodeMyarr = json_encode($currentStage);
                    // $encodeMyLangSelected = json_encode($langSelected);
                    // if(empty($student)){
                    //     echo "Empty";
                    // }else{
                    //     echo "!Empty";
                    // }
                    $scienceOrNo = "-";
                    $mathOrScience = "-";
                    if($currentStageStudent == "المرحله الثانويه"){
                        if($currentClassStudent == "2"){
                            $scienceOrNo = $_POST["secondaryBranch"];
                        }
                        if($currentClassStudent == "3"){
                            $scienceOrNo = $_POST["secondaryBranch"];
                            if(isset($_POST["elmyBranch"])){
                                $mathOrScience = $_POST["elmyBranch"];
                            }
                        }
                    }
                    $checkedStudent = true;
                    $checkNameOfStudent = "select * from students where userName = '$student' and type = 'student'";
                    $queryCheckNameOfStudent = mysqli_query($conn , $checkNameOfStudent);
                    // echo mysqli_num_rows($queryCheckNameOfStudent);
        // while($queryTestCheckerTeacher = mysqli_fetch_assoc($queryCheckNameTeacherOfSetTch))
                        if(mysqli_num_rows($queryCheckNameOfStudent) > 0){
                            $checkedStudent = false;
                            echo "<script>alert('يوجد طالب بنفس الأسم ')</script>";
                            header("Refresh: .3 ; ");
                            // header("Refresh: .3 ;index");
                            exit();
                        }
                        
                    if($checkedStudent == true){
                        $stmtSt = $conn->prepare("INSERT INTO students(userName , phone , prPhone , stage , currStage , language , secLang , type , secondaryBranch , elmyBranch , created , year , time) VALUES (?, ?, ? , ? , ? , ? , ? , ? ,  ? , ? , ? , ? , ?)");
                        
    $stmtSt->bind_param("siissssssssss" , $student , $numSt , $prSt , $currentStageStudent , $currentClassStudent, $arOrEn ,  $secLang , $type , $scienceOrNo , $mathOrScience ,$_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
    
    if($stmtSt->execute()){
        echo "<script>alert('تم إضافة الطالب $student')</script>";
        // header("Refresh: .3; index");
        header("Refresh: .3; ");
        exit();
    }else{
        echo "error: " . $stmtSt->error;
    }
}
}
}
?>

<?php

// 	$ipUser;
// 	// if user from the share internet   
// if(!empty($_SERVER['HTTP_CLIENT_IP'])) {   
// $ipUser = $_SERVER['HTTP_CLIENT_IP'];   
// }   
// //if user is from the proxy   
// elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
// $ipUser = $_SERVER['HTTP_X_FORWARDED_FOR'];   
// }   
// //if user is from the remote address   
// else{   
// $ipUser = $_SERVER['REMOTE_ADDR'];   
// } 
// 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// $passHash = trim(sha1($_POST["passLogin"] . 'SJFISDKLJFSDdasdasdf42343546433$@#9996#$^YTGFd@#ERDFGSGsdfgvdfsgdff$%^$$%TREFG'));
    // $passHash2 = sha1($_POST["passLogin"]);
    if(isset($_POST["submitLogin"])){
            $pss = $_POST["passLogin"];
            // $sql = "select * from students where userName = '$name' and pass = '$pss'  or phone = '$name' and pass = '$pss'";
            $sql = "select * from admins where pass = '$pss' and type = 'admin'";
            $query = mysqli_query($conn , $sql);
		if(mysqli_num_rows($query) > 0){
			// if($_SERVER['REQUEST_METHOD'] == "POST"){
			// if(isset($_POST["submitLogin"])){
				
				while($row = mysqli_fetch_assoc($query)){
                    // if($row["ip"] !== $ipUser){
                    //     echo "<script>alert('غير مصرح بالدخول')</script>";
                    //     header("Refresh: .3;");
                    //     exit();
                    // }
					$_SESSION["user"] = $row["userName"];
					$_SESSION["id"] = $row["id"];
					$_SESSION["type"] = $row["type"];
                    $_SESSION["ip"] = $row["ip"];
					$_SESSION["type"] = $row["type"];
				}
			// }else{
            //     echo "Error isset Login , [call: 01123435870]";
			// }
		// }
		// else{
        //     echo "Error Server Method ,  [call: 01123435870]";
		// }
	}else{
        echo "<script>alert('رقم الإدخال غير صحيح')</script>";
        header("Refresh: .3");
	}
}
}
	// if($_SESSION["iden"] == "0"){
        // 	session_unset();
	// 	echo "<script>alert('ايميلك قيد التفعيل ')</script>";
	// 	header("Refresh:1; login");
	// 	exit();
	// }
	// include("../components/checkUser.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم سنتر اكسبريس </title>
    <!-- <title>Express Dashboard</title> -->
    <link rel="shortcut icon" style="border-radius: 7px;" href="imgs/ex.jpg">
    <link rel="stylesheet" href="style/hd.css">
    <link rel="stylesheet" href="style/pup.css">
    <link rel="stylesheet" href="style/Frame-Work.css">
</head>
<body>
<!--  -->
<div class="loader2_div hight-100 prLoader">

    <div class="loader2"></div>
    <div class="loader3"></div>

</div>
<!--  --><?php 

if(!$_COOKIE["googleApi"]){ ?>
    <!-- <?php echo ($_COOKIE["year"] + 6); ?> -->

    <div class="main d-flex j-center align-center">
    <!-- <div class="img">
    <img src="imgs/ex.jpg" alt="">
    </div> -->
    <div class="lgPg rtl">
        <h3>الرمز الخاص بالبرنامج</h3>
    <form class="lg" id="log" action="" method="POST">
    <!-- <div class="phone">
        <p>رقم التليفون او اسم المستخدم</p>
        <input type="text" name="phLogin" id="phLog" autocomplete="off" placeholder="ادخل رقم التلفون او اسم المستخدم">
    </div> -->
    <div class="pass">
        <p>ادخل الرمز</p>
        <input type="password" name="code" id="passLog" placeholder="رمز الدخال">
    </div>
    <input type="submit" name="submitCode" id="subLog" class="sub" value="حفظ">
    </form>
    </div>
    
    </div>
        <?php }  else{?>
        

<?php
// 	$ipUser;
// 	// if user from the share internet   
// if(!empty($_SERVER['HTTP_CLIENT_IP'])) {   
// $ipUser = $_SERVER['HTTP_CLIENT_IP'];   
// }   
// //if user is from the proxy   
// elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
// $ipUser = $_SERVER['HTTP_X_FORWARDED_FOR'];   
// }   
// //if user is from the remote address   
// else{   
// $ipUser = $_SERVER['REMOTE_ADDR'];   
// } echo $ipUser ;
if (!$_SESSION["user"]) {?>
    
    <div class="main d-flex j-center align-center">
    <!-- <div class="img">
    <img src="imgs/ex.jpg" alt="">
</div> -->
        <div class="lgPg rtl">
            <h3>تسجيل دخول</h3>
    <form class="lg" id="log" action="" method="POST">
        <!-- <div class="phone">
            <p>رقم التليفون او اسم المستخدم</p>
            <input type="text" name="phLogin" id="phLog" autocomplete="off" placeholder="ادخل رقم التلفون او اسم المستخدم">
        </div> -->
        <div class="pass">
            <p>رقم الإدخال</p>
            <input type="password" name="passLogin" id="passLog" placeholder="رقم الإدخال الخاص بالموظف">
        </div>
        <input type="submit" name="submitLogin" id="subLog" class="sub" value="تسجيل دخول">
    </form>
</div>

</div>
<?php } else{?>

<!--  -->
<div class="page d-flex j-cont-b">
<div class="user pr-10 brdr-e">
    <div class = 'p-10 d-flex align-center gap-10 fs-13'>
    <div>
    <img src="imgs/profile.webp" class="d-flex  w-50p rad50" alt="">
    </div>
    <?php
    echo '<h3>اهلاً ' . $_SESSION["user"] . "</h3>";
    ?>
</div>
    <a href="logout" id="logout">تسجيل خروج</a>
</div>
<!--  -->
<!--  -->


<!--  -->
<div>
    
    <header class="">
        <div>
            <h3><img src="icons/logo.png" style="width: 70px;" alt=""></h3>
        </div>
        <div>
            <!-- <div> -->
                <button id="tch" id="contact">إضافة مدرس جديد</button>
                <!-- </div> -->
            <button id="addSt">إضافة طالب جديد</button>
            <button id="addStToTch">إضافة طالب ل مدرس</button>
        </div>
    </header>
    <div class="pr1">
        <div class="con">
        <!-- <div class="btns">
        <h3>All Students</h3>
            <h3>Students Of Teachers</h3>
            <h3>Teachers</h3>
        </div> -->
    </div>
    <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <div class="btns">
            <form action="" method="POST" id = 'searchForm' class="search">
                <input class="srch" name = 'searchInput' id = 'searchInputId' type="search" placeholder="Name Student">
                <input type="submit" name="submitSearched" id="" class="hidden">
            </form>
        </div>
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>الإسم</td>
                                                    <td> رقم الطالب\ة</td>
                                                    <td>رقم ولي الأمر</td>
                                                    <td>المرحله</td>
                                                    <td>الصف</td>
                                                    <td>علمي\ادبي</td>
                                                    <td>الشعبه</td>
                                                    <td>اللغه</td>
                                                    <td>اللغه التانيه</td>
                                                    <td>تاريخ الإنشاء</td>
                                                </tr>
                                        </thead>
                                        <tbody>
<?php
                $sql = "select * from students where type = 'student' LIMIT 20 ";
                $query = mysqli_query($conn , $sql);
                echo "عدد طلابك الأن " . mysqli_num_rows(mysqli_query($conn , "select * from students where type = 'student'"));
                while($row = mysqli_fetch_assoc($query))
                {
                    // if($row["userName"] == $_GET["student"]){
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "<br>" . "</td>";
                        echo "<td>" . "<a href = 'pages/student?s=". $row["userName"] ."''>". $row["userName"]. "</a>". "<br>" . "</td>";
                        // echo "<td>" . $row["userName"] . "<br>" . "</td>";
                        echo "<td>" . $row["phone"] . "<br>" . "</td>";
                        echo "<td>" . $row["prPhone"] . "<br>" . "</td>";
                        echo "<td>" . $row["stage"] . "<br>" . "</td>";
                        echo "<td>" . $row["currStage"] . "<br>" . "</td>";
                        echo "<td>" . ($row["secondaryBranch"] != "" ? $row["secondaryBranch"] : "-"). "<br>" . "</td>"; 
                        echo "<td>" . ($row["elmyBranch"] != "" ? $row["elmyBranch"] : "-") . "<br>" . "</td>";
                        echo "<td>" . $row["language"] . "<br>" . "</td>";
                        echo "<td>" . $row["secLang"] . "<br>" . "</td>";
                        echo "<td>" . $row["created"]. ' ' . $row["year"] . " " . $row["time"] . "<br>" . "</td>";
                        // echo "<td>" . $row["created"]. ' ' . $row["year"] . " " . $row["time"] . "<br>" . "</td>";
                        // echo "<td>" . $row["update"] . "<br>" . "</td>";
                        echo "</tr>";
                    // }
                }
                // if(mysqli_num_rows(mysqli_query($conn , "select * from students")) <= 0){
                //     echo "<p>"." لا يوجد طلاب "."</p>";
                // }
            
?>
                                        </tbody>
                                        
                                </table>
</div>
    </div>
</div>
<div class="mdrs rtl">
<div class="pre">
<h3>المرحله الإعداديه . <?php
             $sqlGetArTeacher = "SELECT * FROM tchs WHERE mainStage = 'المرحله الإعداديه' ORDER BY subject";
        $queryGetArTeacher = mysqli_query($conn, $sqlGetArTeacher); 
        echo mysqli_num_rows($queryGetArTeacher);
        ?></h3>
    <span>مواد ومدرسين المرحله الإعداديه</span>
    <ul>
        <?php
        // $sqlGetArTeacher = "SELECT * FROM tchs WHERE mainStage = 'المرحله الإعداديه' ORDER BY subject";
        // $queryGetArTeacher = mysqli_query($conn, $sqlGetArTeacher);
        while($teacher = mysqli_fetch_assoc($queryGetArTeacher)){
            $teachID = $teacher["id"];
        echo "<a href = 'pages/teacher?t=$teachID' class = 'd-felx j-cont-b'>" . $teacher["userName"] ."<span>" .  $teacher["subject"] . "</span>" ."</a>";    
        }
        ?>
    </ul>
</div>
<div class="sec">
    <h3>المرحله الثانويه . <?php
             $sqlGetArTeacher = "SELECT * FROM tchs WHERE mainStage = 'المرحله الثانويه' ORDER BY subject";
        $queryGetArTeacher = mysqli_query($conn, $sqlGetArTeacher); 
        echo mysqli_num_rows($queryGetArTeacher);
        ?>
        
    </h3>
    <span>مواد ومدرسين المرحله الثانويه</span>
    <ul>
    <ul>
        <?php
        // $sqlGetArTeacher = "SELECT * FROM tchs WHERE mainStage = 'المرحله الثانويه' ORDER BY subject";
        // $queryGetArTeacher = mysqli_query($conn, $sqlGetArTeacher);
        while($teacher = mysqli_fetch_assoc($queryGetArTeacher)){
            $teachID = $teacher["id"];
            echo "<a href = 'pages/teacher?t=$teachID' class = 'd-felx j-cont-b'>" . $teacher["userName"] ."<span>" .  $teacher["subject"] . "</span>" ."</a>";     
        }
        ?>
    </ul>
    </ul>
    </div>
</div>
</div>
<!-- 
<button id="sendDataButton">Send Data</button>
    <p id="responseText"></p> -->
</body>
</html>
<?php }?>
<?php }?>
<!-- -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script src="js/main.js"></script>
