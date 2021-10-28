<?php
    include("./partials/menu.php");
?>
<?php
    include('../config/db.php');
    $manv=$_GET["manv"];
    $sql="select * from db_nhanvien where manv='$manv'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cập nhật danh bạ nhân viên</h2>
                    <form action="process-edit-member.php" method="post">
                        
                        <input type="hidden" class="form-control" id="txtMaNv" value="<?php echo $manv ?>" name="txtMaNv">
                        <div class="row mb-3">
                            <label for="txtHoTen" class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="txtHoTen" value="<?php echo $row['tennv'] ?>" name="txtHoTen">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtChucVu" class="col-sm-2 col-form-label">Chức vụ</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="txtChucVu" value="<?php echo $row['chucvu']; ?>" name="txtChucVu">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtMayBan" class="col-sm-2 col-form-label">Số máy bàn</label>
                            <div class="col-sm-10">
                            <input type="tel" class="form-control" id="txtMayBan" value="<?php echo $row['mayban']; ?>" name="txtMayBan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="txtEmail" value="<?php echo $row['email']; ?>" name="txtEmail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtMobile" class="col-sm-2 col-form-label">Số di động</label>
                            <div class="col-sm-10">
                            <input type="tel" class="form-control" id="txtMobile" value="<?php echo $row['sodidong']; ?>" name="txtMobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtMaDV" class="col-sm-2 col-form-label">Tên đơn vị</label>
                            <div class="col-sm-10">
                            <select name="sltMaDV" id="sltMaDV">
                                <?php
                                    // Buoc 1: Ket noi server
                                    require("../config/db.php");
                                    // Buoc 2: Truy van du lieu
                                    $sql = "SELECT * FROM db_donvi";
                                    $result = mysqli_query($conn,$sql);
                                    // Buoc 3: Xu li ket qua
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['madv'].'">'.$row['tendv'].'</option>';
                                        }
                                    }
                                    //Buoc 4 dong ket noi
                                    //mysqli_close($conn);
                                ?>
             
                                <!-- Du lieu can phai doc tu BANG Don Vi-->
                            </select>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                        <?php
                        //process edit member
                            include('process-edit-member.php')
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
        <!--Start footer -->
<?php
    include("./partials/footer.php");
?>
        <!--End footer  -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>