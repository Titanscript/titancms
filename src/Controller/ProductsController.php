<?php


namespace App\Controller;

use Cake\ORM\Query;
use Cake\Utility\Hash;

/**
 * Class ProductsController
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @package App\Controller
 */
class ProductsController extends AppController
{
    public function index()
    {
        $products = $this->Products->find()
            ->where(['Products.status' => 'active'])
            ->contain(['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']);

        $products = $this->paginate($products);

        foreach ($products as $product) {
            $result = Hash::check($product->toArray(), 'product_attribute_headers.images.product_attributes.image_1');

            if ($result) {
                $product->image_url = Hash::get($product->toArray(), 'product_attribute_headers.images.product_attributes.image_1');
            } else {
                $product->image_url = 'https://via.placeholder.com/480x700';
            }
        }

        $this->set(compact('products'));
    }

    public function view($slug = null)
    {
        $product = $this->Products->findBySlug($slug)->first();

        $this->set(compact('product'));
    }

    public function category($slug = null)
    {
        $category = $this->Products->ProductCategories->findBySlug($slug)->first();
        $products = $this->Products->find()
            ->where(
                [
                    'Products.status'              => 'active',
                    'Products.product_category_id' => $category->id,
                ]
            )
            ->contain(['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']);

        foreach ($products as $product) {
            $result = Hash::check($product->toArray(), 'product_attribute_headers.images.product_attributes.image_1');

            if ($result) {
                $product->image_url = Hash::get($product->toArray(), 'product_attribute_headers.images.product_attributes.image_1');
            } else {
                $product->image_url = 'https://via.placeholder.com/480x700';
            }
        }

        $this->set(compact('products', 'category'));
    }
}