<form action="index.php?page=login" method="post">
    <div class="main-background">
        <div class="login-container">
            <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            <button type="submit" id="loginButton">Đăng Nhập</button>
            <span id="warningMessage" style="display: none; color: red; margin-top: 10px;"></span>
            <p class="custom-link">Nếu chưa có tài khoản, <a href="index.php?page=register">đăng ký ngay</a>.</p>

        </div>
    </div>
</form>

<!-- <script>
    document.getElementById('loginButton').addEventListener('mouseenter', function (e) {
        const password = document.getElementById('password').value;
        if (password.length < 6) {
            this.style.position = 'absolute';
            const minWidth = 100;
            const maxWidth = Math.min(800, window.innerWidth - this.clientWidth);
            const minHeight = 100;
            const maxHeight = Math.min(600, window.innerHeight - this.clientHeight);
            const randomLeft = Math.random() * (maxWidth - minWidth) + minWidth;
            const randomTop = Math.random() * (maxHeight - minHeight) + minHeight;
            this.style.left = randomLeft + 'px';
            this.style.top = randomTop + 'px';
            warningMessage.style.display = 'block';
            warningMessage.textContent = 'Mật khẩu phải ít nhất 6 ký tự.';
        } else {

            warningMessage.style.display = 'none';
        }
    });


</script>

<style>
    .custom-link {
    font-size: 16px;
    /* color: #333; */
    margin-top: 10px;
}

.custom-link a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.custom-link a:hover {
    text-decoration: underline;
}

</style> -->