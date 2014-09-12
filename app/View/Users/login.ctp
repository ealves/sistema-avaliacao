<div id="login">
    <h1>CPA</h1>
    <form action="/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;">
            <input type="hidden" name="_method" value="POST"/></div>
        <!--<label>
            <span>Usuário / Email</span>
            <input name="data[User][username]" maxlength="50" type="text" id="UserEmail" placeholder="Usuário" value="ealves"/>
        </label>-->
        <label>
            <span>R.A. / Funcional</span>
           <?php if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1'):?>
            <input name="data[User][password]" type="password" id="UserPassword" placeholder="R.A. ou Funcional" value="362476"/>
            <?php else:?>
            <input name="data[User][password]" type="password" id="UserPassword" placeholder="R.A. ou Funcional" value=""/>
           <?php endif;?>
        </label>
        <!--<label>
         <input type="checkbox" name="lembrar" />
         <span>Lembrar</span>
         </label><a href="" id="recover">Perdeu a senha?</a> -->
        <input type="submit" value="Entrar" />
    </form>
</div>