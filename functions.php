<?php function url1($url) { 
    print '<div><a class="link" href="'.$url.'">'.$url.'</a>';
};

function printtext($text) {
    print '<p class="successtext">'. $text . '</p>';
};

function wrongpassword() {
    print '<div class="wrongpassword">Пароль не существует или введен неверно. Попробуйте еще раз.</div>
    <a class="backurl" href="/">Вернуться на главную страницу</a>';
}