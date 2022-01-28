<?php

namespace Src\Controllers\Founders;

class FounderController
{

    private string $defaultAvatar = "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80&fbclid=IwAR2MclqcWOE4Dt1HOdJS4zuusi6tPsNIhOJQw9gLb453IwpO-7ltYnbOoQM";


    /**
     * @method getFoundersAvatar() is responsible for getting the avatar from wp_posts table
     */
    private function getFoundersAvatar($founders)
    {
        global $wpdb;
        foreach ($founders as $row) {
            $default_avatar     =   $row->avatar;
            if ($default_avatar == null) continue;
            $avatar_length      =   strlen($default_avatar);
            $counter            =   $avatar_length - 3;
            $postID             =   0;
            $multiply           =   1;
            while ($counter >= 0) {
                if ($default_avatar[$counter] == ':') {
                    break;
                }
                $postID         +=  $default_avatar[$counter] * $multiply;
                $multiply       *=  10;
                $counter         =  $counter - 1;
            }
            $wp_posts_table      =  $wpdb->prefix . 'posts';
            $guid_avatar         =  $wpdb->get_results("SELECT guid FROM $wp_posts_table WHERE ID = $postID");
            $row->avatar_image   =  $guid_avatar[0]->guid ? $guid_avatar[0]->guid : $this->defaultAvatar;
        }
    }


    private function getAssociativeProduct($founders_with_products, $founders)
    {
        for ($i = 0; $i < sizeof($founders_with_products); $i++) {
            $flag = 0;
            for ($j = 0; $j < sizeof($founders); $j++) {
                if ($founders_with_products[$i]->ID == $founders[$j]->ID) {
                    $founders_with_products[$i]->total_products = $founders[$j]->total_products;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 0) {
                $founders_with_products[$i]->total_products = 0;
            } else {
                $flag = 0;
            }
        }
    }


    public function getFounderPaginationInfo($limit)
    {
        global $wpdb;
        $founders_table    =   $wpdb->prefix . 'product_founders';
        $total_founder     =   $wpdb->get_results("SELECT * FROM $founders_table");
        $total_records     =   count($total_founder);
        $limits            =   $limit['limit'];
        $total_pages       =   ceil($total_records / $limits);

        return [
            'total_pages'   => $total_pages,
            'total_records' => $total_records,
        ];
    }


    public function getPaginatedFounders($request)
    {
        global $wpdb;
        $founders_table    =   $wpdb->prefix . 'product_founders';
        $product_table     =   $wpdb->prefix . 'products';
        $quey_params       =   json_decode($request['data']);
        $page_number       =   $quey_params->page;
        $limit             =   $quey_params->limit;
        $offset            =   ($page_number - 1) * $limit;

        $founders = $wpdb->get_results(
            "SELECT *
                FROM $founders_table
                LIMIT $limit OFFSET $offset
            "
        );

        $founders_with_products = $wpdb->get_results(
            "SELECT $founders_table.*,
                COUNT( $product_table.product_founder_id ) as total_products
                FROM $founders_table
                JOIN $product_table
                    ON $founders_table.ID = $product_table.product_founder_id
                GROUP BY $product_table.product_founder_id
                LIMIT $limit OFFSET $offset
            "
        );

        $this->getAssociativeProduct($founders, $founders_with_products);
        $this->getFoundersAvatar($founders);

        if ($founders == null) {
            return [
                'success'    => false,
                'message'    => 'No data found'
            ];
        }

        return [
            'success'           => true,
            'founders'          => $founders,
            'offset'            => $offset,
            'total_founders'    => count($founders)
        ];
    }


    /**
     * @method getSingleFounder() is responsible to retrive a single founder.
     * fetch all the resources from the @return wp_product_founders table for an specific ID (primary key)
     *
     * @return Response
     */
    public function getSingleFounder($data)
    {
        global $wpdb;
        $founder_id        =   $data['id']; # ID -> primary key of the product_founders table
        $founders_table    =   $wpdb->prefix . 'product_founders';
        $founder           =   $wpdb->get_results("SELECT * FROM $founders_table WHERE ID = $founder_id");

        if ($founder == null) {
            return [
                'success'    => false,
                'message'    => 'No founder available.',
            ];
        }
        $this->getFoundersAvatar($founder);

        return [
            'success'    => true,
            'founder'    => $founder
        ];
    }

    /**
     * @method getFeaturedImage() is responsible for getting the featured_image from wp_posts table
     */
    private function getFeaturedImages($products)
    {
        global $wpdb;
        foreach ($products as $row) {
            $default_image      =   $row->featured_image;
            if ($default_image == null) continue;
            $image_length       =   strlen($default_image);
            $counter            =   $image_length - 3;
            $postID             =   0;
            $multiply           =   1;
            while ($counter >= 0) {
                if ($default_image[$counter] == ':') {
                    break;
                }
                $postID         +=  $default_image[$counter] * $multiply;
                $multiply       *=  10;
                $counter         =  $counter - 1;
            }
            $wp_posts_table      =  $wpdb->prefix . 'posts';
            $guid_image          =  $wpdb->get_results("SELECT guid FROM $wp_posts_table WHERE ID = $postID");
            $row->featured_image =  $guid_image[0]->guid ? $guid_image[0]->guid : 'no image available';
        }
    }


    /**
     * @method getProductsByFounder() is responsible to retrive products info that is belongs to an specifi founder.
     * fetch all the resources from the @return wp_products table for an specific product_founder_id (foreign key)
     *
     * @return Response
     */
    public function getProductsByFounder($data)
    {
        global $wpdb;
        $product_founder_id     =   $data['id']; # ID -> foreign key of the wp_products table
        $products_table         =   $wpdb->prefix . 'products';
        $deal_type_table        =   $wpdb->prefix . 'deal_types';
        $deal_platform_table    =   $wpdb->prefix . 'deal_platforms';
        $rating_table           =   $wpdb->prefix . 'product_ratings';
        $current_user           =   wp_get_current_user()->ID;

        $products = $wpdb->get_results(
            "SELECT $products_table.*,
                $deal_type_table.name as deal_type,
                $deal_platform_table.name as platform_name
                FROM $products_table
                JOIN $deal_type_table
                    ON $products_table.deal_type = $deal_type_table.ID
                LEFT OUTER JOIN $deal_platform_table
                    ON $products_table.deal_platform_id = $deal_platform_table.ID
                WHERE product_founder_id = $product_founder_id
            "
        );

        $ratings = $wpdb->get_results("SELECT * FROM $rating_table WHERE user_id = $current_user");
        for ($i = 0; $i < sizeof($products); $i++) {
            $products[$i]->rate = 0;
            for ($j = 0; $j < sizeof(($ratings)); $j++) {
                if ($products[$i]->ID == $ratings[$j]->product_id) {
                    $products[$i]->rate = (int)$ratings[$j]->rating;
                    break;
                }
            }
        }

        $this->getFeaturedImages($products);

        if ($products == null) {
            return [
                'success' => false,
                'message' => 'This founders is not belongs to any of our products yet.',
            ];
        }
        return [
            'success'             => true,
            'founders_product'    => $products
        ];
    }
}
