<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

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

#[Schema(properties: [
    new Property(property: 'id', type: 'integer'),
    new Property(property: 'id_collection', type: 'integer'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'subtitle', type: 'string'),
    new Property(property: 'image', type: 'string'),
])]
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
            [
                [
                    'title',
                    'en_title',
                    'subtitle',
                    'en_subtitle',
                    'description',
                    'en_description',
                    'background_image',
                    'image',
                    'en_image',
                    'weight',
                    'en_weight',
                    'brewing_temperature',
                    'en_brewing_temperature',
                    'brewing_time',
                    'en_brewing_time',
                    'shop_link',
                    'en_shop_link'
                ],
                'string',
                'max' => 255
            ],
            [
                ['id_collection'],
                'exist',
                'skipOnError' => true,
                'targetClass' => TeaCollection::class,
                'targetAttribute' => ['id_collection' => 'id']
            ]
        ];
    }

    final public function fields(): array
    {
        return [
                'id',
                'id_collection' => function () {
                    $item = TeaCollection::find()->where(['id' => $this->id_collection])->one();
                    return $item->title;
                },
                'title',
//                'en_title',
                'subtitle',
//                'en_subtitle',
//                'description',
//                'en_description',
//                'background_image',
                'image',
//                'en_image',
//                'weight',
//                'en_weight',
//                'brewing_temperature',
//                'en_brewing_temperature',
//                ',brewing_time',
//                'en_brewing_time',
//                'buy_button',
//                'shop_link',
//                'en_shop_link',
//                'API_priority',
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
            'en_title' => Yii::t('app', 'English Title'),
            'id_collection' => Yii::t('app', 'ID Collection'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'en_subtitle' => Yii::t('app', 'English Subtitle'),
            'description' => Yii::t('app', 'Description'),
            'en_description' => Yii::t('app', 'English Description'),
            'background_image' => Yii::t('app', 'Background Image'),
            'image' => Yii::t('app', 'Image'),
            'en_image' => Yii::t('app', 'English Image'),
            'weight' => Yii::t('app', 'Weight'),
            'en_weight' => Yii::t('app', 'English Weight'),
            'brewing_temperature' => Yii::t('app', 'Brewing Temperature'),
            'en_brewing_temperature' => Yii::t('app', 'English Brewing Temperature'),
            'brewing_time' => Yii::t('app', 'Brewing Time'),
            'en_brewing_time' => Yii::t('app', 'English Brewing Time'),
            'buy_button' => Yii::t('app', 'Buy Button'),
            'shop_link' => Yii::t('app', 'Shop Link'),
            'en_shop_link' => Yii::t('app', 'English Shop Link'),
            'API_priority' => Yii::t('app', 'API Priority'),
        ];
    }


    final public function getCollection(): ActiveQuery
    {
        return $this->hasOne(TeaCollection::class, ['id' => 'id_collection']);
    }
}
