<?php

class ArticlesUploads extends \Phalcon\Mvc\Model
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
     * @Column(column="articleid", type="integer", length=10, nullable=false)
     */
    public $articleid;

    /**
     *
     * @var integer
     * @Column(column="uploadid", type="integer", length=10, nullable=false)
     */
    public $uploadid;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalconorm");
        $this->setSource("articles_uploads");
        $this->belongsTo('articleid', '\Articles', 'id', ['alias' => 'Articles']);
        $this->belongsTo('uploadid', '\Uploads', 'id', ['alias' => 'Uploads']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'articles_uploads';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesUploads[]|ArticlesUploads|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArticlesUploads|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
