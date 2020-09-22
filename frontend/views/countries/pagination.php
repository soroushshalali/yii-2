<?php

foreach ($countriesList as $k => $v){
    echo $v['id'] . '.' . $v['countryName'];
    echo '<hr>';
}
    echo \yii\widgets\LinkPager::widget([
        'pagination'=>$pagination,
    ]);
