<?php
class Page {
    protected $id;
    protected $slug;
    protected $title;
    protected $content;
    protected $publish;
    protected $topLevel;
    protected $modified;

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
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * @return mixed
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * @param mixed $publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
    }

    /**
     * @return mixed
     */
    public function getTopLevel()
    {
        return $this->topLevel;
    }

    /**
     * @param mixed $topLevel
     */
    public function setTopLevel($topLevel)
    {
        $this->topLevel = $topLevel;
    }


    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }


    // CONSTRUCTOR
    function __construct($slug = NULL)
    {
        $this->slug = $slug;

        if ($this->slug <> null)
        {
            $this->refreshData();
        }
        $this->modified = new DateTime();
    }

    private function refreshData()
    {
        $db = MysqliDb::giveNewDbConnection();

        $db->where('Slug', $this->slug);
        $result = $db->get('tblPages');

        if($db->count> 0) {
            foreach ($result as $row) {
                $this->setData($row);
            }
        }
    }

    private function setData($row)
    {
        $this->id = htmlspecialchars($row['ID']);
        $this->slug = htmlspecialchars($row['Slug']);
        $this->title = htmlspecialchars($row['Title']);
        $this->content = $row['Content'];
        $this->publish = $row['Publish'];
        $this->topLevel = htmlspecialchars($row['TopLevel']);
    }

    private function save() {
        try {
            $db = MysqliDb::giveNewDbConnection();
            $data = array(
                "Title" => $this->title,
                "Content" => $this->content,
                "Publish" => $this->publish,
                "Modified" => $this->modified->format('Y-m-d H:i:s')
            );

            //Update
            if ($this->id <> null) {
                $db->where('ID', $this->id);
                if ($db->update('tblPages', $data)) {
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

    public static function savePage($slug) {
        $page = new Page($slug);

        $page->title = isset($_POST['title']) ? $_POST['title'] : '';
        $page->content = isset($_POST['content']) ? $_POST['content'] : '';
        $page->publish = isset($_POST['publish']) ? 1 : 0;

        $page->save();
    }

    public static function getSubPages($topLevel) {
        $db = MysqliDb::giveNewDbConnection();

        if(isset($topLevel) && is_int($topLevel)) {
            $db->where('TopLevel', $topLevel);
            $result = $db->get('tblPages');

            if ($db->count > 0) {
                $items = array();
                foreach ($result as $row) {
                    $page = new Page();
                    $page->setData($row);
                    $items[] = $page;
                }
                return $items;
            }
        }
    }
}