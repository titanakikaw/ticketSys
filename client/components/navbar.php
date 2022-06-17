<div class="navbar" style="position: fixed;">
    <div class="navlogo">
        <h3>DRISM | TMS</h3>
    </div>
    <div class="nav-items">
        <div class="nav-item">
            <!-- <p>Software Engr. | Orsua, Christian Marvin T.</p> -->
            <?php echo "<p style='color:#f3f3f3;'>" . $_SESSION['position'] . " " . $_SESSION['rank'] . " | " . $_SESSION['current_name'] . "</p>" ?>
        </div>
        <form id="form-logout" method="POST">
            <input type="button" value="Log out" id="logoutBtn" onclick="logout()">
            <input type="text" name="method" hidden value="logout">
        </form>
    </div>
</div>
<script>
    let formLogout = $('#form-logout');

    function logout() {
        formLogout.submit();
    }
</script>