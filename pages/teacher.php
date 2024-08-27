<?php
session_start();
error_reporting(0);
$conn = new mysqli("localhost" , "root" , "" , "express");
$link = '../index';
if(!$_SESSION["user"]){
    // header("Location: ../index");
    header("Location: $link");
    exit();
}
    // -------------------------------------------
    // echo "[";
    // for($i = 1; $i <= 500; $i++){
    //     echo "\"$i\"" ."," ;
    // }
    // echo "]";
    $dateNow =  $_COOKIE["date"] . "-" . $_COOKIE["year"] . " " . $_COOKIE["time"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submitDataOfLesson"])){
        $insertSqlLesson;
        // echo $_POST["classOfLesson"];
        $teacherID = $_GET["t"];
        $nameTeacher;
        $empty;
        $teacherSubject;
        $teacherStage;
        $teacherClass;
        $addStudent;
        // 
        // echo mysqli_num_rows(mysqli_query($conn , "select * from lesson where teacherID = '$teacherID'"));
        $sqlGetInfoTeacher = "select * from tchs where id = '$teacherID'";
        $queryGetInfoTeacher = mysqli_query($conn , $sqlGetInfoTeacher);
        while($getInfoTeacher = mysqli_fetch_assoc($queryGetInfoTeacher))
        {
            $nameTeacher = $getInfoTeacher["userName"];
            $teacherSubject = $getInfoTeacher["subject"];
            $teacherStage = $getInfoTeacher["mainStage"];
            // $teacherClass = $getInfoTeacher[""];
            $addStudent;
        }
        // if(mysqli_num_rows(mysqli_query($conn , "select * from lesson where teacherID = '$teacherID'")) == 0){

            $insertSqlLesson = $conn->prepare("INSERT INTO lesson(teacherID , teacherName , subject , stage , class , created , year , time) VALUES ( ? , ? , ? , ? ,  ? , ?  , ? ,?)");
            $insertSqlLesson->bind_param("isssssss" , $teacherID , $nameTeacher , $teacherSubject , $teacherStage , $_POST["classOfLesson"] , $_COOKIE["date"] , $_COOKIE["year"] ,$_COOKIE["time"]);
            if($insertSqlLesson->execute()){
                echo "<script>
                
        //                 Swal.fire({title:'تم فتح حصه جديده بتاريخ $dateNow',
        //     icon: 'success'
        // });
        alert('تم فتح حصه جديده بتاريخ $dateNow')
        </script>";
                header("Refresh: .3;");
                exit();
                // }
            }
        
    }
    // $getTacher;
    if(isset($_POST["close_lesson_btn"])){
        $lessonIDGot = $_POST["lessonIDClose"];
        $closeing = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGot' and status = 'pending'";
$queryCloseing = mysqli_query($conn , $closeing);
if(mysqli_num_rows($queryCloseing) == 0){
    echo "<script>alert('الحصه مقفله بالفعل')</script>";
    header("Refresh: .3;");
    exit();
}
        $closedLesson = "closed";
        $teacherPriced = ($_POST["teacherPrice"] * $_POST["numOfStudentClose"]);
        $centerPriced = ($_POST["centerPrice"] * $_POST["numOfStudentClose"]);
        $dataCloseLesson = $conn->prepare("UPDATE lesson SET status = ? , finished = ? , countStudents = ? , teacherPrice = ? , centerPrice = ? where lessonID = ?");
        $dataCloseLesson->bind_param( "sssiis" , $dateNow , $closedLesson , $_POST["numOfStudentClose"] , $teacherPriced , $centerPriced , $_POST["lessonIDClose"]);
        if(!$dataCloseLesson->execute()){
            echo "Error [Close Lesson] Contact With Call Center: " . $updateBlks->error;
            // setcookie("rp$idPro" , "$idPro-rp" , strtotime("now") , "/");
        }else{
            // echo "executed";
        echo "<script>
        
        
        //         Swal.fire({title:'تم إنهاء الحصه',
        //     icon: 'success'
        // });
        alert('تم إنهاء الحصه')
        </script>";
        header("Refresh: .3;");
        exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" style="border-radius: 7px;" href="../imgs/ex.jpg">
    <link rel="stylesheet" href="../style/teacher.css">
    <link rel="stylesheet" href="../style/hd.css">
    <link rel="stylesheet" href="../style/pup.css">
    <link rel="stylesheet" href="../style/Frame-Work.css">
    <title>صفحة المدرس</title>
</head>
<body>
<div class="loader2_div hight-100 prLoader">

    <div class="loader2"></div>
    <div class="loader3"></div>

</div>

<div class="page bg-fff pos-fix-center p-20 rad-10 m-20 rtl">
<div class="data">
    <a href="../index">رجوع</a>
    <div class="teacher-info mt-10">
        <?php
                // $q = $_GET["t"];
                // $w = "select students from tchs_and_students where teacherID = '$q' and class = '1'";
                // $s = mysqli_query($conn , $w);
                // while($af = mysqli_fetch_assoc($s)){
                //     // foreach(json_decode($af["students"]) as $y){
                //         if(in_array("test" , json_decode($af["students"]))){
                //             echo "IN";
                //         }
                //     // }
                // }
                // echo mysqli_num_rows($s);
if($_GET["t"]){
if(!empty($_GET["t"])){
                $idCurrentStudent = $_GET["t"];
                $sql = "select * from tchs where id = '$idCurrentStudent'";
                $query = mysqli_query($conn , $sql);
                if(mysqli_num_rows($query) == 0){
                    // header("Location: ../index");
    header("Location: $link");

                    exit();
                }
                while($row = mysqli_fetch_assoc($query))
                {
                    // if($row["userName"] == $_GET["student"]){
                    echo "<div>";
                    echo "<h4>" . "ID:" ."</h4>";
                    echo "<span>" . $row["id"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "الأسم:" ."</h4>";
                    echo "<span>" . $row["userName"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "رقم التلفون:" ."</h4>";
                    echo "<span>" . $row["phone"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "اسم المدرسه:" ."</h4>";
                    echo "<span>" . $row["nameOfSchool"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "السناتر:" ."</h4>";
                    echo "<span>" . $row["currentCenters"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "المرحله:" ."</h4>";
                    echo "<span>" . $row["mainStage"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "الصفوف:" ."</h4>";
                    foreach(json_decode($row["stages"]) as $class){
                        echo "<span>" . $class ."</span>";
                    }
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "الماده:" ."</h4>";
                    echo "<span>" . $row["subject"] ."</span>";
                    echo "</div>";
                    echo "<div>";
                    echo "<h4>" . "تاريخ الإنشاء:" ."</h4>";
                    echo "<span>" . $row["created"]. "-" . $row["year"]. " " . $row["time"] ."</span>";
                    echo "</div>";
                    // }
                }
            }else{
                if(isset($_GET["t"])){
            // header("Location: ../index");
    header("Location: $link");

            exit();
        }
// 
}
}else{
    // header("Location: ../index");
    header("Location: $link");

    exit();
}

?>

    </div>
    <div class="students-info">
        <div class="box">
            <h3>الصف الأول</h3>
            <div class="stds">
            <?php

if($_GET["t"]){
if(!empty($_GET["t"])){
                $idCurrentStudent = $_GET["t"];
                $sql = "select * from tchs_and_students where teacherID = '$idCurrentStudent'";
                $query = mysqli_query($conn , $sql);
                // if(mysqli_num_rows($query) == 0){
                //     header("Location: index");
                //     exit();
                // }
                while($row = mysqli_fetch_assoc($query))
                {
                    // }
                    if($row["class"] == "1"){
                        foreach(json_decode($row["students"]) as $getStudent){
                            echo "<a href = 'student?s=$getStudent'>". $getStudent ."</a>";
                        }
                        }
                }
            }else{
                    if(isset($_GET["t"])){
                // header("Location: ../index");
    header("Location: $link");

                exit();
            }
// 
}
}else{
    // header("Location: ../index");
    header("Location: $link");

    exit();
}

?>
</div>

        </div>
        <div class="box">
            <h3>الصف الثاني</h3>
            <div class="stds">
            <?php

if($_GET["t"]){
if(!empty($_GET["t"])){
                $idCurrentStudent = $_GET["t"];
                $sql = "select * from tchs_and_students where teacherID = '$idCurrentStudent'";
                $query = mysqli_query($conn , $sql);
                // if(mysqli_num_rows($query) == 0){
                //     header("Location: index");
                //     exit();
                // }
                while($row = mysqli_fetch_assoc($query))
                {
                    // }
                    if($row["class"] == "2"){
                        foreach(json_decode($row["students"]) as $getStudent){
                            echo "<a href = 'student?s=$getStudent'>". $getStudent ."</a>";
                        }
                        }
                }
            }else{
                    if(isset($_GET["t"])){
                // header("Location: ../index");
    header("Location: $link");

                exit();
            }
// 
}
}else{
    // header("Location: ../index");
    header("Location: $link");

    exit();
}

?>
</div>

        </div>
        <div class="box">
            <h3>الصف الثالت</h3>
            <div class="stds">
            <?php

if($_GET["t"]){
if(!empty($_GET["t"])){
                $idCurrentStudent = $_GET["t"];
                $sql = "select * from tchs_and_students where teacherID = '$idCurrentStudent'";
                $query = mysqli_query($conn , $sql);
                // if(mysqli_num_rows($query) == 0){
                //     header("Location: sa");
                //     exit();
                // }
                while($row = mysqli_fetch_assoc($query))
                {
                    // }
                    if($row["class"] == "3"){
                    foreach(json_decode($row["students"]) as $getStudent){
                        echo "<a href = 'student?s=$getStudent'>". $getStudent ."</a>";
                    }
                    }
                }
            }else{
                    if(isset($_GET["t"])){
                // header("Location: ../index");
    header("Location: $link");

                exit();
            }
// 
}
}else{
    // header("Location: ../index");
    header("Location: $link");

    exit();
}

?>
</div>

        </div>
    </div>
    <div class="create-lesson">
        <div class="txt-dec-under">الحصص</div>
        <div class="lessons">
                        <!-- <h3>الحصص</h3> -->
        <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>Lesson ID</td>
                                                    <td>Teacher ID</td>
                                                    <td>الأسم</td>
                                                    <td>الماده</td>
                                                    <td>المرحله</td>
                                                    <td>الصف</td>
                                                    <td>عدد الطلاب</td>
                                                    <td>نسبة المدرس</td>
                                                    <td>نسبة السنتر</td>
                                                    <td>حالة</td>
                                                    <td>تاريخ الإنشاء</td>
                                                    <td>تاريخ الإنتهاء</td>
                                                    <td>إضافات</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                            <?php
                                        $teacherIDNow = $_GET["t"];
                                        $sqlGetLesson = "select * from lesson where teacherID = '$teacherIDNow' and not status = 'pending'";
                                        $queryGetLesson = mysqli_query($conn , $sqlGetLesson);
                                        while($perLesson = mysqli_fetch_assoc($queryGetLesson)){
                                            echo "<tr>";
                                            echo "<td>" . $perLesson["lessonID"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["teacherID"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["teacherName"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["subject"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["stage"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["class"] . "<br>" . "</td>";
                                            echo "<td>" . ($perLesson["students"] == "" ? "لا يوجد طلاب" : count(json_decode($perLesson["students"] ,true))) . "<br>" . "</td>";
                                            echo "<td>" .$perLesson["teacherPrice"]. "<br>" . "</td>";
                                            echo "<td>" .$perLesson["centerPrice"] . "<br>" . "</td>";
                                            echo "<td>" .($perLesson["finished"] == "closed" ? "مقفول" : $perLesson["status"]). "<br>" . "</td>";
                                            echo "<td>" . $perLesson["created"]. ' ' . $perLesson["year"] . " " . $perLesson["time"] . "<br>" . "</td>";
                                            echo "<td>" . ($perLesson["status"] == "pending" ? "-" : $perLesson["status"]). "<br>" . "</td>";
                                            // echo "<td> <a href = 'currentLesson?ls=$teacherIDNow'>تفاصيل</a>" . "<br>" . "</td>";
                                            echo "<td> <a href = 'currentLesson?ls=".$perLesson["lessonID"] ."' class = 'edit_lesson txt-dec-under pointer clr0075ff'>تفاصيل</a>" ."</td>";
                                            echo "</tr>";
                                        }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
            <div class = 'txt-dec-under'>الحصص الحاليه</div>
        <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>Lesson ID</td>
                                                    <td>Teacher ID</td>
                                                    <td>الأسم</td>
                                                    <td>الماده</td>
                                                    <td>المرحله</td>
                                                    <td>الصف</td>
                                                    <td>عدد الطلاب</td>
                                                    <td>حالة</td>
                                                    <td>تاريخ الإنشاء</td>
                                                    <td>تاريخ الإنتهاء</td>
                                                    <td>إضافة</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                            <?php
                                        $teacherIDNow = $_GET["t"];
                                        $sqlGetLesson = "select * from lesson where teacherID = '$teacherIDNow' and status = 'pending'";
                                        $queryGetLesson = mysqli_query($conn , $sqlGetLesson);
                                        while($perLesson = mysqli_fetch_assoc($queryGetLesson)){
                                            echo "<tr>";
                                            echo "<td>" . $perLesson["lessonID"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["teacherID"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["teacherName"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["subject"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["stage"] . "<br>" . "</td>";
                                            echo "<td>" . $perLesson["class"] . "<br>" . "</td>";
                                            echo "<td>" . ($perLesson["students"] == "" ? "لا يوجد طلاب" : count(json_decode($perLesson["students"] ,true))) . "<br>" . "</td>";
                                            echo "<td>" .( ($perLesson["status"] == "pending" ? "مفتوح" : "لم يُقفل ولم يُفتح") ? : ($perLesson["status"] == "closed" ? "مقفول" : "لم يُقفل ولم يُفتح") ? : "لم يُقفل ولم يُفتح" ). "<br>" . "</td>";
                                            echo "<td>" . $perLesson["created"]. ' ' . $perLesson["year"] . " " . $perLesson["time"] . "<br>" . "</td>";
                                            echo "<td>" . ($perLesson["status"] == "pending" ? "-" : $perLesson["status"]). "<br>" . "</td>";
                                            // echo "<td> <a href = 'details?d=$teacherIDNow'>تعديل</a>" . "<br>" . "</td>";
                                            $ifCountTrue = json_decode($perLesson["students"] ,true) ? count(json_decode($perLesson["students"] ,true)) : "0";
                                            echo "<td> <a href = 'currentLesson?ls=".$perLesson["lessonID"] ."' class = 'edit_lesson txt-dec-under pointer clr0075ff'>تعديل</a>" . "<br>" . "<br>" . "<span lessonID = '". $perLesson["lessonID"] . "' numOfStudents = '". $ifCountTrue ."' class = 'close_lesson txt-dec-under pointer red'>إنهاء الحصه" . "<br>" . "</span>" ."</td>";
                                            // echo "<td lessonID = '". $perLesson["lessonID"] . "' class = 'close_lesson txt-dec-under pointer red'>إنهاء الحصه" . "<br>" . "</td>" ;
                                            echo "</tr>";
                                        }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>

            <form action="" method="POST" id="sendDataOfLesson">
                <div class="">
                    <?php
                    if($_GET["t"]){
                        if(!empty($_GET["t"])){
                                        $idCurrentStudent = $_GET["t"];
                                        $sql = "select * from tchs where id = '$idCurrentStudent'";
                                        $query = mysqli_query($conn , $sql);
                                        // if(mysqli_num_rows($query) == 0){
                                        //     header("Location: sa");
                                        //     exit();
                                        // }
                                        while($row = mysqli_fetch_assoc($query))
                                        {
                                            // }
                                            // if(json_decode($row["stages"]) == "3"){
                                            foreach(json_decode($row["stages"]) as $getStudent){
                                            echo "<div>";
                                            echo "<input class= 'secR' type = 'radio' value = '$getStudent' id = 'classOfLesson$getStudent' name = 'classOfLesson'/>";
                                            echo "<label for = 'classOfLesson$getStudent' class = 'pr-5 color-grey'>$getStudent</label>";
                                            echo "</div>";
                                            }
                                        }
                                    }else{
                                            if(isset($_GET["t"])){
                                        // header("Location: ../index");
    header("Location: $link");

                                        exit();
                                    }
                        // 
                        }
                        }else{
                            // header("Location: ../index");
    header("Location: $link");

                            exit();
                        }
                        
                    ?>
                </div>
                <div class="" id = ''>
    <input class = 'setTch btnsubmit sub fs-13' id = 'add_now' type = 'submit' name= 'submitDataOfLesson' value = 'فتح حصه جديده' id=""/>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script src="../js/teacher.js"></script>
</body>
</html>