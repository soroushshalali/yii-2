<?php

namespace frontend\controllers;

use app\models\Countries;
use app\models\Continent;
use yii\data\Pagination;
use yii\web\Cookie;

class CountriesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query='SELECT * FROM countries';
        $data=\Yii::$app->db->createCommand($query)->queryAll();
        echo '<pre>';
        print_r($data);
        //return $this->render('index');
    }

    public function actionUpdate($cname=null){
        $query="UPDATE countries SET population='3' WHERE countryName='$cname' ";
        $is= \Yii::$app->db->createCommand($query)->execute();
        if ($is){
            echo 'OK!';
        }else{
            echo 'NO';
        }
    }

    public function actionInsert(){
        $is=\Yii::$app->db->createCommand()->insert('countries',[
        'countryCode' => 'ww',
        'countryName' => 'wwwww',
        'currencyCode' => 'ww',
        'population' => 3,
        'isoNumeric' => 020,
        'capital' => 'wwwwaswwww',
        'languages' => 'ww',
        ])->execute();
        if ($is){
            echo 'OK';
        }else{
            echo 'NO';
        }
    }

    public function actionDelete($cname){
        $is=\Yii::$app->db->createCommand()->delete('countries',['countryName'=>$cname])->execute();
        if ($is){
            echo 'OK';
        }else{
            echo 'NO';
        }
    }

    //***ActiveRecord***//

    public function actionCreateact($cn=null , $cc='ac'){
        $countries=new Countries();
        $countries->countryName=$cn;
        $countries->countryCode=$cc;
        if ($countries->validate()){
            $countries->save();
        }else{
            print_r($countries->getErrors());
        }
    }

    //Create with Attributes
    public function actionCreateAttr(){
        $values=[
            'countryName' => 'aaaasss',
            'currencyCode'=>'AS',
            'capital'=>'AS City',
        ];
        $countries=new Countries();
        $countries->attributes=$values;
        if ($countries->save()){
            echo 'OK';
        }else{
            print_r($countries->getErrors());
        }

    }

    public function actionSelectact($cn=null, $ids){

            $country=Countries::find()->where(['countryName'=>$cn])->one();


       // print_r($country);
        $countriesCount=Countries::find()->count();

        $countriesName=Countries::findAll(explode(',' , $ids));



        return $this->render('_show' , ['country'=> $country , 'countriesCount'=>$countriesCount , 'countriesName'=>$countriesName ]);
    }

    public function actionUpdateact(){
        $country=Countries::find()->where(['countryName'=>'a'])->one();
        if ($country != null) {

            $country->countryName = 'aaa';
            if ($country->save()) {
                echo 'Updated';
            } else {
                echo 'Not';
            }
        }else{
            $countries=new Countries();
            $countries->countryName="aaaaa new Country";
            if($countries->save()){
                echo 'created';
            }else{
                echo 'Not Created';
            }
        }


    }

    //wann und Warum sollen wir BatchQuery nutzen??? :\
    public function actionBatchQuery(){
        echo '<pre>';
//        foreach (Countries::find()->batch(10) as $value ){
//            print_r($value);
//            echo '<hr>';
//        }


        foreach (Countries::find()->each(10) as $value ){
            echo $value->countryName;
            echo '<hr>';
        }
    }

    public function actionUpdateCounter(){
        $countries=new Countries();
        $counter=$countries::findOne(['id' => 6]);
        $counter->updateCounters(['amount' => 2]);
    }

    public function actionUpdateAll(){
//        $countries=new Countries();
            $countries=Countries::updateAll(['amount'=>3] ,'id > 100 AND id < 150');
    }

    public function actionDeleteact($id=null){
        if ($id != null){
            $country=Countries::findOne($id);
            if ($country->delete()){
                echo 'Deleted';
            }else{
                echo 'country $id not found';
            }
        }
    }

    public function actionDeleteAll(){
        if (Countries::deleteAll('id < 9')){
            echo 'deleted';
        }else{
            echo 'not';
        }
    }

    public function actionTransaction(){
        $country1=Countries::findOne(9);
        $country2=Countries::findOne(8);
        if ($country1 != null && $country2!=null){
            $transaction=Countries::getDb()->beginTransaction();
            try {
                $country1->countryName='Antarctica5';
                $country1->update();
                $country2->countryName='Argentina5';
                $country2->update();
                $transaction->commit();
            }catch (Exception $e){
                $transaction->rollBack();
            }
        }


    }

    //pagination
    public function actionPagination(){
        $query=Countries::find();
        $count=$query->count();
        $pagination= new Pagination([
            'totalCount' =>$count,
            'defaultPageSize'=>5
        ]);
        $countriesList = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('pagination',['countriesList' => $countriesList , 'pagination'=>$pagination]);

    }

}
