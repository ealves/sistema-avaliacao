<div id="login">
  <h1>CPA</h1>
  <form action="/admin/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;">
  <input type="hidden" name="_method" value="POST"/></div>
  <label>
  <span>Usuário / Email</span>
  <input name="data[User][username]" maxlength="50" type="text" id="UserEmail" placeholder="Usuário" value="ealves"/>
  </label>
  <label>
  <span>Funcional</span>
  <input name="data[User][password]" type="password" id="UserPassword" placeholder="Funcional" value="0601A144JD6"/>
  </label>
 <!--<label>
  <input type="checkbox" name="lembrar" />
  <span>Lembrar</span>
  </label><a href="" id="recover">Perdeu a senha?</a> -->
  <input type="submit" value="Entrar" />
  </form>
</div>