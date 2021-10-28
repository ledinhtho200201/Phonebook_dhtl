<?php
    include("./partials/menu.php");
?>

        <!--Start main-->
        <div class="row">
            <!--<div class="col-md-4 bg-danger">
                Cây danh mục các đơn vị mỗi đơn vị là một nút
            </div>-->
            <div class="col-md-12 ">
                <!--Trang chủ sẽ hiển thị ntn? Tất cả danh mục người dùng( dưới dạng Bảng) & có phân trang-->
                <div>
                    <form method="get" action="add-member.php">
                        <button class="btn btn-success">Thêm mới</button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số di động</th>
                        <th scope="col">Tên đơn vị</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Lấy dữ liệu từ CSDL và đổ ra bảng (phần lặp lại)
                            //Bước 1: Kết kết nối tới CSDL(Mysql)
                            $conn=mysqli_connect('localhost','root','','dhtl_danhba');
                            if(!$conn){
                                die("Không thể kết nối. Kiểm tra lại các tham số kết nối");
                            }

                            //Bước 2: Khai báo các câu lệnh thực thi và thực hiện truy vấn
                            $sql = "SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien as nv, db_donvi as dv WHERE nv.madv=dv.madv";
                            $result = mysqli_query($conn,$sql); 

                            //Bước 3: Xử lí kêt quả trả về
                            if(mysqli_num_rows($result)>0){
                                $i=1;
                                while($row=mysqli_fetch_assoc($result)){
                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $row['tennv']; ?></td>
                                        <td><?php echo $row['chucvu']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['sodidong']; ?></td>
                                        <td><?php echo $row['tendv']; ?></td>
                                        <td><a href="edit-member.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="xoaNhanvien.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-trash"></i></a></td>
                                        <!--  DELETE FROM db_nhanvien WHERE manv=1 -->
                                    </tr>
                        <?php
                                $i++;
                                }  
                            }
                        ?>
                    </tbody>
                </table>            
            </div>
        </div>
        <!--End main-->

        <!--Start footer -->
<?php
    include("./partials/footer.php");
?>
        <!--End footer  -->

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>