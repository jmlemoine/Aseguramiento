<?php
namespace auth\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

/**
 * Client form
 */
class Client extends Model
{
    public $client_id;
    public $client_secret;
    public $remember;

    public $dataList;
    private $_client;


    public function init()
    {
        parent::init();
        if (empty($this->dataList)) {
            throw new InvalidConfigException('At least one client should be defined under "'.self::class.'::$dataList".');
        }
    }

    public function rules()
    {
        return [
            ['client_id', 'required'],
            ['client_id', 'filter', 'filter' => 'trim'],
            ['client_id', 'in', 'range' => ArrayHelper::getColumn($this->dataList, 'id'), 'strict' => true],
            ['remember', 'boolean', 'falseValue'=> 'false', 'trueValue'=> 'true'],
            ['client_secret', 'validateClient', 'skipOnEmpty' => false],
        ];
    }

    public function validateClient($attribute, $params)
    {
        $client = $this->findClient($this->client_id);

        if ($client === null || $this->validateSecret() === false) {
            $this->addError($attribute, 'Invalid client.');
        }
    }


    /* internal methods */

    protected function getClient()
    {
        if ($this->_client === null) {
            $this->_client = $this->findClient($this->client_id);
        }
        return $this->_client;
    }

    protected function findClient($id)
    {
        foreach ($this->dataList as $client) {
            if ($id && ArrayHelper::getValue($client, 'id') === $id) return $client;
        }
        return null;
    }

    protected function validateSecret()
    {
        $secret = ArrayHelper::getValue($this->client, 'secret');
        return ($secret === null) ? true : Yii::$app->security->compareString($secret, $this->client_secret);
    }


    /* public methods */

    public function loadClient($params)
    {
        return $this->load($params,'') && $this->validate();
    }

    public function getId()
    {
        return ArrayHelper::getValue($this->client, 'id');
    }

    public function getAccessExpiry()
    {
        return $this->remember 
            ? ArrayHelper::getValue($this->client, 'accessTokenLifeTime.remember') 
            : ArrayHelper::getValue($this->client, 'accessTokenLifeTime.default');
    }

    public function getRefreshExpiry()
    {
        return $this->remember 
            ? ArrayHelper::getValue($this->client, 'refreshTokenLifeTime.remember') 
            : ArrayHelper::getValue($this->client, 'refreshTokenLifeTime.default');
    }

    public function getEmailExpiry()
    {
        return ArrayHelper::getValue($this->client, 'emailTokenLifeTime');
    }

    public function getResetUrl()
    {
        return ArrayHelper::getValue($this->client, 'resetUrl');
    }

}