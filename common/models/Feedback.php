<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int         $id
 * @property string      $name
 * @property string      $email
 * @property string      $message
 * @property int|null    $created_at        Дата создания
 * @property int|null    $updated_at        Дата изменения
 * @property int|null    $moderation_status Дата изменения
 * @property string|null $comment
 */
class Feedback extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%feedback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['created_at', 'updated_at', 'moderation_status'], 'integer'],
            [['name', 'email', 'message', 'comment'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'moderation_status' => Yii::t('app', 'Moderation Status'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }
}
