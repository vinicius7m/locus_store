function cartDeleteProduct(order_id, product_id, item) {
    $('#form-delete-product input[name="order_id"]').val(order_id);
    $('#form-delete-product input[name="product_id"]').val(product_id);
    $('#form-delete-product input[name="item"]').val(item);
    $('#form-delete-product').submit();
}

function cartAddProduct( product_id ) {
    $('#form-add-product input[name="id"]').val(product_id);
    $('#form-add-product').submit();
}