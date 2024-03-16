<form action="modules/themadmin/xuly.php" autocomplete="off" class="box-dangky" method="POST">
    <h1>Đăng ký (Admin)</h1>
    <input type="text" name="name" placeholder="tên đăng nhập">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="Mật khẩu">
    <input type="hidden" name="registration_time" value="<?php echo time(); ?>">

    <input type="submit" name="dangky" value="Đăng ký">
</form>
