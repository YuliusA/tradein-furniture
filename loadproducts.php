<?php
/**
 * Load Products List with its respective category.
 * Author: Yulius
 * Date: 7/10/2017
 * Time: 9:11 PM
 */

$query = $_GET["q"];
$query = strtolower($query);

$xmlDoc = new DOMDocument();
$xmlDoc->load("products_dummy.xml");

$products = $xmlDoc->getElementsByTagName($query);

$output = '';
if($products->length > 0) {
    $output .= '<div class="tradein-step-content">';
    $output .= '<h3 class="step-heading text-center">Pilih Produk</h3>';
    $output .= '<ul class="options-list options-products row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">';
    for ($i = 0; $i < $products->length; $i++) {
        $output .= '<li id="' . $products[$i]->getElementsByTagName('id')[0]->childNodes[0]->nodeValue . '" class="product-list-item option col js-option js-radio">';
        $output .= '<div class="card border-0">';

        // $output .= '<div class="thumb">';
        $output .= '<img class="card-img-top img-cat rounded-2 border border-2 img-product" src="img/products/thumbnail/' . $products[$i]->getElementsByTagName('img')[0]->childNodes[0]->nodeValue . '">';
        // $output .= '<span class="radio-btn"></span>';
        // $output .= '</div>';

        $output .= '<div class="card-body position-relative">';
        $output .= '<span class="radio-btn"></span>';
        $output .= '<h5 class="card-title">' . $products[$i]->getElementsByTagName('name')[0]->childNodes[0]->nodeValue . '</h5>';

        $output .= '<p class="card-text">';
        $output .= '<small class="original-price"><del><span class="currency">Rp.</span>' . number_format($products[$i]->getElementsByTagName('price')[0]->childNodes[0]->nodeValue, 0, ',','.') . '</del></small>';
        $output .= '<span class="disc-price ms-2"><span class="currency">Rp.</span>' . number_format($products[$i]->getElementsByTagName('discprice')[0]->childNodes[0]->nodeValue, 0, ',','.') . '</span>';
        $output .= '</p>';

        $output .= '</div>';

        $output .= '</div>';
        $output .= '</li>';
    }
    $output .= '</ul></div>';
} else {
    $output .= '<div class="tradein-step-content">';
    $output .= '<h3 class="step-heading">Maaf.. tidak ada produk dalam kategori ini</h3>';
    $output .= '</div>';
}

echo $output;

?>