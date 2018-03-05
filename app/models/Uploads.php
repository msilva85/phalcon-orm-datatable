<?php

class Uploads extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="userid", type="integer", length=10, nullable=false)
     */
    public $userid;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=100, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(column="mime", type="string", length=45, nullable=true)
     */
    public $mime;

    /**
     *
     * @var double
     * @Column(column="size", type="double", length=10, nullable=true)
     */
    public $size;

    /**
     *
     * @var string
     * @Column(column="created_at", type="string", nullable=true)
     */
    public $created_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalconorm");
        $this->setSource("uploads");
        $this->hasMany('id', 'ArticlesUploads', 'uploadid', ['alias' => 'ArticlesUploads']);
        $this->belongsTo('userid', '\Users', 'id', ['alias' => 'Users']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'uploads';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uploads[]|Uploads|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uploads|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
