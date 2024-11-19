<?php

namespace common\models;

use common\components\helpers\UserUrl;
use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%tea_collection}}".
 *
 * @property int              $id
 * @property string           $title
 * @property string           $en_title
 * @property string|null      $subtitle
 * @property string|null      $en_subtitle
 * @property string|null      $color
 * @property string|null      $image
 *
 * @property-read Tea[]       $teas
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'integer'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'en_title', type: 'string'),
    new Property(property: 'subtitle', type: 'string'),
    new Property(property: 'en_subtitle', type: 'string'),
    new Property(property: 'color', type: 'string'),
    new Property(property: 'image', type: 'string'),
    new Property(property: 'teas', type: 'string'),

])]
class TeaCollection extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%tea_collection}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'en_title'], 'required'],
            [['title', 'en_title', 'subtitle', 'en_subtitle', 'color', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function fields(): array
    {
        return [
            'id',
            'title',
            'en_title',
            'subtitle',
            'en_subtitle',
            'color',
            'image',
            'teas'
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
            'subtitle' => Yii::t('app', 'Subtitle'),
            'en_subtitle' => Yii::t('app', 'English Subtitle'),
            'color' => Yii::t('app', 'Color'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    public static function viewMenuItems()
    {
        /** @var self[] $items */
        $items = self::find()->all();
        $results = [];
        foreach($items as $item){
            $results[] = [
                'label' => $item->title,
                'url' => UserUrl::setFilters(Tea::class, ['/tea/collection', 'id_collection' => $item->id]),
                'data-pjax' => '0'
            ];

        }

        return $results;
    }

    public function getCollectionNameArray()
    {
        $names = self::find()->select(['id', 'title'])->asArray()->all();


        return array_column($names, 'title', 'id');
    }

    final public function getTeas(): ActiveQuery
    {
        return $this->hasMany(Tea::class, ['id_collection' => 'id']);
    }
}
