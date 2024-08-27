<?php
session_start();
error_reporting(0);
$conn = new mysqli("localhost" , "root" , "" , "express");
if(!$_SESSION["user"]){
    // header("Location: ../index");
    header("Location: loading");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    <link rel="stylesheet" href="../style/Frame-Work.css">
    <title>صفحة المدرس</title>
</head>
<body>
<div class=" hight-100 loader2_div prLoader">

<div class="loader2"></div>
<div class="loader3"></div>
</div>

<div class="page bg-fff pos-fix-center p-20 rad-10 m-20 rtl">
<div class="data">
    <a href="../index">الصفحه الرئيسيه</a>
    <div class="teacher-ino">
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
if($_GET["s"]){
if(!empty($_GET["s"])){
                $checkerName = $_GET["s"];
                $sql = "select * from students where userName = '$checkerName' and type = 'student'";
                $query = mysqli_query($conn , $sql);
                if(mysqli_num_rows($query) == 0){
                    // header("Location: ../index");
    header("Location: loading");

                    exit();
                }
            }else{
                if(isset($_GET["s"])){
            // header("Location: ../index");
    header("Location: loading");

            exit();
        }
// 
}
}else{
    // header("Location: ../index");
    header("Location: loading");

    exit();
}

?>

    </div>
    <div class="students-info">

        </div>
    </div>
    <div class="create-lesson">
        <div class="txt-dec-under">بيانات الطالب</div>
        <div class="lessons">
                        <!-- <h3>الحصص</h3> -->
        <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>الأسم</td>
                                                    <td>رقم الهاتف</td>
                                                    <td>هاتف ولي الأمر</td>
                                                    <td>المرحله</td>
                                                    <td>الصف</td>
                                                    <td>عربي\لغات</td>
                                                    <td>لغة الثانيه</td>
                                                    <td>علمي\ادبي</td>
                                                    <td>الشعبه</td>
                                                    <td>تاريخ الإنشاء</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                            <?php
                                            $checkerName = $_GET["s"];
                                            $sql = "select * from students where userName = '$checkerName' and type = 'student'";
                                            $query = mysqli_query($conn , $sql);
                                            while($row = mysqli_fetch_assoc($query))
                                            {
                    $stageStudent = $row["stage"];
                    $classStudent = $row["currStage"];
                    // if($row["userName"] == $_GET["student"]){
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "<br>" . "</td>";
                        echo "<td>" . $row["userName"] . "<br>" . "</td>";
                        echo "<td>" . $row["phone"] . "<br>" . "</td>";
                        echo "<td>" . $row["prPhone"] . "<br>" . "</td>";
                        echo "<td>" . $row["stage"] . "<br>" . "</td>";
                        echo "<td>" . $row["currStage"] . "<br>" . "</td>";
                        echo "<td>" . $row["language"] . "<br>" . "</td>";
                        echo "<td>" . $row["secLang"] . "<br>" . "</td>";
                        echo "<td>" . ($row["secondaryBranch"] != "" ? $row["secondaryBranch"] : "-"). "<br>" . "</td>"; 
                        echo "<td>" . ($row["elmyBranch"] != "" ? $row["elmyBranch"] : "-") . "<br>" . "</td>";
                        echo "<td>" . $row["created"]. ' ' . $row["year"] . " " . $row["time"] . "<br>" . "</td>";
                        // echo "<td>" . $row["created"]. ' ' . $row["year"] . " " . $row["time"] . "<br>" . "</td>";
                        // echo "<td>" . $row["update"] . "<br>" . "</td>";
                        echo "</tr>";
                    // }
                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
        <div class="txt-dec-under">سجل حضور الطالب</div>
        <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>lessonID</td>
                                                    <td>الأسم</td>
                                                    <td>اسم المدرس</td>
                                                    <td>الماده</td>
                                                    <td>تاريخ الحصه</td>
                                                    <td>حاله</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                            <?php
                            $arrayGetStudentsFromLessons = array();
                            $arrayGetStudentsMatchTeacher = array();
                            $studentTrueArray = [];
                            $studentTrue;
                            $getLessonID;
                            $getTeacherID;
                            $getNameteacher;
                            $getNameSubject;
                            $getDate;
                            $checkerName = $_GET["s"];
                                            // 
                                            $sqlGotTeacher = "select * from tchs_and_students where stage = '$stageStudent' and class = '$classStudent'";
                                            $queryGotTeacher = mysqli_query($conn , $sqlGotTeacher);
                                            // 
                                            while($getGotTeacherName = mysqli_fetch_assoc($queryGotTeacher))
                                            {
                                            $arrayGetStudentsMatchTeacher = json_decode($getGotTeacherName["students"] , true);
                                            // $arrayGetStudentsMatchTeacher[] = $getGotTeacherName["students"];
                                            // $Teachers = json_decode($getGotTeacherName["teacherName"] , true);
                                            if( in_array($checkerName , $arrayGetStudentsMatchTeacher)){
                                                $studentTrueArray[] = $getGotTeacherName["teacherName"];
                                            }
                                            }
                                            // 
                                            $sqlGotLessons = "select * from lesson where stage = '$stageStudent' and class = '$classStudent'";
                                            $queryGotLessons = mysqli_query($conn , $sqlGotLessons);
                                            while($getStudentsOfLesson = mysqli_fetch_assoc($queryGotLessons)){
                                                // $arrayGetStudentsFromLessons = json_decode($getStudentsOfLesson["students"] , true);
                                                // $arrayGetStudentsFromLessons = [...$getStudentsOfLesson["students"]];
                                                $arrayGetStudentsFromLessons = json_decode($getStudentsOfLesson["students"] , true);
                                                // $arrayGetStudentsFromLessons[] = $getStudentsOfLesson["students"];
                                                // array_push($arrayGetStudentsFromLessons , json_decode($getStudentsOfLesson["students"]));
                                                // echo $arrayGetStudentsFromLessons . " ";
                                                if($arrayGetStudentsFromLessons !== null){
                                                if(in_array($getStudentsOfLesson["teacherName"], $studentTrueArray))
                                                {
                                                    if(in_array($checkerName, $arrayGetStudentsFromLessons)){
                                                        echo "<tr>";
                                                        echo "<td>" . $getStudentsOfLesson["lessonID"] . "<br>" . "</td>";
                                                        echo "<td>" . $checkerName . "<br>" . "</td>";
                                                        echo "<td>" . $getStudentsOfLesson["teacherName"] . "<br>" . "</td>";
                                                        echo "<td>" . $getStudentsOfLesson["subject"] . "<br>" . "</td>";
                                                        echo "<td>" . $getStudentsOfLesson["created"] . "-" . $getStudentsOfLesson["year"] . "<br>" . "</td>";
                                                        echo "<td class = 'bg_green'></td>";
        echo "</tr>";
                                                    }
                                                }}
                                                        // echo $st . " ";
                                                    }
                                                
                                            
                                            $sql = "select * from lesson where userName = '$checkerName' and type = 'student'";
                                            $query = mysqli_query($conn , $sql);
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
        <div class="txt-dec-under">سجل غياب الطالب</div>
        <div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>lessonID</td>
                                                    <td>الأسم</td>
                                                    <td>اسم المدرس</td>
                                                    <td>الماده</td>
                                                    <td>تاريخ الحصه</td>
                                                    <td>حاله</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                            <?php
                            $arrayGetStudentsFromLessons = array();
                            $arrayGetStudentsMatchTeacher = array();
                            $Teachers = [];
                            $arrayTeachers = array();
                            $getLessonID;
                            $getTeacherID;
                            $getNameteacher;
                            $getNameSubject;
                            $getDate;
                                            $checkerName = $_GET["s"];
                                            // 
                                            $sqlGotTeacher = "select * from tchs_and_students where stage = '$stageStudent' and class = '$classStudent'";
                                            $queryGotTeacher = mysqli_query($conn , $sqlGotTeacher);
                                            // 
                                            $sqlGotLessons = "select * from lesson where stage = '$stageStudent' and class = '$classStudent'";
                                            $queryGotLessons = mysqli_query($conn , $sqlGotLessons);
                                            while($getGotTeacherName = mysqli_fetch_assoc($queryGotTeacher))
                                            {
                                            $arrayGetStudentsMatchTeacher = json_decode($getGotTeacherName["students"] , true);
                                            // $Teachers = json_decode($getGotTeacherName["teacherName"] , true);
                                            if( in_array($checkerName , $arrayGetStudentsMatchTeacher)){
                                                $Teachers[] = $getGotTeacherName["teacherName"];
                                            }
                                            }
                                            while($getStudentsOfLesson = mysqli_fetch_assoc($queryGotLessons)){
                                                                // if(in_array($checkerName , $arrayGetStudentsMatchTeacher)){
                                                                //     // echo $getGotTeacherName["teacherName"] , " ";
                                                                //     $Teachers = json_decode($getGotTeacherName["teacherName"] , true);
                                                                // }
                                                            
                                                // echo json_decode($getStudentsOfLesson["students"] , true);
                                                $arrayGetStudentsFromLessons = json_decode($getStudentsOfLesson["students"] , true);
                                                // $arrayGetStudentsFromLessons[] = $getStudentsOfLesson["students"];
                                                // $arrayGetStudentsFromLessons[] = $getStudentsOfLesson["students"];
                                                // if(in_array($getStudentsOfLesson["teacherName"], $Teachers)){
                                                // if(in_array($getStudentsOfLesson["teacherName"] , $Teachers)){
                                                    // echo $getGotTeacherName["teacherName"];
                                                    if($arrayGetStudentsFromLessons !== null){
                                                    if(in_array($getStudentsOfLesson["teacherName"], $Teachers)){
                                                    if(!in_array($checkerName, $arrayGetStudentsFromLessons)){
                                                    // echo $getGotTeacherName["teacherName"];
                                                    // echo "dsa";
                                                        // echo $st . " ";
                                                                                echo "<tr>";
                                                                                echo "<td>" . $getStudentsOfLesson["lessonID"] . "<br>" . "</td>";
                                                                                echo "<td>" . $checkerName . "<br>" . "</td>";
                                                                                echo "<td>" . $getStudentsOfLesson["teacherName"] . "<br>" . "</td>";
                                                                                echo "<td>" . $getStudentsOfLesson["subject"] . "<br>" . "</td>";
                                                                                echo "<td>" . $getStudentsOfLesson["created"] . "-" . $getStudentsOfLesson["year"] . "<br>" . "</td>";
                                                                                echo "<td class = 'bg_red'></td>";
                                                                                echo "</tr>";
                                                    
                                                    
                                            }}}
                                        }
                                            // $sql = "select * from lesson where userName = '$checkerName' and type = 'student'";
                                            // $query = mysqli_query($conn , $sql);
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
</div>
</div>
<script src="../js/teacher.js"></script>
</body>
</html>