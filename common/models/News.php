<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int         $id
 * @property string      $title
 * @property string      $en_title
 * @property int|null    $API_priority
 * @property int         $date
 * @property string|null $description
 * @property string|null $en_description
 * @property string|null $text
 * @property string|null $en_text
 * @property string|null $image
 * @property string|null $status
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'integer'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'date', type: 'datetime'),
    new Property(property: 'description', type: 'string'),
    new Property(property: 'text', type: 'string'),
    new Property(property: 'image', type: 'string'),
])]
class News extends AppActiveRecord
{

//    public function behaviors(): array
//    {
//        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::class,
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'en_title', 'date'], 'required'],
            [['API_priority', 'date'], 'integer'],
            [['title', 'en_title', 'description', 'en_description', 'text', 'en_text', 'image', 'status'], 'string', 'max' => 255]
        ];
    }

    final public function fields(): array
    {
        return [
                'id',
                'title',
//                'en_title',
//                'API_priority',
                'date',
                'description',
//                'en_description',
                'text',
//                'en_text',
                'image',
//                'status',
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
            'API_priority' => Yii::t('app', 'API Priority'),
            'date' => Yii::t('app', 'Date'),
            'description' => Yii::t('app', 'Description'),
            'en_description' => Yii::t('app', 'English Description'),
            'text' => Yii::t('app', 'Text'),
            'en_text' => Yii::t('app', 'English Text'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
