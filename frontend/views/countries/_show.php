<h1>Name : <?= $country->countryName ?></h1>
<h1>Population : <?= $country->population ?></h1>
<br>
<h1>countriesCount : <?=   $countriesCount    ?></h1>

<?php
foreach ($countriesName as $value){
?>
<table  class="table table-hover" >
    <tr>
        <th>name</th>
        <td><?= $value['countryName'] ?></td>
    </tr>
    <tr>
        <th>name</th>
        <td><?=  $value['population']   ?></td>
    </tr>
</table>
<?php } ?>