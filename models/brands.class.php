<?php

class Brands
{
    var $id;
    var $page;
    var $content;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param null $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    function __construct($page = NULL)
    {
        $this->page = $page;

        if ($this->page <> null) {
            $this->refreshData();
        }
    }

    public function refreshData()
    {
        $db = MysqliDb::giveNewDbConnection();

        $db->where('Page', $this->page);
        $result = $db->get('tblBrands');

        if ($db->count > 0) {
            foreach ($result as $row) {
                $this->setData($row);
            }
        }
    }

    public function setData($row)
    {
        $this->id = $row['ID'];
        $this->page = $row['Page'];
        $this->content = $row['Content'];
    }

    public function save()
    {
        try {
            $db = MysqliDb::giveNewDbConnection();
            $data = array(
                "Content" => $this->content
            );

            //Update
            if ($this->id <> null) {
                $db->where('ID', $this->id);
                if ($db->update('tblBrands', $data)) {
                    echo 'success';
                } else {
                    echo 'error_saving';
                }
            }
        }
        catch (Exception $e) {
            echo $e->getTraceAsString();
            echo 'error_saving';
        }
    }

    public static function savePageContent($type)
    {
        $brands = new Brands($type);
        $brands->content = $_POST['lingerie'];
        $brands->save();
    }
}