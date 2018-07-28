<?php echo ( ! count($cart) OR !is_array($cart))?"":'';?>

<?php 
    
    $sum=0;
    foreach($cart as $product):
        for($i=0;$i<$product['quantity'];$i++) :
?>
					<div class="cart_item">
                        <a href="<?php echo site_url('/shop/product/index/'.$product['nicename']) ?>"><img src="<?php echo empty($product['thumb']) === FALSE ? base_url().$product['thumb'] : base_url().'images/noimage.jpg' ; ?>" class="cart_items" id="product<?php echo $i; ?>_<?php echo $product['productID']; ?>" alt="<?php echo $product['title_'.$lang]; ?>" title="<?php echo $product['title_'.$lang]; ?>"/></a>
                        <br /><a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('shop/cart/cart_remove'), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$i."_".$product['productID']."'")); ?>; return FALSE;"><span class="cart_remove"></span></a>
					</div>
<?php 
            $sum += $product['price_'.$lang];
        endfor;
    endforeach;
?>

                    <div style="clear:left;"></div>
                    <p>
                        <?php echo $this->lang->line('main_cart_cost'); ?>:
                        <?php echo $sum.' '.$this->lang->line('main_currency'); ?>
                    </p>
                    <script type="text/javascript">if(document.getElementById("cart_costs")!=NULL){ $("cart_costs").innerHTML=<?php echo $sum; ?>; shippment_sum();}</script>
