<?php

if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {
    echo '
                    <p>Карта проезда</p>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.6172834844233!2d27.59613001540882!3d53.90300604057058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfb3d74b1b95%3A0xc94631cd4fc2a140!2z0YPQuy4g0JrQvtC30LvQvtCy0LAgMjgsINCc0LjQvdGB0Lo!5e0!3m2!1sru!2sby!4v1602075314704!5m2!1sru!2sby"
                            width="300" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>

                    <p>Адрес:</p><br>
        г. Минск ул. Козлова д.28
                    <p>Tелефон:</p>786487536
                    <p>Email:</p>automoto@yandex.by';
}
if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
    echo '
                    <p>Road map</p>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.6172834844233!2d27.59613001540882!3d53.90300604057058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfb3d74b1b95%3A0xc94631cd4fc2a140!2z0YPQuy4g0JrQvtC30LvQvtCy0LAgMjgsINCc0LjQvdGB0Lo!5e0!3m2!1sru!2sby!4v1602075314704!5m2!1sru!2sby"
                            width="300" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>

                    <p>Address:</p><br>
         Мinsk city, Кozlova street / 28
                    <p>Phone number:</p>786487536
                    <p>Email:</p>automoto@yandex.by';
}


?>          