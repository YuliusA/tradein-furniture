<?php
/**
 * Load Single Products Section
 * Author: Yulius
 * Date: 7/10/2017
 * Time: 9:11 PM
 */

date_default_timezone_set("Asia/Bangkok");

$query = $_GET["q"];
$query = strtolower($query);

$xmlDoc = new DOMDocument();
$xmlDoc->load("products_dummy.xml");

$idtag = $xmlDoc->getElementsByTagName('id');

for ($i = 0; $i <= $idtag->length-1; $i++) {
    //Process only element nodes
    if ($idtag->item($i)->nodeType == 1) {
        if ($idtag->item($i)->childNodes->item(0)->nodeValue == $query) {
            $product = ($idtag->item($i)->parentNode);
        }
    }
}

$output = '';

if($product) {
    $colors = $product->getElementsByTagName('coloritem');
    $materials = $product->getElementsByTagName('material');

    $output .= '<div class="tradein-step-content">';
    // $output .= '<h3 class="step-heading text-center">' . $product->getElementsByTagName('name')[0]->childNodes[0]->nodeValue . '</h3>';
    $output .= '<div class="product-row d-flex flex-items-xs-center">';

    $output .= '<div class="left-col">';
    $output .= '<img class="img-fluid img-product" src="img/products/' . $product->getElementsByTagName('img')[0]->childNodes[0]->nodeValue . '">';
    $output .= '</div>';

    $output .= '<div class="right-col">';
    $output .= '<div class="product-info-box">';

    $output .= '<h4 class="step-heading">' . $product->getElementsByTagName('name')[0]->childNodes[0]->nodeValue . '</h4>';

    $output .= '<div class="product-price form-group clearfix">';
    $output .= '<div class="original-price left"><del><span class="currency">Rp.</span>' . number_format($product->getElementsByTagName('price')[0]->childNodes[0]->nodeValue, 0,',','.') . '</del></div>';
    $output .= '<div class="disc-price right"><span class="currency">Rp.</span>' . number_format($product->getElementsByTagName('discprice')[0]->childNodes[0]->nodeValue, 0,',','.') . '</div>';
    $output .= '</div>';

    if($colors[0]->childNodes) {
        $output .= '<div class="form-group product-color">';
        $output .= '<label for="colorSwatches" class="form-label">Fabric Color</label>';
        $output .= '<select id="colorSwatches" class="form-select" tabindex="-1" aria-hidden="true">';
        for ($i = 0; $i < $colors->length; $i++) {
            $output .= '<option value="">' . $colors[$i]->childNodes[0]->nodeValue . '</option>';
        }
        $output .= '</select>';
        $output .= '</div>';
    }

    if($materials[0]->childNodes) {
        $output .= '<div class="form-group">';
        $output .= '<label class="form-label">Finish/Material</label>';
        $output .= '<dl class="product-material-info row">';
        foreach ($materials[0]->childNodes as $material) {
            if($material->nodeType == 1) {
                $output .= '<dt class="col-md-4">' . ucfirst($material->nodeName) . '</dt>';
                $output .= '<dd class="col-md-8">' . ucwords($material->nodeValue) . '</dd>';
            }
        }
        $output .= '</dl>';
        $output .= '</div>';
    }

    $output .= '<div class="form-group">';
    $output .= '<label class="form-label">Shipping</label>';
    $output .= '<dl class="product-shipping-info row">';
    $output .= '<dt class="col-md-4">Ongkir</dt><dd class="col-md-8">GRATIS</dd>';
    $output .= '<dt class="col-md-4">Pengiriman</dt><dd class="col-md-8">' . date("F j", mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"))) . '</dd>';
    $output .= '</dl>';
    $output .= '</div>';


    // $output .= '<div class="form-group">';
    // $output .= '<ul class="product-usp-info">';
    // $output .= '<li class="usp-content-info"><i class="material-icons">done</i>Garansi 1 Tahun</li>';
    // $output .= '<li class="usp-content-info"><i class="material-icons">done</i>Gratis 30 Hari Pengembalian</li>';
    // $output .= '<li class="usp-content-info"><i class="material-icons">done</i>Cash On Delivery</li>';
    // $output .= '</ul>';
    // $output .= '</div>';

    $output .= '</div>';
    $output .= '</div>';

    $output .= '</div>';
    $output .= '</div>';
}

echo $output;