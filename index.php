
<?php

class Cities
{
    public $cities = [
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

    public function getCountryByCity($city)
    {
        return array_search($city, $this->cities);
    }

}

$city1 = new Cities;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['city'])) {
    $city = trim(strip_tags($_POST['city']));

    if ($result = $city1->getCountryByCity($city)) {
        echo "<div> ${city} находится в ${result} </div>";
    }
}

class FormCities
{
    public $cities = [];
    public $method = 'POST';

    public function __construct($cities, $method = 'POST')
    {
        $this->cities = $cities;
        $this->method = $method;
    }

    public function render()
    {
        $form = '<form method=' . $this->method . '>
        <label>Выберите город</label>
        <select name="city">';

        foreach ($this->cities as $city):
            $form .= "<option>{$city}</option>";
        endforeach;

        $form .= '
        </select>
        <div class="row">
            <input type="submit">
        </div>
        </form>';
        
        return $form;
    }
}

$formCities = new FormCities($city1->cities);
echo $formCities->render();

?> 
