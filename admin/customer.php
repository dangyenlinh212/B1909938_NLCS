<?php
ob_start();
include('includes/header.php'); 
include('includes/navbar.php');

?>
<?php include '../classes/user.php'?>
<?php 
  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerbtn'])){
    $insertCustomer = $user->insert_Customer($_POST);
  }
?>
<div class="modal fade" id="addcustomerprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Khách Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label>Họ và Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập Họ và Tên">
          </div>
          <div class="form-group">
            <label>Tên Đăng Nhập</label>
            <input type="text" name="username" class="form-control" placeholder="Nhập Tên Đăng Nhập">
          </div>
          <div class="form-group">
            <label>Địa Chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Nhập Địa Chỉ">
          </div>
          <div class="form-group">
            <label>Số Điện Thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Nhập Số Điện Thoại">
          </div>
          <div class="form-group">
            <label>Mật Khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu">
          </div>
          <div class="form-group">
            <label>Xác Nhận Mật Khẩu</label>
            <input type="password" name="repeatpassword" class="form-control" placeholder="Xác Nhận Mật Khẩu">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Nhập Email">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Quản Lý Khách Hàng
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcustomerprofile">
          Thêm Khách Hàng
        </button>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Họ và Tên</th>
              <th>Tên Đăng Nhập</th>
              <th>Địa Chỉ</th>
              <th>Số Điện Thoại</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $customerList = $user->Get_UserList();

            if ($customerList) {
                $i = 0;
                while ($customer = $customerList->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $customer['nameCus']; ?></td>
              <td><?php echo $customer['username']; ?></td>
              <td><?php echo $customer['address']; ?></td>
              <td><?php echo $customer['phone']; ?></td>
              <td><?php echo $customer['emailCus']; ?></td>
            </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
ob_end_flush();
?>
