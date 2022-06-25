
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
    <form class="form container form--invalid" action="/sign-up.php" method="post" autocomplete="off"> <!-- form
    --invalid -->
      <h2>Регистрация нового аккаунта</h2>

      <?php $classname = isset($errors["email"])? "form__item--invalid ": ""; ?>
      <div class="form__item  <?=$classname ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <?php $email = isset ($user['email']) ? $user['email'] : ""; ?>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $email ;?>">
        <span class="form__error"><?= $errors["email"]; ?></span>
      </div>
      <div class="form__item">
        <label for="password">Пароль <sup>*</sup></label>
        <?php $passw = isset ($user['password']) ? $user['password'] : ""; ?>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?= $passw ;?>"">
        <span class="form__error"><?= $errors["password"]; ?></span>
      </div>
      <div class="form__item">
        <label for="name">Имя <sup>*</sup></label>
          <?php $username = isset ($user['name']) ? $user['name'] : ""; ?>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $username ;?>">
        <span class="form__error"><?= $errors["name"]; ?></span>
      </div>
      <div class="form__item">
        <label for="message">Контактные данные <sup>*</sup></label>
        <?php $message = isset ($user['message']) ? $user['message'] : ''; ?>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться"> <?= $message;?></textarea>
        <span class="form__error"><?= $errors["message"]; ?></span>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
  </main>

</div>
