    <div class="container">
      <form class="form-signin" role="form" method="POST" action="index.php" >
        <h2 class="form-signin-heading">Авторизируйтесь</h2>
        <? echo $error; ?>
        <input type="name" name="login" maxlength="25" minlength="4" class="form-control" placeholder="Логин" required autofocus>
        <input type="password" name="password" maxlength="25" minlength="4" class="form-control" placeholder="Пароль" required>
        <button href="index.php"  class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>
    </div> <!-- /container -->
<table id="t">
    <tr>
        <td class="c" onclick = "func()">Текст</td>
    </tr>
</table>