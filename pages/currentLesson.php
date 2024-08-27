
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" style="border-radius: 7px;" href="../imgs/ex.jpg">
    <link rel="stylesheet" href="../style/teacher.css">
    <link rel="stylesheet" href="../style/hd.css">
    <link rel="stylesheet" href="../style/Frame-Work.css">
    <link rel="stylesheet" href="../style/teacher.css">
    <link rel="stylesheet" href="../style/pup.css">
    <title>صفحة </title>
    <!-- <?php
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    ";
    ?> -->
</head>
<body>
<?php

session_start();
error_reporting(0);
$link = '../index';
$conn = new mysqli("localhost" , "root" , "" , "express");
if(!$_SESSION["user"]){
    // header("Location: ../index");
    header("Location: $link");

    exit();
}
$checkLesson = false;
$lessonIDGet = $_GET["ls"];
$countOfStudents = array();
// 
$sqlDetials2 = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet'";
$queryDetials2 = mysqli_query($conn , $sqlDetials2);
// 
$sqlDetials = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet'";
$queryDetials = mysqli_query($conn , $sqlDetials);
while ($gettingQueryDetials = mysqli_fetch_assoc($queryDetials)){
    $teacherIDGetter = $gettingQueryDetials["teacherID"];
}
// 

$sqlFetchLesson = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet' and status = 'pending'";
$queryFetchLesson = mysqli_query($conn , $sqlFetchLesson);

// $checkCurrentLesson = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet' and status = 'pending'";
// $querycheckCurrentLesson = mysqli_query($conn , $checkCurrentLesson);
if(mysqli_num_rows($queryFetchLesson) > 0){
    $checkLesson = true;
    // echo "found lesson pending";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["add_delete_student_btn"]))
    {
        // $lessonIDGet = $_GET["ls"];
        $teacherIDGet;
        $teacherNameGet;
        $classLessonGet;
        $studentFetched;
        $idStudent;
        // $getStudentsLesson = array();
        $nameOrIDStudent = $_POST["add_delete_student"];
        $nameStudentToLesson = $_POST["add_delete_student"];
        $sqlFetchSt = "SELECT * FROM students WHERE id = '$nameOrIDStudent' OR userName = '$nameOrIDStudent' and type = 'student'";
        $queryFetchSt = mysqli_query($conn , $sqlFetchSt);
        while($fetchStudent = mysqli_fetch_assoc($queryFetchSt)){
            $studentFetched = $fetchStudent["userName"];
            $idStudent = $fetchStudent["id"];
        }
        if(mysqli_num_rows($queryFetchSt) != 0){
        
    // 
    // $sqlFetchLesson = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet' and status = 'pending'";
    // $queryFetchLesson = mysqli_query($conn , $sqlFetchLesson);
    // if(mysqli_num_rows($queryFetchLesson) > 0){
    //     $checkLesson = true;
    // }
    if($checkLesson == true){
        while($fetchingLessonData = mysqli_fetch_assoc($queryFetchLesson)){
            // echo $fetchingLessonData["lessonID"] ." " . $fetchingLessonData["teacherID"]." ".$fetchingLessonData["teacherName"]. " " . $fetchingLessonData["class"] . "<br>";
            if(empty(json_decode($fetchingLessonData["students"]))){
                // foreach(json_decode($col["blks"]) as $ele1)
                // {
                        $myArr = [$studentFetched];
                        $encodeMyarr = json_encode($myArr);
                
                $setStudentToLessonIfEmpty = $conn->prepare("UPDATE lesson SET students = ? where lessonID = ? and class = ?");
                $setStudentToLessonIfEmpty->bind_param( "sss" , $encodeMyarr , $fetchingLessonData["lessonID"] ,$fetchingLessonData["class"]);
                if(!$setStudentToLessonIfEmpty->execute()){
                    echo "Error [BLKS] Contact With Call Center: " . $updateBlks->error;
                }

                echo "<script>
                
        //                 Swal.fire({title:'تم التسجيل $studentFetched #1',
        //     icon: 'success'
        // });
        alert('تم التسجيل $studentFetched #1');
        </script>";
                header("Refresh: .3;");
                exit();
            }
            if(!empty(json_decode($fetchingLessonData["students"])))
            {
            // echo "<script>alert('تم تسجيل الطالب من قبل')</script>";
                            // if (str_contains($UserId, $_SESSION["id"])) {
                            if (!in_array($studentFetched , json_decode($fetchingLessonData["students"]))) {
                            
                        // if($y != "f"){
                            $myArrAddMoreSt = [...json_decode($fetchingLessonData["students"] , true) , $studentFetched];
                                $encodeMyarrMoreSt = json_encode($myArrAddMoreSt , JSON_UNESCAPED_UNICODE);
                                
                                // echo $ele;
                                $setStudentToLesson = $conn->prepare("UPDATE lesson SET students = ? where lessonID = ? and class = ?");
                                $setStudentToLesson->bind_param( "sss" , $encodeMyarrMoreSt , $fetchingLessonData["lessonID"] ,$fetchingLessonData["class"]);
                                if(!$setStudentToLesson->execute()){
                                    echo "Error [BLKS 2] Contact With Call Center: " . $updateBlks->error;
                                    // setcookie("rp$idPro" , "$idPro-rp" , strtotime("now") , "/");
                                }else{
                                    // echo "executed";
                                    
                                echo "<script>
                                                
        //                 Swal.fire({title:'تم إضافة الطالب $studentFetched الحصه',
        //     icon: 'success'
        // });
                                alert('تم إضافة الطالب $studentFetched الحصه');
                                
                                </script>";
                                header("Refresh: .3;");
                                exit();
                                }
                                
                            }else{
                                
                                echo "<script>
                                //  Swal.fire({title:'تم تسجيله بالفعل',icon: 'error'}
                                
                                // );
                                alert('تم تسجيله بالفعل')
                                </script>";
                                header("Refresh: .3;");
                                exit();
                            }
                        }
        }
    }else{
        echo "<script>
        //                                                         Swal.fire({title:'الحصه مقفله',
        //     icon: 'error'
        // });
        alert('الحصه مقفله')</script>";
        header("Refresh: .3;");
        exit();
    }}else{
        echo "<script>alert('الطالب ليس موجود')</script>";
        header("Refresh: .3;");
        exit();
    }
    }
}
?>

