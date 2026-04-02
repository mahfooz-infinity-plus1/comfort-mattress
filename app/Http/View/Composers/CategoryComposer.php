<?php

namespace App\Http\View\Composers;

use App\Model\TxnCategory;
use App\Model\TxnKeyword;
use Illuminate\View\View;

class CategoryComposer
{
    private $dynamicCategory;
    private $keywords;
    private $smallDeviceDynamicCategory;
    private $footerDynamicCategory;
    private $wishlists = 0;
    public function __construct()
    {
        $txnCategory = TxnCategory::where('status', true)->orderBy('parent_id')->get();
        $category = array(
            'categories' => array(),
            'parent_cats' => array(),
        );

        foreach ($txnCategory as $key => $value) {
            // parent category id
            // echo "<pre>";
            // print_r($value->id);
            // $category['categories'][$value->id] = $value;
            // echo "</pre>";
            // echo "<br>";

            // child category
            // echo "<pre>";
            // print_r($value->parent_id);
            // $category['parent_cats'][$value->parent_id][] = $value->id;
            // echo "</pre>";
            $category['categories'][$value->id] = $value;
            $category['parent_cats'][$value->parent_id][] = $value->id;
        }
        // dd("im here");
        $this->footerDynamicCategory = TxnCategory::select('name', 'slug_url')->where('status', true)->where('parent_id', 0)->orderBy('parent_id')->inRandomOrder()->take(5)->get();
        $this->dynamicCategory = $this->buildCategory(0, $category, 0);
        $this->dynamiccategoryMobile = $this->dynamiccategoryMobile(0, $category, 0);
        // dd($this->dynamicCategory);
        // dd($this->dynamiccategoryMobile);
        $this->keywords = TxnKeyword::groupBy('keyword')->get();
    }

    public function compose(View $view)
    {
        $view->with(['dynamiccategoryDesktop' => $this->dynamicCategory,'dynamiccategoryMobile'=>$this->dynamiccategoryMobile,'keywords' => $this->keywords, 'footerDynamicCategory' => $this->footerDynamicCategory, 'wishlists' => $this->wishlists]);
    }

