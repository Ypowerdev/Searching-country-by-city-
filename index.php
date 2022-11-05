
<?php

$cities = [

    'Япония' => 'Токио',
    'Мексика' => 'Мехико',
    'США' => 'Нью-Йорк',
    'Индия' => 'Мумбаи',
    'Корея' => 'Сеул',
    'Китай' => 'Шанхай',
    'Нигерия' => 'Лагос',
    'Аргентина' => 'Буэнос-Айрес',
    'Египет' => 'Каир',
    'Англия' => 'Лондон',
];
$city  = '';
$country = '';

if($_SERVER['REQUEST_METHOD' ] == 'POST'){
  if(!empty($_POST['city']) && $city = strip_tags(trim($_POST['city']))){
    if(in_array($city, $cities) && $country = array_search($city, $cities)){      
        echo "<div> $city находится в $country </div>";      
    }
  }
}  
?>
<form method=POST>
  <label>Выберите город</label>
  <select name="city">
  <?php foreach ($cities as $count => $city): ?>
      <option value="<?=$city?>"><?=$city?></option>
  <?php endforeach;?>
  </select>
  <div class="row">
      <input type="submit">
  </div>
</form>
