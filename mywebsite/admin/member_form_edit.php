<?php
    if(isset($_GET['id'])&& $_GET['act']=='edit'){

      //single row query เเสดงเเค่ 1 รายการ
      $stmtMemberDetail = $condb->prepare("SELECT* FROM tbl_member WHERE id=?");
      $stmtMemberDetail->execute([$_GET['id']]);
      $row = $stmtMemberDetail->fetch(PDO::FETCH_ASSOC);

//       echo'<pre>'; 
//       print_r($row);      
// exit;


      if($stmtMemberDetail->rowCount() != 1){
          exit();
      }
    }//isset
    ?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มปรับปรุงข้อมูลสมาชิก</h1>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="card card-primary">
                <!-- form start -->
                <form action="" method="post"> 

                <div class="form-group row">
                      <label class="col-sm-1">คำนำหน้า</label>
                      <div class="col-sm-4">
                        <select name="title_name" class="form-control" require>
                        <option value="<?php echo $row['title_name'];?>"><?php echo $row['title_name'];?></option>
                          <option disabled="">เลือกคำนำหน้า</option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        </select>
                      </div>
                    </div>

                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-1">ชื่อ</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" require placeholder="ชื่อ" value="<?php echo $row['name'];?>" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-1">นามสกุล</label>
                      <div class="col-sm-4">
                        <input type="text" name='surname' class="form-control" require placeholder="นามสกุล" value="<?php echo $row['surname'];?>" >
                      </div>
                    </div>
                  <div class="form-group row">
                      <label class="col-sm-1"></label>
                      <div class="col-sm-4">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <!-- <button type="submit" class="btn btn-primary"></button> -->
                        <button type="submit" class="btn btn-primary">ปรับบปรุงข้อมูล</button>
                        <a href="member.php" class="btn btn-danger">ยกเลิก</a>
                      </div>
                    </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
                // echo'<pre>';
                // print_r($_POST);
                // exit;

                if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['surname'])){

                  // echo'เข้าเงื่อนไข';
                  // exit;

                  $id = $_POST['id'];
                  $title_name = $_POST['title_name'];
                  $name = $_POST['name'];
                  $surname = $_POST['surname'];
                  //sql update
                    $stmtUpdate = $condb->prepare("UPDATE  tbl_member SET 
                      title_name=:title_name,
                      name=:name, 
                      surname=:surnamex 
                      WHERE id=:id
                      ");
                      //bindParam
                    $stmtUpdate->bindParam(':id', $id , PDO::PARAM_INT);
                    $stmtUpdate->bindParam(':title_name', $title_name , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':name', $name , PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':surnamex', $surname , PDO::PARAM_STR);
                    $result = $stmtUpdate->execute();

                    $condb = null; //close connect db

                    if($result){
                      echo '<script>
                           setTimeout(function() {
                            swal({
                                title: "แก้ไขข้อมูลสำเร็จ",
                                type: "success"
                            }, function() {
                            window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                          }, 1000);
                      </script>';
                  }else{
                     echo '<script>
                           setTimeout(function() {
                            swal({
                                title: "เกิดข้อผิดพลาด",
                                type: "error"
                            }, function() {
                                window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                          }, 1000);
                      </script>';
                  }
                } //isset
                 // window.location = "member.php?id='.$id.'&act=edit"; //หน้าที่ต้องการให้กระโดดไป

                ?>