    public function buildCategory($parent, $category, $count)
    {
        $count = $count + 1;
        $html = "";
        if ($count > 3) {
            return $html;
        }
        if (isset($category['parent_cats'][$parent])) {

            if ($count == 1) {
                // Main Parent
                //  var_dump($category['parent_cats'][$parent]);
                if (count($category['parent_cats'][$parent]) > 1) {
                    foreach ($category['parent_cats'][$parent] as $cat_id) {
                        if (!isset($category['parent_cats'][$cat_id])) {
                            // var_dump($category['categories'][$cat_id]);
                            $html .= "<li class='menu-link'><a href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "' class='link-title'><span class='sp-link-title'>" . $category['categories'][$cat_id]['name'] . "</span></a></li>";
                            // done
                        }

                        if (isset($category['parent_cats'][$cat_id])) {
                            // var_dump($category['parent_cats'][$cat_id]);

                            $html .= "<li class='menu-link parent'>
                            <a href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "' class='link-title'>
                            <span class='sp-link-title'>" . $category['categories'][$cat_id]['name'] . "</span>
                            <i class='fa fa-angle-down'></i>
                            </a>
                            <ul class='dropdown-submenu sub-menu collapse' id='collapse-" . $category['categories'][$cat_id]['slug_url'] . "'>";
                            $html .= $this->buildCategory($cat_id, $category, $count);
                            $html .= "</li>";
                        }
                    }
                }
            } elseif($count==2) {
                // For Sub Child
                // dd($category['parent_cats'][$parent]);
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li class='submenu-li'>
                        <a class='submenu-link' href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "'>
                        <span class='mm-text'>" . $category['categories'][$cat_id]['name'] . "
                        </span>
                        </a>
                        </li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li class='submenu-li'>
                        <a class='submenu-link' href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "' class='link-title link-title-lg'>"."<span class='mm-text'>" . $category['categories'][$cat_id]['name'] ."</span>
                        <i class='fa fa-angle-right'></i>
                        </a>
                        <ul class='dropdown-product sub-menu collapse' id='collapse-product'>";
                        $html .= $this->buildCategory($cat_id, $category, $count);
                        $html .="</li></ul>";

                    }
                }
                $html .= "</ul>";
            }
            else{
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "
                        <li class='product-li'>
                          <a href='" . $category['categories'][$cat_id]['slug_url']  . "' class='product-link'>" . $category['categories'][$cat_id]['name'] . "</a>
                        </li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "
                        <li class='product-li'>
                          <a href='" .$category['categories'][$cat_id]['slug_url'] ."' class='product-link'>" . $category['categories'][$cat_id]['name'] . "</a>
                        </li> </ul>";
                        $html .= $this->buildCategory($cat_id, $category, $count);
                        $html .="</li>";

                    }
                }
            }
        }
        return $html;
    }

   public function dynamiccategoryMobile($parent, $category, $count)
    {
        $count = $count + 1;
        $html = "";
        if ($count > 3) {
            return $html;
        }
        if (isset($category['parent_cats'][$parent])) {

            if ($count == 1) {
                // Main Parent
                //  var_dump($category['parent_cats'][$parent]);
                if (count($category['parent_cats'][$parent]) > 1) {
                    foreach ($category['parent_cats'][$parent] as $cat_id) {
                        if (!isset($category['parent_cats'][$cat_id])) {
                            // var_dump($category['categories'][$cat_id]);
                            $html .= "<li class='menu-link'><a  class='link-title' href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "'><span class='sp-link-title'>" . $category['categories'][$cat_id]['name'] . "</span></a></li>";
                            // done
                        }

                        if (isset($category['parent_cats'][$cat_id])) {
                            // var_dump($category['parent_cats'][$cat_id]);

                            $html .= "<li class='menu-link parent'>
                            <a class='link-title'>
                            <span class='sp-link-title'>" . $category['categories'][$cat_id]['name'] . "</span>
                            <i class='fa fa-angle-down'></i>
                            </a>
                            <ul class='dropdown-submenu sub-menu collapse' id='collapse-" . $category['categories'][$cat_id]['slug_url'] . "'>";
                            $html .= $this->dynamiccategoryMobile($cat_id, $category, $count);
                            $html .= "</li>";
                        }
                    }
                }
            } elseif($count==2) {
                // For Sub Child
                // dd($category['parent_cats'][$parent]);
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li class='submenu-li'>
                        <a class='submenu-link' href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "'>
                        <span class='mm-text'>" . $category['categories'][$cat_id]['name'] . "
                        </span>
                        </a>
                        </li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "<li class='submenu-li'>
                        <a class='submenu-link' class='link-title link-title-lg' href='" . route('cate', $category['categories'][$cat_id]['slug_url']) . "'>"."<span class='mm-text'>" . $category['categories'][$cat_id]['name'] ."</span>
                        <i class='fa fa-angle-right'></i>
                        </a>
                        <ul class='dropdown-product sub-menu collapse' id='collapse-product'>";
                        $html .= $this->dynamiccategoryMobile($cat_id, $category, $count);
                        $html .="</li></ul>";

                    }
                }
                $html .= "</ul>";
            }
            else{
                foreach ($category['parent_cats'][$parent] as $cat_id) {
                    if (!isset($category['parent_cats'][$cat_id])) {
                        $html .= "
                        <li class='product-li'>
                          <a href='" . $category['categories'][$cat_id]['slug_url']  . "' class='product-link'>" . $category['categories'][$cat_id]['name'] . "</a>
                        </li>";
                    }
                    if (isset($category['parent_cats'][$cat_id])) {
                        $html .= "
                        <li class='product-li'>
                          <a href='" .$category['categories'][$cat_id]['slug_url'] ."' class='product-link'>" . $category['categories'][$cat_id]['name'] . "</a>
                        </li> </ul>";
                        $html .= $this->dynamiccategoryMobile($cat_id, $category, $count);
                        $html .="</li>";

                    }
                }
            }
        }
        return $html;
    }

}
