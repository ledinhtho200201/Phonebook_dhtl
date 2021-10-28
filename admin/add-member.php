<?php
    include("./partials/menu.php");
?>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm danh bạ nhân viên</h2>
                    <form action="process-add-member.php" method="post">
                        <div class="row mb-3">
                            <label for="txtHoTen" class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="txtHoTen" name="txtHoTen">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtChucVu" class="col-sm-2 col-form-label">Chức vụ</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="txtChucVu" name="txtChucVu">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtMayBan" class="col-sm-2 col-form-label">Số máy bàn</label>
                            <div class="col-sm-10">
                            <input type="tel" class="form-control" id="txtMayBan" name="txtMayBan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtMobile" class="col-sm-2 col-form-label">Số di động</label>
                            <div class="col-sm-10">
                            <input type="tel" class="form-control" id="txtMobile" name="txtMobile">
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
                                    mysqli_close($conn);
                                ?>
             
                                <!-- Du lieu can phai doc tu BANG Don Vi-->
                            </select>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
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