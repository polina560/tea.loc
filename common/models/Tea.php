<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%tea}}".
 *
 * @property int                $id
 * @property string             $title
 * @property string             $en_title
 * @property int|null           $id_collection
 * @property string|null        $subtitle
 * @property string|null        $en_subtitle
 * @property string|null        $description
 * @property string|null        $en_description
 * @property string|null        $background_image
 * @property string|null        $image
 * @property string|null        $en_image
 * @property string|null        $weight
 * @property string|null        $en_weight
 * @property string|null        $brewing_temperature
 * @property string|null        $en_brewing_temperature
 * @property string|null        $brewing_time
 * @property string|null        $en_brewing_time
 * @property int|null           $buy_button
 * @property string|null        $shop_link
 * @property string|null        $en_shop_link
 * @property int|null           $API_priority
 *
 * @property-read TeaCollection $collection
 */
class Tea extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%tea}}';
    }

    public static function externalAttributes(): array
    {
        return ['collection.title'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'en_title'], 'required'],
            [['id_collection', 'buy_button', 'API_priority'], 'integer'],
            [['title', 'en_title', 'subtitle', 'en_subtitle', 'description', 'en_description', 'background_image', 'image', 'en_image', 'weight', 'en_weight', 'brewing_temperature', 'en_brewing_temperature', 'brewing_time', 'en_brewing_time', 'shop_link', 'en_shop_link'], 'string', 'max' => 255],
            [['id_collection'], 'exist', 'skipOnError' => true, 'targetClass' => TeaCollection::class, 'targetAttribute' => ['id_collection' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'en_title' => Yii::t('app', 'En Title'),
            'id_collection' => Yii::t('app', 'Id Collection'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'en_subtitle' => Yii::t('app', 'En Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'en_description' => Yii::t('app', 'En Description'),
            'background_image' => Yii::t('app', 'Background Image'),
            'image' => Yii::t('app', 'Image'),
            'en_image' => Yii::t('app', 'En Image'),
            'weight' => Yii::t('app', 'Weight'),
            'en_weight' => Yii::t('app', 'En Weight'),
            'brewing_temperature' => Yii::t('app', 'Brewing Temperature'),
            'en_brewing_temperature' => Yii::t('app', 'En Brewing Temperature'),
            'brewing_time' => Yii::t('app', 'Brewing Time'),
            'en_brewing_time' => Yii::t('app', 'En Brewing Time'),
            'buy_button' => Yii::t('app', 'Buy Button'),
            'shop_link' => Yii::t('app', 'Shop Link'),
            'en_shop_link' => Yii::t('app', 'En Shop Link'),
            'API_priority' => Yii::t('app', 'Api Priority'),
        ];
    }

    final public function getCollection(): ActiveQuery
    {
        return $this->hasOne(TeaCollection::class, ['id' => 'id_collection']);
    }
}
