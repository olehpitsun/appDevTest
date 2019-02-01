Привіт, <i>{{ $demo->receiver }}</i>,
<p>Цей лист надіслано із сайту з тестовим завданням для AppDev</p>

<p><u>нформація для входу на сайт, як учасник "Персонал"::</u></p>

<div>
    <p><b>Ваш логін:</b>&nbsp;{{ $demo->login }}</p>
    <p><b>Ваш пароль: </b>&nbsp;{{ $demo->password }}</p>
</div>




Thank You,
<br/>
<i>{{ $demo->sender }}</i>