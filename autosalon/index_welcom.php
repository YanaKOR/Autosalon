<h2><?php echo  $welcom;  ?></h2>

<h3><?php
if (isset($_SESSION['user'])) {
   echo
 $_SESSION['user']['full_name'];}
 else{echo $customer;} 
 ?></h3>


<?php

if (isset($_SESSION['language']) && $_SESSION['language'] == "russian") {
   echo '

<div>Авто-Мото салон "ЯК" работает в сфере автомобильного бизнеса с 2006г.<br>
   Занимаемся продажей автомобилей и мотоциклов, новых и с пробегом.</div>

<div> Автомобили и мотоциклы с НДС и официальной гарантией.</div>

<div>
   <ul>
      <p>Наш Авто-Мото салон оказывает следующие услуги:</p>

      <li>Новые автомобили и мотоциклы из РФ</li>
      <li> Электромобили</li>
      <li>Автомобили и мотоциклы с пробегом из США и Европы</li>
      <li>Комиссионная продажа автомобилей и мотоциклов на выгодных условиях</li>
      <li> Сезонное хранение мотоциклов / квадроциклов</li>
      <li> Срочный выкуп</li>
      <li> Trade-In (ваш автомобиль или мотоцикл в зачет)</li>
      <li> Лизинг и рассрочка</li>
   </ul>
   <p>Мы рады видеть Вас:
      с 10:00 до 19:00 (будние)
      с 11:00 до 16:00 (выходные)</p>';
}

if (isset($_SESSION['language']) && $_SESSION['language'] == "english") {
   echo '<div> Auto-Moto salon "YAK" has been working in the automotive business since 2006. <br>
   We are engaged in the sale of cars and motorcycles, new and used. </div>

<div> Cars and motorcycles with VAT and official warranty. </div>

<div>
   <ul>
      <p> Our Auto-Moto salon provides the following services: </p>

      <li> New cars and motorcycles from the Russian Federation </li>
      <li> Electric cars </li>
      <li> Used cars and motorcycles from USA and Europe </li>
      <li> Commission sale of cars and motorcycles on favorable terms </li>
      <li> Seasonal storage of motorcycles / ATVs </li>
      <li> Urgent redemption </li>
      <li> Trade-In (your car or motorcycle is credited) </li>
      <li> Leasing and installment plan </li>
   </ul>
   <p> We are glad to see you:
      from 10:00 to 19:00 (weekdays)
      from 11:00 to 16:00 (weekend) </p> ';
}
?>