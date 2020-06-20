<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('خانه', route('home'));
});

//// Home > About
//Breadcrumbs::for('about', function ($trail) {
//    $trail->parent('home');
//    $trail->push('About', route('about'));
//});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('بلاگ', route('post.index'));
});

// Home > Blog > [group]
Breadcrumbs::for('group', function ($trail, $group) {
    $trail->parent('blog');
    $trail->push($group->title, route('group', $group->id));
});

// Home > Blog > [group] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('group', $post->group);
//    $trail->push($post->title, route('post', $post->id));
//});
// Home > Blog > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('post.show', $post->id));
});

// Home > Products
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push('فروشگاه', route('product.index'));
});
// Home > Products> [product]
Breadcrumbs::for('product', function ($trail,$product) {
    $trail->parent('products');
    $trail->push($product->name, route('product.show',['product'=>$product->id,$product->name]));
});