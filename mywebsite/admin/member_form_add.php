  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ฟอร์มเพิ่มข้อมูลสมาชิก</h1>
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

                <div class="card-body">
                  
                    <div class="form-group row">
                      <label class="col-sm-1">คำนำหน้า</label>
                      <div class="col-sm-4">
                        <select name="title_name" class="form-control" require>
                          <option value="">เลือกคำนำหน้า</option>
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
                        <input type="text" name="name" class="form-control" require placeholder="ชื่อ" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-1">นามสกุล</label>
                      <div class="col-sm-4">
                        <input type="text" name='surname' class="form-control" require placeholder="นามสกุล" >
                      </div>
                    </div>
                  <div class="form-group row">
                      <label class="col-sm-1"></label>
                      <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <!-- <button type="submit" class="btn btn-primary">บันทึก</button> -->
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
                  // echo"pre";
                  // print_r($_POST);
                  if (isset($_POST['name']) && isset($_POST['surname'])) {

                    $title_name = $_POST['title_name'];
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];

                    //sql insert
                    $stmtInsertMember = $condb->prepare("INSERT INTO tbl_member 
                    (
                      title_name,
                      name, 
                      surname
                    )
                    VALUES 
                    (
                      :title_name,
                      :name, 
                      :surname
                    )
                    ");

                    //bindParam
                    $stmtInsertMember->bindParam(':title_name', $title_name, PDO::PARAM_STR);
                    $stmtInsertMember->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmtInsertMember->bindParam(':surname', $surname , PDO::PARAM_STR);
                    $result = $stmtInsertMember->execute();
                    
                    $condb = null;

                    if($result){
                      echo '<script>
                           setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลสำเร็จ",
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

                  }
                 ?>