<div class="loader2_div hight-100 prLoader" >

<div class="loader2"></div>
<div class="loader3"></div>
</div>

<div class="page printed bg-fff pos-fix-center p-20 rad-10 m-20 rtl">
<div class="data">
<a href="teacher?t=<?php echo $teacherIDGetter?>">رجوع</a>
    <!-- <div class="teacher-info mx-h380 ov-scr w4000 ovr-vs scl-03"> -->
    <div class="teacher-info block mx-h380">
    <!-- <div class = 'm-15'> -->
        <?php
        $sqlNotNow = "SELECT * FROM lesson WHERE lessonID = '$lessonIDGet' and not status = 'pending'";
        $queryNotNow = mysqli_query($conn , $sqlNotNow);
        if(mysqli_num_rows($queryNotNow) == 0){
            ?>
<form method = 'POST' id = 'add_delete_student_form'>
<div>
<input type = 'text' class = 'input inp' id = 'add_delete_student_id' name = 'add_delete_student' placeholder = 'اسم الطالب او ID' />
</div>
<div>
<input type = 'submit' class = 'cns setTch btnsubmit' name = 'add_delete_student_btn' value = 'تسجيل الحصه' />
</div>
</form>
<?php } ?>
<!-- </div> -->
<!-- </div> -->
<div class="table bg-fff p-20 rad-10 m-20 rtl">
    <table class="fs-15 w-full">
                                        <thead>
                                                <tr>
                                                    <td>الأسم</td>
                                                    <!-- <td>Lesson ID</td> -->
                                                </tr>
                                        </thead>
                                        <tbody>
        <?php
if($_GET["ls"]){
if(!empty($_GET["ls"])){
                if(mysqli_num_rows($queryDetials) == 0){
                    // header("Location: ../index");
    header("Location: $link");

                    exit();
                }
                while($teste = mysqli_fetch_assoc($queryDetials2))
                {
            $countOfStudents = json_decode($teste["students"] , true);
                    // if($row["userName"] == $_GET["student"]){
                        if($countOfStudents != null){
                            if(count($countOfStudents) > 0){
                                // echo "<td>" . "عدد طلاب الحضور:" ."</td>";
                                // echo count($countOfStudents);
                            }
                            // echo "<tr class = 'd-flex f-col flx-dir-none flx-wrap'>";
                            echo "<tr class = 'd-flex f-col '>";
                            foreach($countOfStudents as $student){
                            // echo "<td class = 'fs-30'>";
                            echo "<td>";
                            echo $student;
                            echo "</td>";
                        }
                        echo "</tr>";
                    
                }else{
                    echo "<tr>";
                    echo "<td>";
                    echo "لا يوجد بيانات";
                    echo "</td>";
                    echo "</tr>";
                    // header("Location: ../index");
                }
                }
                
            }else{
                if(isset($_GET["ls"])){
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
        </tbody>

        </table>
        </div>
    </div>
</div>
</div>
<button class="btnsubmit no-print" onclick="window.print()">أطبع الصفحه</button>

<!-- <button onclick="window.print()">Print This Page</button> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script src="../js/teacher.js"></script>
<script>
    document.querySelector("#add_delete_student_form").addEventListener("submit" , (e)=>{
    if( document.querySelector("#add_delete_student_id").value.length == "" ){
        e.preventDefault();
        alert("املء البيانات بشكل صحيح");
        // Swal.fire({title:"املء البيانات بشكل صحيح", icon: "warning"});
        // location.reload();
    }else{
        // setTimeout(function (){
            // getSecondPup();
        // } , 500)
    }
})
// document.querySelector(".swal2-actions").addEventListener("click" , ()=>{
//     // location.href = window.location.href;
 
// })
// function loadAllContent(callback) {
//     let totalHeight = 0;
//     const distance = 100;
//     const timer = setInterval(() => {
//         window.scrollBy(0, distance);
//         totalHeight += distance;

//         if (totalHeight >= document.body.scrollHeight) {
//             clearInterval(timer);
//             if (callback) callback();
//         }
//     }, 100);
// }

// document.getElementById('printButton').addEventListener('click', () => {
//     loadAllContent(() => {
//         window.print();
//     });
// });
</script>


</body>
</html>