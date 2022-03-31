
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php for ($i = 0; $i < count($categories); $i++): ?>
            <li class="promo__item promo__item--boards">
               <a class="promo__link" href="pages/all-lots.html"><?=($categories[$i]); ?></a>
            </li>
            <?php endfor;?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach ($goods as $key => $value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$value['img'];?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$value['name'];?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$value['title'];?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">цена</span>
                            <span class="lot__cost"><?= cena_bjut($value['startprice']);?></span>
                        </div>
                        <?php $res = get_dt_range ($value['enddate']); ?>
                        <div class="lot__timer timer <?php if ($res[0]<1) print (" timer--finishing"); ?>" >
                            <?php
                            //print($value[4]);
                            print ($res[0].':'.$res[1]);
                            ?>
                        </div>
                    </div>
                </div>
            </li>
          <?php endforeach; ?>
        </ul>
    </section>
