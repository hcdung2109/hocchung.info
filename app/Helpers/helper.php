<?php
/**
 * Created by PhpStorm.
 * User: a
 * Date: 2/13/2018
 * Time: 5:22 PM
 */
namespace App\Helpers;

class Helper
{
    /**
     * Create Html Select Option for Collections
     * @param $collections
     * @param int $current_parent_id
     * @param int $parent_id
     * @param string $space
     */
    public static function createHtmlListCategories($collections, $current_parent_id = 0, $parent_id = 0, $space = '')
    {
        // check not empty
        if ($collections->isNotEmpty()) {
            foreach ($collections as $item) {
                $selected = '';
                // before show item as parent
                if ($item->parent_id == $parent_id) {
                    if ($current_parent_id > 0 && ($current_parent_id == $item->id)) {
                        $selected = 'selected';
                    }
                    echo '<option value="' . $item->id . '" ' . $selected . '>' . $space . ' ' . $item->name . '</option>';

                    self::createHtmlListCategories($collections, $current_parent_id, $item->id, $space.'---');

                }
            }
        }
    }

    /**
     * Create html navigation
     * @param $collections
     * @param int $parent_id
     */
    public static function createMenuBlog($collections, $parent_id = 0, $tag_open = '<ul class ="dropdown-menu">', $tag_close = '</ul>')
    {
        foreach ($collections as $item) {
            // before show item as parent
            if ($item->parent_id == $parent_id) {
                echo '<li class="dropdown m-menu-fw"><a href="'.route('blog.getArticlesOfCategory',$item).'">'.$item->name.'</a>'.$tag_open;
                    self::createMenuBlog($collections, $item->id,null, null);
                echo $tag_close.'</li>';
            }
        }
    }

    public static function htmlOptionCollections($collections, $property, $current_collection = 0)
    {
        $html = '';
        // check not empty
        if ($collections->isNotEmpty()) {
            foreach ($collections as $collection) {
                if ($current_collection >0 && $current_collection == $collection->id) {
                    $html .= '<option selected value="'.$collection->id.'">'.$collection->$property.'</option>';
                } else {
                    $html .= '<option value="'.$collection->id.'">'.$collection->$property.'</option>';
                }
            }
        }
        echo $html;
    }

    public static function treeviewCollections($data = array(),$parent_id = 0)
    {

        foreach($data as $val) {
            if ($val['parent_id'] == $parent_id) {
                echo '<li><a href="'.route('admin.category.edit',['id' => $val['id']]).'"><span><i class="fa fa-lg fa-plus-circle"></i> '.$val['name'].'</span></a><ul>';
                        self::treeviewCollections($data, $val['id']);
                echo '</ul></li>';

            }
        }
    }


}