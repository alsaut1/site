<main>
  <section class="promo">
      <h2 class="promo__title">Нужен стафф для катки?</h2>
      <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
      <ul class="promo__list">
          <?php for ($i = 0; $i < count($categories); $i++): ?>
          <li class="promo__item promo__item--boards">
             <a class="promo__link" href="pages/all-lots.html"><?=($categories[$i]['name']); ?></a>
          </li>
          <?php endfor;?>
      </ul>
  </section>

  <form class="form container" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <?php $classname = isset($errors['email'])? "form__item--invalid": ""; ?>
    <div class="form__item  <?= $classname ?> "> <!-- form__item--invalid -->
      <label for="email">E-mail <sup>*</sup></label>
      <?php $email = isset ($autuser['email']) ? $autuser['email'] : ""; ?>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value ="<?= $email ;?>">
      <span class="form__error">Введите e-mail</span>
    </div>
    <?php $classname = isset($errors['password'])? "form__item--invalid": ""; ?>
    <div class="form__item form__item--last <?= $classname ?>">
      <label for="password">Пароль <sup>*</sup></label>
      <?php $password = isset ($autuser['password']) ? $autuser['password'] : ""; ?>
      <input id="password" type="text" name="password" placeholder="Введите пароль" value ="<?= $password ;?>">
      <span class="form__error">Введите пароль</span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>

</div>
