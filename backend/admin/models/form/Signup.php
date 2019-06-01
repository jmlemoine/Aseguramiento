<?php
namespace backend\admin\models\form;

use Yii;
use backend\admin\models\User;
use yii\base\Model;
use yii\web\UploadedFile;
use backend\models\AreaEspecializacion;
use backend\models\UserAreaEspecializacion;
/**
 * Signup form
 */
class Signup extends Model
{
    public $id;
    public $Nombre;
    public $Apellido;
    public $username;
    public $Sexo;
    public $area_especializacion_id;
    public $email;
    public $Fecha_Nacimiento;
    public $password;
    public $tipo_user_id;
    public $afiliacion_id;
    public $pais_id;
    public $Telefono;
    public $image;
    public $filename;
    public $Foto;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'tipo_user_id', 'pais_id'], 'integer'],
            [['Nombre', 'Apellido', 'username', 'Sexo', 'email', 'Fecha_Nacimiento', 'password'], 'required'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => 'backend\admin\models\User', 'message' => 'Este nombre de usuario ya ha sido tomado.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['Sexo'], 'string'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'backend\admin\models\User', 'message' => 'Este email ya ha sido tomado.'],
            ['password', 'string', 'min' => 6],
            [['Telefono'], 'string', 'max' => 20],
           // [['image'], 'string', 'max' => 255],
            [['image', 'Foto', 'filename',], 'safe'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif'],
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if ($this->validate()) {
            $user = new User();
            //$area = new AreaEspecializacion;
            //$userArea = new UserAreaEspecializacion;
            //$userArea->user_id = $this->id;
            $user->Nombre = $this->Nombre;
            $user->Apellido = $this->Apellido;
            $user->username = $this->username;
            //$userArea->area_especializacion_id = $this->area_especializacion_id;
            //$area = AreaEspecializacion::find()->all();
            //$user = $area->user;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->tipo_user_id = $this->tipo_user_id;
            $user->afiliacion_id = $this->afiliacion_id;
            $user->pais_id = $this->pais_id;
            $user->Telefono = $this->Telefono;
            $user->Sexo = $this->Sexo;
            $user->Fecha_Nacimiento = $this->Fecha_Nacimiento;
            //$user->image = $this->image;
            $user->filename = $this->filename;
            $user->Foto = $this->Foto;
            /*
            $user->save();
            $area->save();
            $userArea->save();

            $user->link('areaEspecializacions', $area);
            */
            //$user->link('areaEspecializacions', $areaEspecializacions);
            

            if ($user->save()) {
                return $user;
                //return $area;
                //return $userArea;
            }
        }

        return null;
    }
}
