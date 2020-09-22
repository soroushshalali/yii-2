<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $countryCode
 * @property string $countryName
 * @property string|null $currencyCode
 * @property string|null $population
 * @property string|null $isoNumeric
 * @property string|null $capital
 * @property string|null $languages
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryName'] , 'required' , 'message'=>'asd asd qwe.'],
            [['countryCode'], 'string', 'max' => 2],
            [['countryName'], 'string', 'max' => 45],
            [['currencyCode'], 'string', 'max' => 3],
            [['population'], 'string', 'max' => 20],
            [['isoNumeric'], 'string', 'max' => 4],
            [['capital'], 'string', 'max' => 30],
            [['languages'], 'string', 'max' => 100],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countryCode' => Yii::t('app', 'Country Code'),
            'countryName' => Yii::t('app', 'Country Name'),
            'currencyCode' => Yii::t('app', 'Currency Code'),
            'population' => Yii::t('app', 'Population'),
            'isoNumeric' => Yii::t('app', 'Iso Numeric'),
            'capital' => Yii::t('app', 'Capital'),
            'languages' => Yii::t('app', 'Languages'),
        ];
    }
}
